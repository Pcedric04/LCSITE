@extends('layouts.frontapplayouts')
@section('title','Mot de bienvenue-Labo Citoyennétés')
@section('banner','Mot de bienvenue')
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
          <div class="col-lg-8 mb-5">
            <h3 class="column-title">@yield('banner')</h3>
            <img src="{{ asset('front/public/images/acceuil/President.jpg')}}" alt="" style="float: left;">
            <p style="position: relative; font-weight: 600;">
                Chers internautes, soyez les bienvenus sur le site web du Laboratoire Citoyennetés.
                Le Laboratoire Citoyennetés (LC) se définit comme un laboratoire d’analyse, de conseils,
                de renforcement des capacités d’action et de plaidoyer associant la recherche en sciences sociales à
                la facilitation et à l’influence du dialogue entre citoyens et gouvernants sur le plan national et
                sous-régional. <br> L’association mère (ACE-RECIT) vise à termes à la refondation de l’état à partir du local,
                d’où son option d’investir la gouvernance locale. Les interventions du LC reposent sur la production de
                connaissances associées à des appuis aux processus institutionnels. Elles visent à contribuer à des
                changements structurels et durables, à des réformes porteuses partant du vécu et des aspirations citoyennes et
                non d’actions ponctuelles sans réelle portée à moyen et long terme. <br> Le site web du LC est une vitrine pour
                la vulgarisation des nombreuses études et recherches, et des nombreux rapports, découlant d’un
                travail minutieux d’enquêtes sur le terrain et d’une méthodologie de travail on ne peut plus rigoureuse.
                Cette abnégation au travail nous a valu la confiance renouvelée de nombreux partenaires à qui nous témoignons
                une fois de plus notre gratitude. Grâce à ses partenaires, le LC pilote de nombreux programmes portant sur le
                MotdeBienvenu public local (éducation, état civil, eau potable et assainissement, action sociale, etc.),
                l’intégration sous-régional, le dialogue politique et l’interpellation, le foncier et les ressources naturelles.
                Visitez notre site web et vous en saurez davantage sur les activités et les productions du
                Laboratoire Citoyennetés.
                <br>
                <br>
               <strong style="float: right;"> Je vous remercie !</strong>
               <strong style="float: left;"> RAOGO ANTOINE SAWADOGO</strong>
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
