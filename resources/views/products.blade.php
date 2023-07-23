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
            <th> عنوان </th>
            <th> قیمت </th>
            <th> ناشر </th>
            <th>حذف</th>
            <th>ویرایش</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->publisher}}</td>
                <td>
                    @if($book->status == true)
                    <form action="/edit-product/{{ $book->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    @else
                    <form action="/edit-product/{{ $book->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger">بازگردانی</button>
                    </form>
                    @endif
                </td>
                <td><a href="/edit-product/{{ $book->id }}" class="btn btn-warning">ویرایش</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection