<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    //create function index
    public function indexHome($locale='en'){
        App::setlocale($locale);
        $books = EBook::all();
        return view('home',['books'=>$books]);
    }
}
