@extends('layouts.frontapplayouts')
@section('title', 'Albums-Labo Citoyennétés')
@section('banner', 'Albums')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Médias</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Médias</a></li>
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
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h3 class="column-title">@yield('banner')</h3>
                    <div class="container">
                        <div class="row">
                        @foreach ($albums as $items)
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="ts-service-box">
                                <div class="ts-service-image-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ asset('front/admin/albums/' . $items->logo) }}" alt="service-image">
                                </div>
                                <div class="d-flex">
                                  <div class="ts-service-info">
                                      <h3 class="service-box-title"><a href="{{ route('labo.front.albums.details',$items->id) }}">{{ $items->titre }}</a></h3>
                                      <a class="learn-more d-inline-block" href="{{ route('labo.front.albums.details',$items->id) }}" aria-label="service-details">
                                        <i class="fa fa-caret-right"></i> Aperçu</a>
                                  </div>
                                </div>
                            </div><!-- Service1 end -->
                          </div><!-- Col 1 end -->
                        @endforeach
                        </div><!-- Main row end -->
                      </div><!-- Conatiner end -->
                    <div>
                        {!! $albums->links() !!}
                    </div>
                </div><!-- Content Col end -->

                <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                </div><!-- Sidebar Col end -->

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
    @include('frontoffice.body.acceuil.medias')
@endsection
