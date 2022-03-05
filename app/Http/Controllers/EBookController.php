<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($locale = 'en')
    {
        App::setLocale($locale);
        $ebooks = EBook::all();

        return view('home', ['ebooks'=>$ebooks]);
    }

    public function show($id, $locale = 'en'){
        App::setLocale($locale);
        $ebook = EBook::find($id);

        return view('ebook.detail', ['ebook'=>$ebook]);
    }
}
