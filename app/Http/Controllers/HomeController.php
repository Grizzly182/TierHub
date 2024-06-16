<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function home(){
        $categories = Category::orderBy('short_name')->limit(6)->get();
        $templates = Template::approved()->limit(6)->get();
        return view('home', compact('categories', 'templates'));
    }
}
