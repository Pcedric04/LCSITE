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
                    <h1 style="font-size: 25px; text-align:center; color: #ff6902;">
                        {{ $photos_single->titre }}
                    </h1>
                    <div class="gap-40"></div>
                        <div id="page-slider" class="page-slider">
                            @foreach ($photos as $items)
                                <div class="item">
                                <img loading="lazy" class="img-fluid" src="{{ asset('front/admin/albums_single/'.$items->photo_name) }}" alt="slider-image" />
                                </div>
                            @endforeach
                        </div><!-- Page slider end -->
                    <div class="gap-40"></div>
                </div><!-- Content Col end -->

                <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                </div><!-- Sidebar Col end -->

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
    @include('frontoffice.body.acceuil.medias')
@endsection
