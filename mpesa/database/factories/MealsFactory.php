<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        $image =$this->faker->image(
            storage_path("app/data"),
            800,
            600
        );

        return [
            'name'=>$this->faker->word,
            'category'=>$this->faker->sentence,
            'image' => $this->faker->image('public/storage/food',540,400, null, false)
            // 'url' => $this->faker->imageUrl(800,600), 'file_path' => "app/data/" . basename($image),

        ];
    }
}
