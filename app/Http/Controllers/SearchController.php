<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(Request $request, string $phrase = '')
    {
        return view('search', compact('phrase'));
    } 

    public function store(Request $request)
    {
        $userkey = env('OMDBAPI_API_KEY');
        $activated = (Str::length($userkey) > 0 );        
        $phrase = trim($request->input('s'));

        $url = 'http://www.omdbapi.com/?apikey='.$userkey.'&t='.$phrase;

        $response = Http::get($url);
        
        if ($response->successful()) {

            return response()->json($response->body(), 204);
        }

        return view('search', compact('phrase','userkey', 'activated'));
    }    
}
