<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'surat-masuk-list',
            'surat-masuk-create',
            'surat-masuk-edit',
            'surat-masuk-delete',
            'surat-keluar-list',
            'surat-keluar-create',
            'surat-keluar-edit',
            'surat-keluar-delete',
            'disposisi-list',
            'disposisi-create',
            'disposisi-edit',
            'disposisi-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
