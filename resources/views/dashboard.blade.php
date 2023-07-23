@extends('pages.master')

@section('link')
@parent
<link href="/css/dashboard.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
    <div class="container">
        <ul class="nav">
            <li><a href="/report-orders"> سفارشات </a></li>
            <li><a href="{{route('add-product')}}"> افزودن محصول </a></li>
            <li><a href="/products"> ویرایش محصولات </a></li>
            <li><a href="{{route('add-category')}}"> افزودن دسته بندی</a></li>
            <li><a href="/categories"> ویرایش دسته بندی </a></li>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button>خروج</button>
                </form>
            </li>
        </ul>
    </div>
@endsection