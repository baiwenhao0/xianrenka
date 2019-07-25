<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', '仙人咖 - 闲人咖') - 能赚钱的网站</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

@include('layouts._web_nav')

<div class="container">
    @include('layouts._messages')
    @yield('content')
    @include('layouts._web_footer')

</div>
<script src="/js/app.js"></script>
</body>
</html>