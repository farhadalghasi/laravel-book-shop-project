<nav class="wrapper">
    <div class="navbar">
        <span id="logo">
            <a href="/" name="top">
                LOGO
            </a>
        </span>
        <ul class="n">
            <li><a href="/books-list">کتاب ها</a></li>
            <li><a href="/categories-list">دسته بندی ها</a></li>
            <li><a href="/search"> جستجو </a></li>
            @guest
                <li><a href="/enroll"> ثبت نام </a></li>
                <li><a href="/login"> ورود </a></li>
            @endguest
           @auth
                @if(auth()->user()->role==='admin')
                    <li><a href="/dashboard"> پنل ادمین </a></li>
                @endif
                @if(auth()->user()->role==='user')
                     <li><a href="{{route('user_panel')}}"> پنل کاربری </a></li>
                @endif 
            @endauth
                    
        </ul>
    </div>
 </nav>