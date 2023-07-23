<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['list','books']);
        
    }
    public function index()
    {
        $categories = Category::all();
        if(auth()->user()->role ==='admin')
        return view('categories',[
            'categories' => $categories
        ]);
        else
        abort(403);
    }

    public function show()
    {
        if(auth()->user()->role ==='admin')
        return view('add-category');
        else
        abort(403);
    }

    public function add(Request $request)
    {
        if(auth()->user()->role ==='admin'){
        $validate_data=$request->validate([
            'title' => 'required'
        ]);
        
        Category::create([
            'title' => $request->input('title'),
        ]);

        return redirect()->back();
        }else
        abort(403);

    }

    public function edit_view($id){
        if(auth()->user()->role ==='admin'){
            $category = Category::findOrFail($id);
            return view('edit-category',[
                'category' => $category
            ]);
        }else
        abort(403);
       
    }

    public function edit(Request $request,$id)
    {
        if(auth()->user()->role ==='admin'){
        $validate_data=$request->validate([
            'title' => 'required'
        ]);

        $category = Category::findOrFail($id);

        if(is_null($category))
        {
            abort(404);
        }
        $category->update($validate_data);
        return back();
        }else
        abort(403);
    }

    public function delete($id)
    {
        if(auth()->user()->role ==='admin'){
        $category = Category::findOrFail($id);

        $category -> delete();

        return back();
        }else
        abort(403);
    }

    public function list()
    {
        $categories = Category::all();
        return view('categories-list',[
            'categories' => $categories
        ]);
    }

    public function books($id)
    {
        $category = Category::findOrFail($id);
        $books = $category->books()->get();
        return view('category-books',[
            'category' => $category,
            'books' => $books
        ]);
    }
}
