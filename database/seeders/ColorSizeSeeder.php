<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = Size::all();

        // $sizes->each(function ($size) {
        //     $size->colors()->attach(rand(1, 4), ['quantity' => rand(1, 10)]);
        // });

        foreach($sizes as $size){
            $size->colors()
                ->attach([
                    1 => ['quantity' => rand(1, 10)],
                    2 => ['quantity' => rand(1, 10)],
                    3 => ['quantity' => rand(1, 10)],
                    4 => ['quantity' => rand(1, 10)],
                ]);
            }
    }
}
