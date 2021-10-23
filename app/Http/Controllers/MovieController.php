<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

/**
 * MovieController
 * 
 * The MovieController is responsible for tasks
 * related to a specific Movie. Such as
 * CRUD actions typically.
 */
class MovieController extends BaseController
{
    /**
     * index
     *
     * This controller using DI and also includes
     * a request object. Thgis object is
     * checking for a max search string.
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request, Movie $movie)
    {
        $items = $request->validate([
            'p' => 'sometimes|min:1|max:50'
        ]);

        $phrase = isset($items['p']) ? Str::replace(" ","%20", $items['p']) : '';

        return view('movie', compact('movie','phrase'));
    }
}
