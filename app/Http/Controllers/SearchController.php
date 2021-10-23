<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class SearchController extends BaseController
{
    use ValidatesRequests;

    /**
     * index
     *
     * Display the Search page | Entry Point
     *
     * Here we fetch the api key from the .env (environment) file.
     * For this example if the key has any lenth then we will
     * simply assume that the key is activated.
     * This data is passed to the client.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $userkey = env('OMDBAPI_API_KEY');
        $activated = (Str::length($userkey) > 0 );
        $phrase = '';
        return view('search', compact('phrase','userkey', 'activated'));
    }

    /**
     * store
     *
     * This endpoint is responsible for displying the
     * search page, before we have posted for
     * results. This is the get request.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $items = $request->validate([
            's' => 'required|min:1|max:255'
        ]);

        $phrase = trim($items['s']);
        $results = Movie::findByPhrase($phrase, $page = 1);
        return view('search', compact('phrase','results'));
    }
}
