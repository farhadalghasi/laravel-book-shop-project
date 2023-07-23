@extends('pages.master')

@section('link')
    @parent
    <link href="/css/table.css" rel="stylesheet" type="text/css">
@endsection
@section('main')
<table class="table">
    <thead>
        <tr>
            <th> عنوان </th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td><a href="/category-books/{{$category->id}}"> {{ $category->title }} </a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection