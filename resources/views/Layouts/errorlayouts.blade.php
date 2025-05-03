<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('frontoffice.front.head')
        <body>
            <div class="body-inner">
                @include('frontoffice.front.header')
                    @yield('content')
                @include('frontoffice.front.footer')
                @include('frontoffice.front.foot')
            </div>
        </body>
    </html>
