<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;

class Movie 
{
    protected $movie_title;
    
    /**
     * __construct
     *
     * @param  mixed $response
     * @return void
     */
    public function __construct($response)
    {
        $this->year = $response->Year;
        $this->title = $response->Title;
        $this->rated = $response->Rated;
        $this->genre = $response->Genre;
        $this->plot = $response->Plot;
        $this->imdb = $response->imdbID;
        $this->poster = $response->Poster;
        $this->runtime = $response->Runtime;
        $this->imdb_score = $response->imdbRating;
    }
    
    /**
     * fetch
     *
     * Call external api and decode posiotive result.
     * 
     * @todo - Implement alternate identification methods.
     * @param  mixed $field The field to search for
     * @param  mixed $value If $field is imdb then value is the imdb id
     * @return Movie or NULL
     */
    public static function fetch($field, $value) : ?Movie
    {
        $userkey = env('OMDBAPI_API_KEY');

        $url = "http://www.omdbapi.com/?apikey={$userkey}&i={$value}&type=movie&plot=full&r=json";
        $response = Http::get($url);

        if ($response->successful()) {
            $movie_obj = json_decode($response->body());
            return new self($movie_obj);
        }

        return NULL;
    }
    
    /**
     * findByPhrase
     *
     * @param  mixed $phrase
     * @param  mixed $page
     * @return void
     */
    public static function findByPhrase($phrase = "", int $page = 1)
    {
        $results = [];
        $userkey = env('OMDBAPI_API_KEY');
        $url = "http://www.omdbapi.com/?apikey={$userkey}&s={$phrase}&page={$page}&movie=movie&v=1";
        $response = Http::get($url);

        if ($response->successful()) {
            $results = $response->body();
        }

        return json_decode($results);
    }
}
