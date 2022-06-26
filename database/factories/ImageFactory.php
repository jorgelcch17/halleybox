<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'products/'.$this->faker->biasedNumberBetween($min = 1, $max = 90).'.png' //$this->faker->image('public/storage/products', 640, 480, null,false)
        ];
    }
}
