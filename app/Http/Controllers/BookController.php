<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrfail($id);
        $auhtors = $book->authors()->pluck('name');
        $categories = $book->categories()->pluck('title');
        $comments = $book->load('comments')->comments;
        $check = 0;
        if(auth()->check())
        {
            $orders=Order::where('user_id','=',auth()->user()->id)->where('status','=',1)->get();
            if(!$orders->isEmpty())
            {
                foreach($orders as $order)
                {
                    $bookids=$order->order_items()->pluck('book_id');
                    foreach($bookids as $bookid)
                    {
                        if( $bookid == $id)
                        {
                            $check = 1;
                            break;
                        }
                    }
                }
            }
        }
        return view('book-page',[
            'book'=>$book,
            'authors'=> $auhtors,
            'categories'=> $categories,
            'comments' => $comments,
            'check' => $check
        ]);
    }

    public function demo($id)
    {
        $book= Book::findOrFail($id);
        $path = public_path($book->demo_file);
        return response()->download($path,$book->title.".pdf");
    }

    public function book($id)
    {
        $book= Book::findOrFail($id);
        $path = public_path($book->book_file);
        return response()->download($path,$book->title.".pdf");
    }
}
