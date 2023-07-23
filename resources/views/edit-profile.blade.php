@extends('pages.master')

@section('link')
    @parent
    <link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
<div class="form">
        <form action="/edit-profile" method="post">
            @csrf
            @method('put')
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <div class="labl">
                    <label> نام :</label>
                </div>
                <input type="text" name="name" id="title" value="{{ $user->name }}">
            </div>
            <div>
                <div class="labl">
                    <label> ایمیل :</label>
                </div>
                <input type="email" name="email" id="title" value="{{ $user->email }}">
            </div>
            <div>
                <input type="submit" value="بروز رسانی" name="submit" class="sub">
            </div>
        </form>
    </div>
@endsection