@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Axe Suivi | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.axebanner3')
    <!-- MotdeBienvenu Start -->
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 800px;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Axe Suivi</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-6">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <img style="width: auto" src="{{ asset('Front/img/Accueil/axe03.png') }}"
                                alt="Axe recherche et capitalisation">
                            <br><br>
                            <p
                                style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 18px;font-weight: 600;">
                                Le Centre de ressources répond au souci du Laboratoire Citoyennetés de capitaliser des
                                documents et des ouvrages portant sur les processus de décentralisation, les enjeux de la
                                gouvernance et de la citoyenneté, le développement local. Il comporte un éventail de
                                périodiques, bulletins officiels, littérature grise, ouvrages et revues de sciences sociales
                                et sur le développement qui en fait un lieu de recherche destiné aux étudiants, chercheurs,
                                associations de développement, et consultants.
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.axesuivi.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.axesuivi.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.axesuivi.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.axesuivi.index') }}" class="social-button"
                        id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
