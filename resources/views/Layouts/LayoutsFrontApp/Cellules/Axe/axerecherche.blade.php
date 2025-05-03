@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Axe Recherche / Capitalisation | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.axebanner1')
    <!-- MotdeBienvenu Start -->
        <div class="container">
            <div class="responsive pb-5 pb-md-0">
                <h2 class="display-5 responsive mb-5"
                    style="color: #ff6902;">
                    Axe Recherche/Capitalisation</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 responsive">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <img  src="{{ asset('Front/img/Accueil/axe01.jpg') }}"
                                alt="Axe recherche et capitalisation">
                            <br><br>
                            <p
                                style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 18px;font-weight: 600;">
                                La cellule recherche s’investit dans un processus permanent de diagnostic et de réflexivité
                                à
                                partir de données ancrées sur les réalités du terrain. La capitalisation, à travers un
                                processus de
                                mutualisation (recherche/action), alimente en permanence notre stratégie d’influence aux
                                échelles
                                nationale et sous-régionale sur les enjeux
                                politiques constitutifs de la gouvernance et de la citoyenneté révélés par nos interventions
                                locales.
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.axerecherche.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.axerecherche.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.axerecherche.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.axerecherche.index') }}" class="social-button"
                        id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
