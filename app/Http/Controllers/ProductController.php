<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stringable;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_show()
    {
        if(auth()->user()->role === 'admin')
        return view('add-product');
        else
        abort(403);
    }

    public function add(Request $request)
    {
        if(auth()->user()->role === 'admin'){
        $request->validate([
            'book' => 'required|mimes:pdf',
            'demo' => 'required|mimes:pdf',
            'image' => 'required|mimes:jpg,bmp,png',
        ]);

        $file=$request->file('book');
        $file_extension = $file->extension();
        $newfilename = sha1(time().'_'.rand(1000000000,1999999999)).'.'.$file_extension;
        $filepath='/storage/books/'. $newfilename;
        Storage::putFileAs('public/books',$file,$newfilename);

        $demo=$request->file('demo');
        $demo_extension = $demo->extension();
        $newdemoname = sha1(time().'_'.rand(1000000000,1999999999)).'.'.$demo_extension;
        $demopath='/storage/demos/'. $newdemoname;
        Storage::putFileAs('public/demos',$demo,$newdemoname);
        

        $image=$request->file('image');
        $image_extension = $image->extension();
        $newimagename = sha1(time().'_'.rand(1000000000,1999999999)).'.'.$image_extension;
        Storage::putFileAs('public/images',$image,$newimagename);
        $imagepath='/storage/images/'. $newimagename;

        $book= Book::create([
            'title' => $request->input('name'),
            'publisher'=> $request->input('publisher'),
            'price'=>$request->input('price'),
            'edition'=>$request->input('edition'),
            'publication_year'=>$request->input('year'),
            'book_file'=>$filepath,
            'demo_file'=>$demopath,
            'image' => $imagepath,
            'caption'=>$request->input('caption'),
        ]);
        
        $author= Author::create([
            'name' => $request->input('author'),
        ]);
        $book->authors()->attach($author->id);
        $book->categories()->attach($request->input('categories'));
        return redirect()->back();
        }else
        abort(403);
    }

    public function show()
    {
        if(auth()->user()->role == 'admin')
        {
            $books = Book::all();
        return view('products',[
            'books' => $books
        ]);
        }
        else
        abort(403);
    }

    public function edit_show($id)
    {
        if(auth()->user()->role === 'admin')
        {
            $book = Book::findOrFail($id);
            $categories = $book->categories()->pluck('id')->toArray();
            return view('edit-product',[
                'book'=> $book,
                'categories' => $categories
            ]);
        }
        else
        abort(403);
    }

    public function edit(Request $request , $id)
    {
        if(auth()->user()->role ==='admin'){
            $validate_data=$request->validate([
                'name' => 'required',
                'publisher' => 'required',
                'price' => 'required',
                'edition' => 'required',
                'year' => 'required',
                'categories' => 'required',
                'caption' => 'required',
            ]);
    
            $book = Book::findOrFail($id);
    
            if(is_null($book))
            {
                abort(404);
            }
            $book->update($validate_data);
            $book->categories()->detach();
            $book->categories()->attach($request->input('categories'));
            return back();
            }else
            abort(403);
    }

    public function delete($id)
    {
        if(auth()->user()->role == 'admin')
        {
          $book = Book::findOrFail($id);
          $book->status = false;
          $book->save();
          return back();
        }
        else
        abort(403);
    }

    public function recovery($id)
    {
        if(auth()->user()->role == 'admin')
        {
          $book = Book::findOrFail($id);
          $book->status = true;
          $book->save();
          return back();
        }
        else
        abort(403);
    }

    public function report()
    {
        if(auth()->user()->role == 'admin')
        {
            $orderitems = OrderItem::all();
           return view('order-report',[
            'orders' => $orderitems
           ]);
        }
        else
        abort(403);
    }
}
