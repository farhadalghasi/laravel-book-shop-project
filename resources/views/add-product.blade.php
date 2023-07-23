@extends('pages.master')

@section('link')
    @parent
    <link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
    <div class="form">
        <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data" >
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
                    <label>  نام کتاب:</label>
                </div>
                <input type="text" name="name" id="name">
            </div>

            <div>
                <div class="labl">
                    <label>نام نویسنده :</label>
                </div>
                <input type="text" name="author" id="author" >
            </div>

            <div>
                <div class="labl">
                    <label> ناشر :</label>
                </div>
                <input type="text" name="publisher" id="publisher" >
            </div>

            <div>
                <div class="labl">
                    <label>قیمت  :</label>
                </div>
                <input type="number" name="price" id="price">
            </div>

            <div>
                <div class="labl">
                    <label> ویرایش  :</label>
                </div>
                <input type="text" name="edition" id="edition">
            </div>

            <div>
                <div class="labl">
                    <label>سال انتشار  :</label>
                </div>
                <input type="text" name="year" id="year">
            </div>

            <div>
                <div class="labl">
                    <label>فایل کتاب  :</label>
                </div>
                <input type="file" name="book" id="book">
            </div>

            <div>
                <div class="labl">
                    <label>فایل دمو  :</label>
                </div>
                <input type="file" name="demo" id="demo">
            </div>

            <div>
                <div class="labl">
                    <label> عکس کتاب  :</label>
                </div>
                <input type="file" name="image" id="image">
            </div>

            <div>
                <div class="labl">
                    <label>دسته بندی:</label>
                </div>
                <select name="categories[]" multiple>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value=" {{$category->id}} ">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <div class="labl">
                    <label> توضیحات:</label>
                </div>
                <textarea name="caption"></textarea>
            </div>

            <div>
                <input type="submit" value="افزودن " name="submit" class="sub">
            </div>
        </form>
    </div>
@endsection