<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory()->create([
            'name'=> 'Soccer',
            'image_path' => 'https://i.imgur.com/jYOPSs6.png',
            'short_name' => 'soccer'
        ]);

        Category::factory()->create([
            'name'=> 'Anime and Manga',
            'image_path' => 'https://i.imgur.com/51R0Ui4.png',
            'short_name' => 'anime_and_manga'
        ]);

        Category::factory()->create([
            'name'=> 'Animals',
            'image_path' => 'https://i.imgur.com/S1OPVB6.jpeg',
            'short_name' => 'animals'
        ]);

        Category::factory()->create([
            'name'=> 'Food and Drink',
            'image_path' => 'https://i.imgur.com/Rb1k4ie.jpeg',
            'short_name' => 'food_and_drink'
        ]);

        Category::factory()->create([
            'name'=> 'Gaming',
            'image_path' => 'https://i.imgur.com/eafgejR.jpeg',
            'short_name' => 'gaming'
        ]);

        Category::factory()->create([
            'name'=> 'Brawlhalla',
            'image_path' => 'https://i.imgur.com/Lf8cfTp.png',
            'short_name' => 'brawlhalla'
        ]);

        Category::factory()->create([
            'name'=> 'Cartoons',
            'image_path' => 'https://i.imgur.com/W4YsiYl.jpeg',
            'short_name' => 'cartoons'
        ]);

        Category::factory()->create([
            'name'=> 'Movies',
            'image_path' => 'https://i.imgur.com/qUHeE0Q.jpeg',
            'short_name' => 'movies'
        ]);

        Category::factory()->create([
            'name'=> 'Music',
            'image_path' => 'https://i.imgur.com/sbkVkHE.png',
            'short_name' => 'music'
        ]);

        Category::factory()->create([
            'name'=> 'Marvel',
            'image_path' => 'https://i.imgur.com/RPEJkY2.jpeg',
            'short_name' => 'marvel'
        ]);

        Category::factory()->create([
            'name'=> 'DC',
            'image_path' => 'https://i.imgur.com/pjdnSIw.png',
            'short_name' => 'dc'
        ]);
    }
}
