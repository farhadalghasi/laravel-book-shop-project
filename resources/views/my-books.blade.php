@extends('pages.master')

@section('main')

<h3>کتاب های من</h3>

    @foreach($orderitems as $orderitem)
        <a href="/book-page/{{$orderitem->book->id}}">
        <div class="post">
            <img src="{{$orderitem->book->image}}" width="150px" height="206px">
            <h5 class="title">{{$orderitem->book->title}} </h5>
            <p>قیمت: {{$orderitem->book->price}} تومان</p>
            <p>
                    @if($orderitem->book->score == -1)
                    امتیاز: -
                    @else
                    امتیاز: {{$orderitem->book->score}}
                    @endif
                </p>
        </div>
        </a>
    @endforeach
    
@endsection     