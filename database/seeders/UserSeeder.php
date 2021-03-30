<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = "admin";
        $user->email = "admin@example.com";
        $user->role = "admin";
        $user->password = Hash::make('admin');

        $user->save();
    }
}
