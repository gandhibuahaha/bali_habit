<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'username',
    'name',
    'email',
    'no_tlp',
    'kota',
    'profile_picture',
    'pekerjaan',
    'password',
])]
#[Hidden(['password'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Primary key sesuai database BaliHabit.
     */
    protected $primaryKey = 'user_id';

    /**
     * Role tidak dimasukkan ke fillable.
     * Registrasi publik tidak boleh menentukan role sendiri.
     */

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Children owned by this parent account.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Child::class, 'parent_id', 'user_id');
    }

    /**
     * Initials for an avatar: the first letter of up to 2 words, e.g. "Ni Luh Sari" -> "NL".
     */
    public static function initialsOf(string $name): string
    {
        return collect(preg_split('/\s+/', trim($name)))
            ->filter()
            ->take(2)
            ->map(fn (string $word) => mb_strtoupper(mb_substr($word, 0, 1)))
            ->implode('');
    }
}
