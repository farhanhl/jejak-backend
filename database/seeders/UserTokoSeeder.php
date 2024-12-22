<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserToko;

class UserTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserToko::create([
            'kode_toko' => 'JIS',
            'kode_toko_detail' => 'EA1',
            'nama_toko' => 'Under East Ramp',
        ]);
        
        UserToko::create([
            'kode_toko' => 'JIS',
            'kode_toko_detail' => 'WE1',
            'nama_toko' => 'West Gate Inside',
        ]);
        
        UserToko::create([
            'kode_toko' => 'JIS',
            'kode_toko_detail' => 'WE2',
            'nama_toko' => 'West Gate Outside',
        ]);
        
        UserToko::create([
            'kode_toko' => 'DM',
            'kode_toko_detail' => 'DM1',
            'nama_toko' => 'DMMX Event Demo',
        ]);
        
        UserToko::create([
            'kode_toko' => 'DM',
            'kode_toko_detail' => 'DM2',
            'nama_toko' => 'DMMX POC',
        ]);

        UserToko::create([
            'kode_toko' => 'DM',
            'kode_toko_detail' => 'DM3',
            'nama_toko' => 'DMMX Retail Demo',
        ]);
        
        UserToko::create([
            'kode_toko' => 'DM',
            'kode_toko_detail' => 'DM4',
            'nama_toko' => 'FHI Event',
        ]);
        
        UserToko::create([
            'kode_toko' => 'MO',
            'kode_toko_detail' => 'MO1',
            'nama_toko' => 'Moana Inside',
        ]);
        
        UserToko::create([
            'kode_toko' => 'MO',
            'kode_toko_detail' => 'MO2',
            'nama_toko' => 'Moana Outside (Plaza Indonesia)',
        ]);

        UserToko::create([
            'kode_toko' => 'K3MART',
            'kode_toko_detail' => 'K3MART',
            'nama_toko' => 'K3MART',
        ]);
    }
}