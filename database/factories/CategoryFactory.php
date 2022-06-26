<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'categories/'.$this->faker->biasedNumberBetween($min = 1, $max = 90).'.png' //$this->faker->image('public/storage/categories', 640, 480, null, false)
        ];
    }
}
