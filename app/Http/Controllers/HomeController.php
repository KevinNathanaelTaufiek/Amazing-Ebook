<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index($locale = 'en')
    {
        App::setLocale($locale);
        return view('index', ['message' => __('nav.greeting')]);
    }
}
