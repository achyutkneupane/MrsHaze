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
        \App\Models\User::create([
            'name' => 'Mrs. Haze',
            'email' => 'info@mrshaze.me',
            'password' => Hash::make('Subani@123'),
            'email_verified_at' => now(),
        ]);
        if (env('APP_ENV') == 'local') {
            $faker = \Faker\Factory::create();
            \App\Models\Tag::factory(15)->create();
            \App\Models\Category::factory(5)->create();
            \App\Models\Article::factory(9)->create();
            foreach (\App\Models\Article::get() as $article) {
                $article->tags()->sync(\App\Models\Tag::take($faker->numberBetween(1, 15))->get());
                $article->addMediaFromUrl('https://dummyimage.com/1000x1000/000000/00CED1?text=' . $article->slug)
                    ->toMediaCollection('cover');
            }
            \App\Models\Song::factory(20)->create();
            foreach (\App\Models\Song::get() as $song) {
                $song->addMediaFromUrl('https://dummyimage.com/500x500/000000/00CED1?text=' . $song->slug)
                    ->toMediaCollection('cover');
            }
            \App\Models\Video::factory(20)->create();
            foreach (\App\Models\Video::get() as $video) {
                $video->addMediaFromUrl('https://dummyimage.com/500x500/000000/00CED1?text=' . $video->slug)
                    ->toMediaCollection('cover');
            }
        }
    }
}
