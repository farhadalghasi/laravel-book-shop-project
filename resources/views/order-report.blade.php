@extends('pages.master')

@section('link')
    @parent
    <link href="/css/table.css" rel="stylesheet" type="text/css">
@endsection
@section('main')
<table class="table">
    <thead>
        <tr>
            <th>شناسه</th>
            <th> ایمیل کاربر </th>
            <th> نام کتاب </th>
            <th>قیمت</th>
            <th>وضعیت خرید</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->book->id }}</td>
                <td>{{ $order->order->user->email }}</td>
                <td>{{$order->book->title}}</td>
                <td>{{$order->book->price}}</td>
                <td>
                    @if($order->order->status == 1)
                    پرداخت شد
                    @else
                    در انتظار
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection