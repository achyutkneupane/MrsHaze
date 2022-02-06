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
        $title = $this->faker->word();
        return [
            'title' => ucwords($title),
            'slug' => \Illuminate\Support\Str::slug($title),
        ];
    }
}
