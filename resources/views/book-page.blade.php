@extends('pages.master')

@section('link')
  @parent
  <link href="/css/book-page.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
  <h1> {{ $book->title }} </h1>
  {{$book->image}}
  <div class="image">
    <img src="{{$book->image}}" width="300px" height="500px">
  </div>
  <table class="table">
    <thead>
        <tr>
          <th>نام کتاب</th>
          <th>قیمت</th>
          <th>نسخه ویرایش</th>
          <th>ناشر</th>
          <th>سال انتشار</th>
          <th>امتیاز</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->price . "تومان "}}</td>
        <td>{{$book->edition}}</td>
        <td>{{$book->publisher}}</td>
        <td>{{$book->publication_year}}</td>
        <td>
            @if($book->score == -1)
            امتیاز: -
            @else
            امتیاز: {{$book->score}}
            @endif
        </td>
      </tr>
    </tbody>
  </table>
  <div class="author">
    <span>نویسندگان : </span>
    <span>
      @foreach($authors as $author)
        {{$author.' '}}
      @endforeach
    </span>
  </div>
  <h1>درباره کتاب</h1>
  <div class="definition">
    {{$book->caption}}
  </div>

  <div class="download">
    <a href="/download-demo/{{$book->id}}" > <button class="btn-info">دانلود فایل دمو</button> </a>
    @if($check == 1)
    <a href="/download-book/{{$book->id}}" > <button class="btn-info">دانلود فایل کتاب</button> </a>
    @endif
    @if($check == 0)
    <form action="/add-basket/{{$book->id}}" method="post">
          @csrf
          <input type="submit" class="btn-info" value="خرید کتاب">
    </form>
   @endif
  </div>

  <div class="stick">
    <span>برچسب ها :</span>
    <span>
      @foreach($categories as $category)
        {{'#'.' '.$category}}
      @endforeach
    </span>
  </div>

  <div class="comment">
    <h1> نظرات خود را برای ما ارسال کنید</h1>
    <form action="/add-score/{{$book->id}}" method="post">
      @csrf
          <div class="labl">
            <label>امتیاز خود را ثبت کنید.</label>
          </div>
          @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <select name="score">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected>5</option>
          </select>
          <div>
            <input type="submit" value="ثبت" name="submit" class="sub">
          </div>
    </form>
  
    <form action="/add-comment/{{$book->id}}" method="post">
      @csrf
          <div>
            <div class="labl">
              <label>نظر خود را اینجا بنویسید:</label>
            </div>
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <textarea name="comment"></textarea>
          </div>
          <div>
            <input type="submit" value="ارسال" name="submit" class="sub">
          </div>
       </div>
    </form>
    <div class="comment">
        <h2>نظرات شما</h2>
        @foreach($comments as $comment)
        <h4>{{$comment->user->name}}</h4>
          <p> {{$comment->comment}} </p>
        @endforeach
    </div>
  </div>
@endsection   
