<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Subcategory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;
        $brand = $category->brands->random();

        if($subcategory->color){
            $quantity= null;
        }else{
            $quantity = 15;
        }
        return [
            'name' =>$name,
            'slug' =>Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99,49.99,99.99]),
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'status' => 2,
        ];
    }
}
