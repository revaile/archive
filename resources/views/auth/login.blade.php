<x-guest-layout>
    <!-- Main Container -->
    <div class="p-6">
        <!-- Header: Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/tech.png') }}" alt="Logo" class="w-24 h-24">
        </div>

        <!-- Form Section -->
        <h2 class="text-xl font-semibold text-gray-700 dark:text-white text-start">Sign In</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    autofocus
                    value="{{ old('email') }}"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 focus:ring-blue-500">
                    <span class="ml-2">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Sign In
                </button>
            </div>      
        </form>

        <!-- Register Link -->
        <p class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:underline">Create One</a>
        </p>
    </div>
</x-guest-layout>
