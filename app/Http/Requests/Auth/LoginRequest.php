<?php

namespace App\Http\Requests\Auth;
use Illuminate\Http\RedirectResponse;  // Tambahkan import ini
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];

    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): RedirectResponse
    {
        $this->ensureIsNotRateLimited();

        // $credentials = ['username' => $this->email, 'password' => $this->password];
        
        try {
            Log::info('Attempting login for user: ' . $this->email);
            
            $response = Http::timeout(60) // Increased timeout to 60 seconds
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'Laravel-App/1.0'
                ])
                ->post('https://archive-login-proxy.archive-login.workers.dev', [
                    'username' => $this->email,
                    'password' => $this->password,
                ]);

            Log::info('Worker response received', [
                'status' => $response->status(),
                'successful' => $response->successful(),
                'body' => $response->json(),
            ]);
        
            if ($response->successful()) {
                $body = $response->json();
                if ($body['status']) {
                    $data = $body['data'];
                    if (isset($data['status_login'])) {
                        User::updateOrCreate(['email' => $this->email], [
                            'name' => $data['first_name'] . ' ' . $data['last_name'],
                            'roles' => 'user',
                            'password' => bcrypt($this->password),
                        ]);
                    }
                }

                if (Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
                    // Jika login berhasil, tentukan pengalihan berdasarkan roles
                    return Auth::user()->is_admin
                        ? redirect()->route('dashboard')  // Jika user adalah admin, redirect ke dashboard
                        : redirect()->route('user.mydocuments.index');  // Jika user adalah regular, redirect ke halaman my documents
                }
            }
            
            Log::warning('Login failed', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);
            
        } catch (\Exception $e) {
            Log::error('Login request failed: ' . $e->getMessage(), [
                'exception' => $e,
                'user' => $this->email,
            ]);
            
            throw ValidationException::withMessages([
                'email' => 'Login service temporarily unavailable. Please try again.',
            ]);
        }
        
        RateLimiter::clear($this->throttleKey());
        
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }

    
}
