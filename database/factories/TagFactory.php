<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($this->faker->numberBetween(3,7));
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
        ];
    }
}
