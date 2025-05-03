@extends('layouts.frontapplayouts')
@section('title','Conseil d\'administration-Labo Citoyennétés')
@section('banner','Conseil d\'administration')
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
                        <li class="breadcrumb-item"><a href="#">L'Association</a></li>
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
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('front/public/images/acceuil/President.jpg') }}" style="height:170px;" class="img-fluid" alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">Raogo Antoine SAWADOGO</h3>
                            <p class="ts-designation">Président</p>
                            <div class="team-social-icons">
                            <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <!--/ social-icons-->
                        </div>
                        </div>
                        <!--/ Team wrapper 3 end -->
                    </div><!-- Col end -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="ts-team-wrapper">
                          <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('front/public/images/acceuil/Vice_presidente.jpg') }}" style="height:170px;" class="img-fluid" alt="team-img">
                          </div>
                          <div class="ts-team-content-classic">
                            <h3 class="ts-name">Rosalie OUABA</h3>
                            <p class="ts-designation">Vice-Présidente</p>
                            <div class="team-social-icons">
                                <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <!--/ social-icons-->
                          </div>
                        </div>
                        <!--/ Team wrapper 2 end -->
                    </div><!-- Col end -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('front/public/images/acceuil/Representant_Niger.jpg') }}" style="height:170px;" class="img-fluid" alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">Saidou HALIDOU</h3>
                            <p class="ts-designation">Répresentant Pays (niger)</p>
                            <div class="team-social-icons">
                                <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <!--/ social-icons-->
                        </div>
                        </div>
                        <!--/ Team wrapper 4 end -->

                    </div><!-- Col end -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('front/public/images/acceuil/President.jpg') }}" style="height:170px;" class="img-fluid" alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">Armand KABORE</h3>
                            <p class="ts-designation">Secretaire permanent(Burkina)</p>
                            <div class="team-social-icons">
                                <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                                <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <!--/ social-icons-->
                        </div>
                        </div>
                        <!--/ Team wrapper 5 end -->
                    </div><!-- Col end -->
                </div>
            </div>
            <div class="col-lg-4">
                @include('frontoffice.body.infos.infos_sidebar')
            </div><!-- Col end -->
        </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')
@endsection
