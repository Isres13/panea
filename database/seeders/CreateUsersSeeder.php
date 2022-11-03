<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'lname' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'User',
                'lname' => 'user',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('123456789')
            ],
            [
                'name' => 'isres',
                'lname' => 'Lewang',
                'email' => 'isres@user.com',
                'is_admin' => '0',
                'password' => bcrypt('123456789')
            ]
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }

    }
}
