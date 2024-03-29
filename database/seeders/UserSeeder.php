<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'Admin')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'city' => 'Tangail',
            'zip' => '1902',
            'address' => 'Bristy Mess, Ghoshpara, Santosh',
            'phone' => '01724993875'
        ]);

        $admin->roles()->attach($role);
    }
}
