<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminAccountsSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role super_admin ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Buat user super admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'super@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'), // Ganti di produksi
            ]
        );

        // Berikan role super_admin
        if (! $superAdmin->hasRole('super_admin')) {
            $superAdmin->assignRole($superAdminRole);
        }

        echo "✅ Super Admin berhasil dibuat.\n";
    }
}
