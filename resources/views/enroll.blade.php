@extends('pages.master')

@section('link')
@parent
<link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')

<div class="form">
        <form action="{{route('enroll')}}" method="post">
            @csrf
            <div>
                <div class="labl">
                    <label> نام :</label>
                </div>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <div class="labl">
                    <label> ایمیل :</label>
                </div>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <div class="labl">
                    <label> پسورد :</label>
                </div>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <div class="labl">
                    <label>شماره تماس :</label>
                </div>
                <input type="text" name="phone" id="phone">
            </div>
            <div>
                <input type="submit" value="ثبت نام" name="submit" class="sub">
            </div>
        </form>
    </div>

@endsection