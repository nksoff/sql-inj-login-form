<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     *
     */
    public function run()
    {
        foreach (range(1, 50) as $index) {
            User::create([
                'name' => 'Пользователь ' . $index,
                'email' => $index . '@user.ru',
                'password' => md5($index . rand() . 'user'),
            ]);
        }

        User::create([
            'name' => 'Администратор',
            'email' => 'admin@user.ru',
            'password' => md5('admin' . rand()),
        ]);
    }
}
