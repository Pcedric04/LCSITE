<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('frontoffice.front.head')
        <body>
            <div class="body-inner">
                @include('frontoffice.front.header')
                    @yield('content')
                @include('frontoffice.body.partenaire.partenaires')
                @include('cookie-consent::bar', ['text' => 'Pour une meilleure expérience de navigation, veuillez autoriser les cookies', 'accept' => 'Accept', 'cancel' => 'Refuse'])
                @include('frontoffice.front.footer')
                @include('frontoffice.front.foot')
            </div>
        </body>
    </html>
