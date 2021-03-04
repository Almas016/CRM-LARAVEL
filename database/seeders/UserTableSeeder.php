<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['id'=>1],[
            'name'=> 'Namazbayev Almas',
            'email' => 'test@root.com',
            'password'=> '$2y$10$cvDE6uku0XuFPQN2KkYN/eKzmE.VhJ3P7y48fLfpZhC9Xriucp5J6'//password
        ]);
    }
}
