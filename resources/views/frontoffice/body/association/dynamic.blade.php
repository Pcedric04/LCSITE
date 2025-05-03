@extends('layouts.frontapplayouts')
@section('title','Dynamique-Labo Citoyennétés')
@section('banner','Dynamique')
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
                <p style="font-weight: 600;">
                    La dynamique opérationnelle du LC est d’abord fondée sur nos partenariats dans chacun de nos
                    pays d’intervention : partenaires scientifiques (universités et laboratoires de recherche),
                    partenaires techniques (ONG partenaires, prestataires, bureau d’étude ou d’appui-conseil aux
                    communes), partenaires politiques (élus, associations d’élus, référents politiques au niveau
                    ministériel, au niveau sous-régional, points focaux), experts, consultants et personnes
                    ressources associés…

                    Ces relations permettent non seulement un ancrage, une mise en œuvre et un suivi de qualité
                    dans les pays d’intervention, des échanges constructifs sur les problématiques et les
                    méthodologie à un niveau sous-régional et international mais également un portage
                    institutionnel et politique.

                    La recherche est permanente.

                    Elle permet de pointer les problématiques sur lesquelles se fondent les projets, d’alimenter
                    les pistes d’actions, le plaidoyer et les stratégies d’influence.

                    La mise en œuvre des projets est sans cesse mise en perspective, réadaptée et améliorée
                    grâce aux dispositifs de suivi de processus et de suivi des effets.

                    Les capitalisations et publications du LC ancrent les résultats des recherches de terrain et
                    des projets (études RECIT, fiches Outils, rapports de capitalisation…).
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
