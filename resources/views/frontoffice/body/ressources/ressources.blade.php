@extends('layouts.frontapplayouts')
@section('title','Centre de ressources-Labo Citoyennétés')
@section('banner','Centre de ressources')
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
                        {{-- <li class="breadcrumb-item"><a href="#">L'Association</a></li> --}}
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
          <div class="col-lg-8 mb-5">
            <h3 class="column-title">@yield('banner')</h3>
           {{--  <img src="{{ asset('front/images/acceuil/President.jpg')}}" alt=""> --}}
            <p style="position: relative; font-weight: 600;">
                Le Centre de ressources répond au souci du Laboratoire Citoyennetés de capitaliser des
                                    documents et des ouvrages portant sur les processus de décentralisation, les enjeux de la
                                    gouvernance et de la citoyenneté et le développement local. Il comporte un éventail de
                                    périodiques, de bulletins officiels, de littérature grise, d’ouvrages et de revues de
                                    sciences sociales et juridiques et sur le développement. C’est un lieu de recherche destiné
                                    aux étudiants, aux chercheurs, aux associations de développement et aux consultants.

                                    Le fonds est constitué de <span style="font-weight: bold;">5 000</span> documents et sera
                                    bientôt en ligne.

                                    Horaires : du lundi au vendredi de 8h à 16h.
                                    La consultation des documents se fait sur place. Il est cependant possible, tout en laissant
                                    au
                                    niveau de la guérite sa carte d’identité, de sortir un document pour faire quelques copies.
                                    <br> Principales thématiques :
                                <ul style="text-align: left; font-weight: 600;">
                                    <li>Décentralisation</li>
                                    <li>Etat civil</li>
                                    <li>Foncier</li>
                                    <li>Histoire</li>
                                    <li>Droit</li>
                                    <li>politique</li>
                                    <li>Economie et développement</li>
                                    <li>Généralités</li>
                                </ul>
                                </p>
                                <p
                                    style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                font-size: 18px;font-weight: 600;">
                                    Liste des documents physiques disponibles dans le centre de ressources Bénin
                                    <a style="color: blue;" href="{{ asset('front/admin/pdf/centre-ressource-benin.pdf') }}" target="_blank">Cliquer ici</a>
                                </p>

          </div><!-- Col end -->

          <div class="col-lg-4">
            @include('frontoffice.body.infos.infos_sidebar')
          </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')
@endsection
