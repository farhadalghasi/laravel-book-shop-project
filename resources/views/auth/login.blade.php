@extends('pages.master')

@section('link')
@parent
<link href="/css/search.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
<div class="form">
    <form action="{{route('login')}}" method="post">
        @csrf
        
        @if($errors->any())
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
            <input type="submit" value="ورود" name="submit" class="sub">
        </div>
    </form>
</div>
@endsection