<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function bookList()
    {
        $books=Book::where('status','=',1)->get();
        return view('books-list',['books'=>$books]);
    }
}
