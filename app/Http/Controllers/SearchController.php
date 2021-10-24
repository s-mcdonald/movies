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
    public function index(Request $request, $phrase = '', int $page = 1)
    {
        return $this->handleRequest($request, $phrase, $page);
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
    public function store(Request $request, int $page = 1)
    {
        $items = $request->validate([
            'phrase' => 'required|min:1|max:255'
        ]);

        $phrase = trim($items['phrase']);

        return $this->handleRequest($request, $phrase, $page);
    }

    /**
     * handleRequest
     *
     * Since both POST and GET reuest are doing the same thing, we
     * can have a common method that handles tha majority
     * of the common logic, the get and post methods
     * can now just focus on individual routing
     * logic of the incoming data.
     *
     * @param  mixed $request
     * @param  mixed $phrase
     * @param  mixed $page
     * @return void
     */
    protected function handleRequest(Request $request, $phrase = '', int $page = 1)
    {
        $result = Movie::findAllByPhrase($phrase, $page);
  
        return view('search')
                ->withPaginator($result->paginator())
                ->withPage($page)
                ->withPhrase($phrase)
                ->withShow(($page == 1))
                ->withResults($result->items());
    }
}
