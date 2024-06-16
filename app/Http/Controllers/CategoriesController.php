<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Template;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category){
        $templates = $category->templates();
        return view('categories.show', compact('category', 'templates'));
    }

    public function create()
    {
        return view('categories.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:categories',
        ]);

        $short_name = strtolower(str_replace(' ', '_',trim($request->name)));

        $category = new Category();
        $category->name = $request->name;
        $category->short_name = $short_name;
        $category->image_path = Image::store($request->file('image'));
        $category->save();
        return redirect('/categories');
    }
}
