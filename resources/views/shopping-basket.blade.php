@extends('pages.master')

@section('link')
    @parent
    <link href="/css/table.css" rel="stylesheet" type="text/css">
    <link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection
@section('main')

@if($message)
{
    <div class="alert">
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            </div>
}
@else
{
    <table class="table">
    <thead>
        <tr>
            <th>شناسه</th>
            <th> عنوان </th>
            <th>قیمت</th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderitems as $orderitem)
            <tr>
                <td>{{ $orderitem->id }}</td>
                <td>{{ $orderitem->book->title }}</td> 
                <td>{{$orderitem->book->price}}</td>
                <td>
                    <form action="/shopping-basket/{{$orderitem->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="pay">
   <span> مبلغ قابل پرداخت :  </span>
   <span>
    {{$basket->price}} تومان
   </span>
   <form action="/shopping-basket/{{$basket->id}}"  method="post">
        @csrf
        <button class="btn-info">پرداخت</button>
   </form>
</div>
}
@endif
@endsection