<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Admin can access any valid route.'
        ]);

        $customerRole = Role::create([
            'name' => 'Customer',
            'description' => 'Customer can access specific valid routes determined by admin.'
        ]);
    }
}
