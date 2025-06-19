<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminAccountsSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role super_admin & admin jika belum ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat User Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'super@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'), // Ganti di produksi
            ]
        );

        // Assign Role super_admin ke User
        if (! $superAdmin->hasRole('super_admin')) {
            $superAdmin->assignRole($superAdminRole);
        }

        // Buat User Admin Biasa
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin Biasa',
                'password' => bcrypt('password'), // Ganti di produksi
            ]
        );

        // Assign Role admin ke User
        if (! $admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }

        // Output ke terminal
        echo "✅ Akun Super Admin & Admin berhasil dibuat.\n";
    }
}
