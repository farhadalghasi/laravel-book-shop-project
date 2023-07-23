@extends('pages.master')

@section('link')
@parent
<link href="/css/dashboard.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
    <div class="container">
        <ul class="nav">
            <li><a href="/shopping-basket"> سبد خرید </a></li>
            <li><a href="/my-books">کتاب های من</a></li>
            <li><a href="/edit-profile"> ویرایش مشخصات </a></li>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button>خروج</button>
                </form>
            </li>
        </ul>
    </div>
@endsection