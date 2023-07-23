@extends('pages.master')

@section('header')
    @parent
    <div class="poster" id="poster">
    </div>
@endsection

@section('main')
        @php
            $news=$books->sortByDesc('publication_year');
            $populars = $books->sortByDesc('score');
        @endphp
        <div class="slider">
            <p>جدید ترین ها</p>
            @foreach($news as $book)
            <a href="book-page/{{$book->id}}">
            <div class="post">
                <img src="{{$book->image}}" width="150px" height="206px">
                <h5 class="title">{{$book->title}} </h5>
                <p>قیمت: {{$book->price}} تومان</p>
                <p>
                    @if( $book->score  == '-1')
                    امتیاز: -
                    @else
                    امتیاز: {{$book->score}}
                    @endif
                </p>
            </div>
            </a>
            @endforeach
        </div>

        <div class="slider">
            <p>محبوب ترین ها</p>
            @foreach($populars as $book)
            <a href="book-page/{{$book->id}}">
            <div class="post">
                <img src="{{$book->image}}" width="150px" height="206px">
                <h5 class="title">{{$book->title}} </h5>
                <p>قیمت: {{$book->price}} تومان</p>
                <p>
                    @if($book->score == -1)
                    امتیاز: -
                    @else
                    امتیاز: {{$book->score}}
                    @endif
                </p>
            </div>
            </a>
            @endforeach
        </div>

        <div class="slider">
            <p>پیشنهاد ما</p>
            @foreach($books as $book)
            <a href="book-page/{{$book->id}}">
            <div class="post">
                <img src="{{$book->image}}" width="150px" height="206px">
                <h5 class="title">{{$book->title}} </h5>
                <p>قیمت: {{$book->price}} تومان</p>
                <p>
                    @if($book->score == -1)
                    امتیاز: -
                    @else
                    امتیاز: {{$book->score}}
                    @endif
                </p>
            </div>
            </a>
            @endforeach
        </div>

@endsection