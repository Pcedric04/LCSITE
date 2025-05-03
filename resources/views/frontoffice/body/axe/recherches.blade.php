@extends('layouts.frontapplayouts')
@section('title','Axe Recherches & Capitalisation-Labo Citoyennétés')
@section('banner','Axe Recherches & Capitalisation')
@section('content')
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">@yield('banner')</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item"><a href="#">Cellules</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('banner')</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-3">
                    <h3 class="column-title">@yield('banner')</h3>
                    <img style="width: 100%"  src="{{ asset('front/public/images/services/axe01.jpg') }}" alt="Axe recherche et capitalisation">
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
            <div class="col-lg-4">
                <@include('frontoffice.body.infos.infos_sidebar')
            </div><!-- Col end -->
        </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')
@endsection
