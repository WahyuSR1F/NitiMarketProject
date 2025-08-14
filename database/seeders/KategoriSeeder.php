<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Beras',
            'Minyak Goreng',
            'Gula',
            'Telur',
            'Mie Instan',
            'Bumbu Dapur',
            'Makanan Kaleng',
            'Tepung & Bahan Kue',
            'Susu & Minuman',
            'Sabun & Detergen',
            'Gas LPG & Air Galon',
            'Rokok',
        ];

        foreach ($data as $nama) {
            $data = [
                'Beras',
                'Minyak Goreng',
                'Gula',
                'Telur',
                'Mie Instan',
                'Bumbu Dapur',
                'Makanan Kaleng',
                'Tepung & Bahan Kue',
                'Susu & Minuman',
                'Sabun & Detergen',
                'Gas LPG & Air Galon',
                'Rokok',
            ];
    
            foreach ($data as $nama) {
                DB::table('kategoris')->insert([
                    'id' => (string) Str::uuid(),
                    'nama' => $nama,
                    'slug' => Str::slug($nama), // otomatis ubah jadi format URL
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
