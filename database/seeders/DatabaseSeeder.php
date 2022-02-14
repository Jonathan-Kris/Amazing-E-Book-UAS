<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\EBook;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_desc' => 'admin'
        ]);
        Role::create([
            'role_desc' => 'user'
        ]);

        Gender::create([
            'gender_desc' => 'male'
        ]);
        Gender::create([
            'gender_desc' => 'female'
        ]);

        EBook::create([
            'title' => 'Heri Puter',
            'author' => 'J.K. Guling',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in'
        ]);
        EBook::create([
            'title' => 'Dr. Batu',
            'author' => 'Hajime Isakawa',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in'
        ]);
        EBook::create([
            'title' => 'Lord of the Necklace',
            'author' => 'J.R.R. Talk Ien',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in'
        ]);

        Account::create([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'Jonathan',
            'last_name' => 'Kristanto',
            'email' => 'jokris@gmail.com',
            'password' => bcrypt('12345678'),
            'delete_flag' => 0,
            'display_picture_link' => 'images/avatar.jpg'
        ]);
    }
}
