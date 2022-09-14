<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',

               'email'=>'admin@gmail.com',

                'type'=>1,

               'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=>'User',

               'email'=>'user@gmail.com',

                'type'=>0,

               'password'=> bcrypt('12345678'),
        ]);
    }
}
