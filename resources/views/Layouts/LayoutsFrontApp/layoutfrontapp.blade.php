<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('Layouts.LayoutsFrontApp.Headers.header')

<body>
    @include('Layouts.LayoutsFrontApp.Navbar.navbar')
    @yield('content')
    @include('Layouts.LayoutsFrontApp.Medias.medias')
    @include('Layouts.LayoutsFrontApp.Partenaires.partenaires')
    <div class="container-fluid">
        <div class="container-fluid">
            <div id="social-links">
                <h6>Partager sur les réseaux</h6>
                <ul style="display:inline; ">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.index') }}" class="social-button"
                            id=""><span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.index') }}"
                            class="social-button" id=""><span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.index') }}"
                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ route('labo.index') }}" class="social-button" id=""><span
                                class="fab fa-whatsapp"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('Layouts.LayoutsFrontApp.Footers.footer')
    @include('cookie-consent::index')
    @include('Layouts.LayoutsFrontApp.Footers.script')
</body>
</html>
