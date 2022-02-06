<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($this->faker->numberBetween(2,4));
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => $this->faker->sentences(3, true),
            'seo_text' => $this->faker->sentences(1, true),
            'released_at' => $this->faker->dateTimeBetween('-2 year', 'now'),
            'youtube' => 'npTcj2VoIxU',
            'noodle' => $this->faker->numberBetween(4,500),
            'spotify' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ];
    }
}
