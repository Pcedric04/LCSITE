<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('backoffice.back.headers.head.headers')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @yield('content')
    </div>
    @include('backoffice.back.footers.footer.footer')
    @include('backoffice.back.footers.foot.foot')
    @include('backoffice.back.footers.js')
    @yield('js')
</body>

</html>
