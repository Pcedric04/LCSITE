@extends('layouts.frontapplayouts')
@section('title','Zone Burkina-faso-Labo Citoyennétés')
@section('banner','Zone Burkina-faso')
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
                        <li class="breadcrumb-item"><a href="#">Zones</a></li>
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
            <div class="service">
                <div class="service-text mb-2">
                    <div class="responsive">
                        <img class="img-fluid" style="width: auto" src="{{ asset('front/public/images/acceuil/BurkinaFaso_Regions.jpg') }}" alt="Burkina">
                    </div>
                    <p
                        style="text-align: left; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-size: 18px;font-weight: 600; margin: 10px 10px;">
                        11Pour construire son influence, Le LC combine aux résultats de recherches de terrain et de
                        diagnostics techniques plusieurs outils (forums multi-acteurs, radios locales, parrainage
                        des OSC) pour construire des processus de plaidoyer et d’interpellation sur des enjeux de
                        gouvernance et de citoyenneté aux échelles locale, nationale et sous-régionale.
                    </p>
                </div>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-4">
            @include('frontoffice.body.infos.infos_sidebar')
          </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')

@endsection
