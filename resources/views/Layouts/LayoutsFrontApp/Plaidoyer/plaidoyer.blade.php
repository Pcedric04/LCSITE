@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Plaidoyer politique-Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.plaidoyerbanner')
    <!--Decentralisation Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 100%;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                    'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Plaidoyer Politique</h1>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="row g-4">
                    <div class="service">
                        <div class="service-text rounded p-5">

                        </div>
                    </div>
                </div>
            </div>
            <div id="social-links" class="mb-2">
                <ul style="display:inline; ">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.plaidoyer.index') }}"
                            class="social-button" id=""><span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.plaidoyer.index') }}"
                            class="social-button" id=""><span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.plaidoyer.index') }}"
                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ route('labo.front.plaidoyer.index') }}" class="social-button"
                            id=""><span class="fab fa-whatsapp"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Decentralisation End -->
@endsection
