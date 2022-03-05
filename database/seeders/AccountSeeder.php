<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'account_id' => 'kevin.taufiek@binus.ac.id',
                'role_id' => 1,
                'gender_id' => 1,
                'first_name' => 'Kevin',
                'middle_name' => 'Nathanael',
                'last_name' => 'Taufiek',
                'email' => 'kevin.taufiek@binus.ac.id',
                'password' => Hash::make('asdasdasd1'),
                'display_picture_link' => 'default.png',
                'delete_flag' => 0
            ],
            [
                'account_id' => 'user@binus.com',
                'role_id' => 1,
                'gender_id' => 2,
                'first_name' => 'user',
                'middle_name' => 'akun',
                'last_name' => 'dummy',
                'email' => 'user@binus.com',
                'password' => Hash::make('passworduser1'),
                'display_picture_link' => 'default.png',
                'delete_flag' => 0
            ],
            [
                'account_id' => 'admin@binus.com',
                'role_id' => 2,
                'gender_id' => 1,
                'first_name' => 'admin',
                'middle_name' => 'akun',
                'last_name' => 'dummy',
                'email' => 'admin@binus.com',
                'password' => Hash::make('passwordadmin1'),
                'display_picture_link' => 'default.png',
                'delete_flag' => 0
            ],
        ]);
    }
}
