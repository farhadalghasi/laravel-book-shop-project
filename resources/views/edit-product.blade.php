@extends('pages.master')

@section('link')
    @parent
    <link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
    <div class="form">
        <form action="/edit-product/{{$book->id}}" method="post"  >
            @csrf
            @method('put')
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
                <input type="text" name="name" id="name" value="{{$book->title}}">
            </div>

            <div>
                <div class="labl">
                    <label> ناشر :</label>
                </div>
                <input type="text" name="publisher" id="publisher" value="{{$book->publisher}}">
            </div>

            <div>
                <div class="labl">
                    <label>قیمت  :</label>
                </div>
                <input type="number" name="price" id="price" value="{{$book->price}}">
            </div>

            <div>
                <div class="labl">
                    <label> ویرایش  :</label>
                </div>
                <input type="text" name="edition" id="edition" value="{{$book->edition}}">
            </div>

            <div>
                <div class="labl">
                    <label>سال انتشار  :</label>
                </div>
                <input type="text" name="year" id="year" value="{{$book->publication_year}}">
            </div>

            <div>
                <div class="labl">
                    <label>دسته بندی:</label>
                </div>
                <select name="categories[]" multiple>
                    @foreach(\App\Models\Category::all() as $category)
                     <option value="{{ $category->id }}" {{ in_array( $category->id , $categories ) ? 'selected' : '' }} > {{ $category->title }} </option>
                    @endforeach
                </select>
            </div>

            <div>
                <div class="labl">
                    <label> توضیحات:</label>
                </div>
                <textarea name="caption">{{$book->caption}}</textarea>
            </div>

            <div>
                <input type="submit" value="بروز رسانی " name="submit" class="sub">
            </div>
        </form>
    </div>
@endsection