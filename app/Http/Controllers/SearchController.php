<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show()
    {
        return view('search');
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $author =  $request->input('author');
        $publisher =  $request->input('publisher');

        if(! is_null($name) && ! is_null($author) && ! is_null($publisher))
        {
            $books = Book::where('title','like',"%$name%")->where('publisher','like',"%$publisher%")->whereHas('authors',function($q) use($author){
                    $q->where('name','like',"%$author%");
            })->get();
            return view('result',[
                'books' => $books
            ]);
        }

        else if(! is_null($name) && ! is_null($author) &&  is_null($publisher))
        {
            $books = Book::where('title','like',"%$name%")->whereHas('authors',function($q) use($author){
                $q->where('name','like',"%$author%");
            })->get();
             return view('result',[
                'books' => $books
            ]);
        }

        else if(! is_null($name) &&  is_null($author) && ! is_null($publisher))
        {
            $books = Book::where('title','like',"%$name%")->where('publisher','like',"%$publisher%")->get();
            return view('result',[
                'books' => $books
            ]);
        }

        else if( is_null($name) && ! is_null($author) && ! is_null($publisher))
        {
            $books = Book::where('publisher','like',"%$publisher%")->whereHas('authors',function($q) use($author){
                $q->where('name','like',"%$author%");
            })->get();
            return view('result',[
                'books' => $books
            ]);
        }

        else if(! is_null($name) &&  is_null($author) &&  is_null($publisher))
        {
            $books = Book::where('title','like',"%$name%")->get();
            return view('result',[
                'books' => $books
            ]);
        }

        else if( is_null($name) && ! is_null($author) &&  is_null($publisher))
        {
            $authors = Author::where('name','like',"%$author%")->get();
            foreach($authors as $person)
            {
                $results[]=$person->books()->get();
            }
            foreach($results as $items)
            {
                foreach($items as $item)
                $books[] = $item;
            }
            return view('result',[
                'books' => $books
            ]);
        }

        else if( is_null($name) && is_null($author) && !is_null($publisher))
        {
            $books = Book::where('publisher','like', "%$publisher%")->get();
            return view('result',[
                'books' => $books
            ]);
        }

        else
        {
            $request->validate([
                'name' => 'required',
                'author' => 'required',
                'publisher'=> 'required'
            ]);
        }
    }
}
