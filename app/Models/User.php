<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'roles', // Pastikan kolom 'roles' ada di database
        'email',
        'password',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function getIsAdminAttribute(): bool
    {
        // Sesuaikan dengan nama kolom di tabel database Anda
        return $this->roles === 'admin';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define a one-to-many relationship with Document model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(Documents::class); // Pastikan nama model adalah Document, bukan Documents
    }
}
