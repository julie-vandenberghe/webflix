<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'email' => 'julie@julie.com',
        ]);

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
        //withoutVerifying() > désactive le HTTPS sous WIndows 
        $genres = Http::withoutVerifying()->get($baseUrl.'/genre/movie/list?language=fr-FR&api_key='.$apiKey)->json('genres'); 

        Category::factory()->createMany($genres); //Ici on aurait aussi pu faire un "foreach". Tant qu'il y a des genres, cela va utiliser la factory pour les afficher 


        //Films
        $movies1 = Http::withoutVerifying()->get($baseUrl.'/movie/now_playing?language=fr-FR&api_key='.$apiKey)->json('results'); 

        //Pour récupérer d'autres films (manière un peu moche, on aurait pu faire une boucle aussi)
        $movies2 = Http::withoutVerifying()->get($baseUrl.'/movie/now_playing?language=fr-FR&page=2&api_key='.$apiKey)->json('results'); 

        $movies = [...$movies1, ...$movies2]; // [1, 2, 3, 4] au lieu de [[1, 2], [3, 4]]


        foreach ($movies as $movie) {
            $movie = Http::withoutVerifying()
            ->get($baseUrl. '/movie/'. $movie['id'] .'?language=fr-FR&append_to_response=videos&api_key='.$apiKey)
            ->json(); 
            //&append_to_response=videos > pour récupérer les liens Youtube

            Movie::factory()->create([
                'title' => $movie['title'],
                'synopsis' => $movie['overview'],
                'duration' => $movie['runtime'],
                'cover' => 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
                'released_at' => $movie['release_date'], 
                'youtube' => $movie['videos']['results'][0]['key'] ?? null,
                'category_id' => $movie['genres'][0]['id'] ?? null,
            ]);

        };
      
    }
}
