<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'      => 'admin_dmm',
            'password'      => Hash::make('password'),
            'kode_toko'     => 'DM'
        ]);

        User::create([
            'username'      => 'admin_moana',
            'password'      => Hash::make('password'),
            'kode_toko'     => 'MO'
        ]);

        User::create([
            'username'      => 'admin_jis',
            'password'      => Hash::make('password'),
            'kode_toko'     => 'JIS'
        ]);

        User::create([
            'username'      => 'admin_k3mart',
            'password'      => Hash::make('password'),
            'kode_toko'     => 'K3MART'
        ]);
    }
}
