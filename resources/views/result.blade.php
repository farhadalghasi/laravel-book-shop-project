@extends('pages.master')

@section('main')

<h3> نتیجه جستجو </h3>


    @foreach($books as $book)
        <a href="/book-page/{{$book->id}}">
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
@endsection        