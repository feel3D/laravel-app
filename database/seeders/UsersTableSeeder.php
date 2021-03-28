<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data [] = [
            'name' => 'Admin',
            'email' => 'feel3d@yandex.ru',
            'password' => bcrypt('qwerty12345'),
        ];

        for ($i = 2; $i <= 5; $i++) {
            $data [] = [
                'name' => 'Пользователь ' . $i,
                'email' => 'ueser' . $i . '@testmailg.ru',
                'password' => bcrypt(rand(1, 100)),
            ];
        }
        DB::table('users')->insert($data);
    }
}
