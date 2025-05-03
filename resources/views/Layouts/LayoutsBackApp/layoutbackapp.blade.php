<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('Layouts.LayoutsBackApp.headers.head.headers')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
            @yield('content')
    </div>
    @include('Layouts.LayoutsBackApp.footers.footer.footer')
    @include('Layouts.LayoutsBackApp.footers.foot.foot')
    @include('Layouts.LayoutsBackApp.footers.js')
    @yield('js')
</body>

</html>
