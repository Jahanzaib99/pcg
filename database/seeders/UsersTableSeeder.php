<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'name' => 'Admin',
            'is_admin' => 1
        ]);
    }
}
