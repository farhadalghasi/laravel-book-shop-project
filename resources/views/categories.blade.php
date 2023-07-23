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
            <th>حذف</th>
            <th>ویرایش</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <form action="/categories/{{ $category->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">حذف</button>
                    </form>
                </td>
                <td><a href="/edit-category/{{ $category->id }}" class="btn btn-warning">ویرایش</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
