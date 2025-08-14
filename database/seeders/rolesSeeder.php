<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => Str::uuid(),
            'role' => 'admin',
        ]);

        Role::create([
            'id' => Str::uuid(),
            'role' => 'member',
        ]);
    }
}
