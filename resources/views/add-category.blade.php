@extends('pages.master')

@section('link')
    @parent
    <link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
<div class="form">
        <form action="{{route('add-category')}}" method="post">
            @csrf
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
                    <label> موضوع :</label>
                </div>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <input type="submit" value="افزودن" name="submit" class="sub">
            </div>
        </form>
    </div>
@endsection