<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function basket()
    {
        $user_id = auth()->user()->id;
        $basket=Order::where('user_id','=',$user_id)->where('status','=',0)->get();
        $message='';
        if($basket->isEmpty())
        {
            $message="شما هیچ خریدی ندارید.";
            return view('shopping-basket',[
                'message' => $message,
            ]);
        }
        else
        {
            $basket = $basket[0];
            $orderitems = OrderItem::where('order_id','=',$basket->id)->get();
            if($orderitems->isEmpty())
            {
                $message="سبد خرید شما خالی است.";
                return view('shopping-basket',[
                    'message' => $message,
                ]);
            }
            else
            {
                
                return view('shopping-basket',[
                    'basket' => $basket,
                    'orderitems'=> $orderitems,
                    'message' => $message
                ]);
            }
            
        }
    }

    public function add($id)
    {
        $user_id = auth()->user()->id;
        $book = Book::findOrFail($id);
        $basket=Order::where('user_id','=',$user_id)->where('status','=',0)->get();
        if($basket->isEmpty())
        {
            $order=Order::create([
                    'user_id' => $user_id,
                    'price' => $book->price
            ]);

            OrderItem::create([
                'book_id' => $id,
                'price' => $book->price,
                'order_id' => $order->id
            ]);
            return back();
        }
        else
        {
            $basket = $basket[0];
            OrderItem::create([
                'book_id' => $id,
                'price' => $book->price,
                'order_id' => $basket->id
            ]);

            $orderitems = OrderItem::where('order_id','=',$basket->id)->get();
            $price = $orderitems->sum('price');
            $basket->price = $price;
            $basket->save();
            return back();
        }

    }

    public function delete($id)
    {
        $order = OrderItem::findOrFail($id);
        $price = $order->order->price - $order->price;
        $order->order->price = $price;
        $order->order->save();
        $order->delete();
        return back();
    }

    public function pay($id)
    {
        $basket = Order::findOrFail($id);
        $basket->status = true;
        $basket->save();
        return redirect('/my-books');
    }
}
