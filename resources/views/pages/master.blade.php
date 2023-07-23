<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @section('link')
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    @show
    <script src="/js/script.js"> </script>
    <title>e-book</title>
</head>
<body>
    <header>
        @section('header')
            @include('pages.header')
        @show
    </header>
    <section class="wrapper">
       @yield('main')
    </section>
    <footer>
        @include('pages.footer')
    </footer>
    <script src="/js/time.js" type="text/javascript"></script>
</body>
</html>