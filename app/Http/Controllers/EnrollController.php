<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnrollController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function show(){
        return view('enroll');
    }

    public function add(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
        ]);

        return back();
    }
}
