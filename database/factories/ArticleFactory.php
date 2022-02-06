<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
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
            'slug' => Str::slug($title),
            'category_id' => $this->faker->numberBetween(1,5),
            'writer_id' => 1,
            'views' => 0,
            'content' => $this->faker->text(5000),
            'description' => $this->faker->text($this->faker->numberBetween(300,750)),
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
