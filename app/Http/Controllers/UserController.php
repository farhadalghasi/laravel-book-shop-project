<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('user_panel');
    }

    public function books()
    {
        $user_id = auth()->user()->id;
        $baskets=Order::where('user_id','=',$user_id)->where('status','=',1)->get();
        $message = '';
        if($baskets->isEmpty())
        {
            return view('my-books',[
                'message' => $message
            ]);
        }
        else
        {
            foreach($baskets as $basket)
            {
               $orders[] = OrderItem::where('order_id','=',$basket->id)->get();
            }
            foreach($orders as $items)
            {
                foreach($items as $item)
                {
                    $orderitems[] = $item;
                }
            }
            return view('my-books',[
                'orderitems' => $orderitems
            ]);
        }
    }
    public function edit_show()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('edit-profile',[
            'user' => $user
        ]);
    }
    public function edit(Request $request)
    {
        $user_id = auth()->user()->id;
        $validate_data=$request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = User::findOrFail($user_id);
        $user->update($validate_data);
        return back();
    }
}
