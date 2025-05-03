@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Axe Facilitation / Influence | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.axebanner2')
    <!-- MotdeBienvenu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 800px;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Axe Facilitation/Influence</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-6">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <img style="width: auto" src="{{ asset('Front/img/Accueil/axe02.jpg') }}"
                                alt="Axe recherche et capitalisation">
                            <br><br>
                            <p
                                style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 18px;font-weight: 600;">
                                Pour construire son influence, Le LC combine aux résultats de recherches de terrain et de
                                diagnostics techniques plusieurs outils (forums multi-acteurs, radios locales, parrainage
                                des OSC) pour construire des processus de plaidoyer et d’interpellation sur des enjeux de
                                gouvernance et de citoyenneté aux échelles locale, nationale et sous-régionale.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Service End -->
    @include('Layouts.LayoutsFrontApp.Cellules.cellules')
    <div class="container">
        <div id="social-links" class="mb-2">
            Partager:
            <ul style="display:inline; ">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.axefacilitation.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.axefacilitation.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.axefacilitation.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.axefacilitation.index') }}" class="social-button"
                        id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
                <li>
            </ul>
        </div>
    </div>
@endsection
