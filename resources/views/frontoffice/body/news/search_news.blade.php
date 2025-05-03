@extends('layouts.errorlayouts')
@section('title', 'Résultat recherches-Labo Citoyennétés')
@section('banner', 'Résultat de recherche')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Recherches</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Recherches</a></li>
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
                <div class="col-lg-12 mb-4 mb-lg-0">
                <h3 class="column-title">@yield('banner')</h3>
                    @if ($posts->count()!=0 || $agendas->count()!=0)
                                <ul>
                                    @foreach ($posts as $items)
                                        <li class="mb-3">
                                            <a href="{{ route('labo.front.actualites.details',$items->id) }}"  style="font-weight: 600; font-size: 18px;color: #ff6902;">
                                                {{ $items->titre }}<span style="color: black;"> (Actualités)</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    @foreach ($agendas as $items)
                                        <li class="mb-3" style="font-weight: 600; font-size: 18px;color: #ff6902;">{{ $items->titre }} <span style="color: black;">(Agendas)</span> </li>
                                    @endforeach
                                </ul>
                    @else
                        <h3>Aucun résultat trouvés</h3>
                        <a href="{{ route('labo.index') }}" style="font-size: 18px;color: #ff6902;" class="mt-5"> <span class="fa fa-arrow-left"> retour a l'accueil</span></a>
                    @endif
                </div><!-- Content Col end -->

                {{-- <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                </div><!-- Sidebar Col end -->
 --}}
            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
   {{--  @include('frontoffice.body.acceuil.medias') --}}
@endsection
