@extends('pages.master')

@section('link')
@parent
<link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
    <div class="form">
        <form action="/search" method="post">
            @csrf
            @if ($errors->any())
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
                    <label> نام کتاب:</label>
                </div>
                <input type="text" name="name" id="name">
            </div>

            <div>
                <div class="labl">
                    <label>نویسنده:</label>
                </div>
                <input type="text" name="author" id="creator">
            </div>

            <div>
                <div class="labl">
                    <label>ناشر:</label>
                </div>
                <input type="text" name="publisher" id="creator">
            </div>

            <div>
                <input type="submit" value="جستجو" name="submit" class="sub">
            </div>
        </form>
    </div>
@endsection