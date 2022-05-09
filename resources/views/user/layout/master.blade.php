@include('user.layout.head')

<body class="theme-color-1">

    @include('user.layout.header')
    <div>
    @yield('content')
    </div>
    @include('user.layout.footer')
    @include('user.layout.script')

</body>

</html>
