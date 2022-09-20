<?php

namespace Database\Seeders;

use App\Models\Color;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name'=>'Red',
            'code'=>'#accfg'


        ]);
        Color::create([
            'name'=>'Black',
             'code' =>'#ffff'
        ]);
    }
}
