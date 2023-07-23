<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard_view');
    }
    public function show(){
        $books=Book::where('status','=',1)->get();
        return view('index',[
            'books'=> $books,
        ]);
    }
    public function dashboard_view()
    {
        if(auth()->user()->role === 'admin')
        {
            return view('dashboard');
        }
        else
        {
            return view('index');
        }
        
    }
}
