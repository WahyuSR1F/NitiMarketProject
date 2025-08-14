<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil role "member"
        $memberRole = Role::where('role', 'member')->first();

        // Cek apakah role member ditemukan
        if (!$memberRole) {
            $this->command->error('Role "member" tidak ditemukan. Pastikan sudah ada di tabel roles.');
            return;
        }

        // Buat 10.000 user dengan role member
        User::factory()
            ->count(10_000)
            ->create([
                'role_id' => $memberRole->id, // UUID valid dari tabel roles
            ]);
    }
}
