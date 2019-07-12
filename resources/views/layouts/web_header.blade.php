<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', '仙人咖 - 闲人咖') - 能赚钱的网站</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

@include('layouts._web_nav')

<div class="container">

    @yield('content')
    @include('layouts._web_footer')

</div>
</body>
</html>