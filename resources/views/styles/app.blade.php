<html>

<head>
    @include('includes.css')
    @include('includes.js')
</head>

<body>
    @if (auth()->check())
        <a href="{{ route('logout') }}">Logout</a>
    @endif
    <div class="container">
        @yield('title')
        <hr>
        @yield('contents')
    </div>
</body>

</html>
