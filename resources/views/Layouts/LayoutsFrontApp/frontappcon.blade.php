<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('Layouts.LayoutsFrontApp.Headers.header')

<body>
    @include('Layouts.LayoutsFrontApp.Navbar.navbar')
    @if (empty($message) || $message->count() == 0)
    @else
        @include('Layouts.LayoutsFrontApp.Flash.flashinfo', ['message' => $message])
    @endif
    @yield('content')
    @include('Layouts.LayoutsFrontApp.Footers.footer')
    @include('cookie-consent::index')
    @include('Layouts.LayoutsFrontApp.Footers.script')
</body>
<style>
    body{
            background:#eee;
            }
    .panel .panel-heading {
        background-color: #FFFFFF;
        border-color: #FFFFFF;
        color: #262626;
        font-size: 14px;
        font-weight: 500;
    }
    .panel .panel-heading a {
        font-size: 11px;
        font-weight: 400;
    }
    .panel .panel-body a:hover {
        text-decoration: underline;
        color: red;
    }
    .panel .panel-body
    {
        margin-left: 10px;
    }
    </style>
</html>

</html>
