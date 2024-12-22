<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';
    protected $fillable = ['username', 'password'];
    protected $with = ['toko'];

    protected $hidden = [
        'password',
    ];

    public function toko()
    {
        return $this->hasMany(UserToko::class, 'kode_toko', 'kode_toko');
    }

    public static function authenticate($username, $password)
    {
        $user = self::where('username', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
    }
}