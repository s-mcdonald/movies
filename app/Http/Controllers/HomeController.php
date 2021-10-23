<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('home');
    }
}
