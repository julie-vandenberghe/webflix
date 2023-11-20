<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //SANS L'API
        // Category::factory(10)->create();
        // Category::factory()->create(['name' => 'Action']);

        // Movie::factory(100)->create(function() {
        //     // Ici, c'est comme une boucle.
        //     return [
        //         'category_id' => rand(1, 10)];
        // });

        //AVEC L'API
        $apiKey = '1acc688a333a713673ba5711f8f671d0';
        $baseUrl = 'https://api.themoviedb.org/3';

        //Catégories
        // On fait une requête sur une API
        //withoutVerifying() > désactive la 
        $genres = Http::withoutVerifying()->get($baseUrl.'/genre/movie/list?language=fr-FR&api_key='.$apiKey)->json('genres'); 

        Category::factory()->createMany($genres);

      
    }
}
