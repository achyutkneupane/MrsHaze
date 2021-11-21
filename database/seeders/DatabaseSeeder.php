<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        \App\Models\User::create([
            'name' => 'Mrs. Haze',
            'email' => 'info@mrshaze.me',
            'password' => Hash::make('Subani@123'),
            'email_verified_at' => now(),
        ]);
        \App\Models\Tag::factory(15)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Article::factory(30)->create();
        foreach(\App\Models\Article::get() as $article)
        {
            $article->tags()->sync(\App\Models\Tag::take($faker->numberBetween(1,15))->get());
            $article->addMediaFromUrl('https://dummyimage.com/1500x1500/000000/00CED1?text='.$article->slug)
                    ->toMediaCollection('cover');
        }
    }
}
