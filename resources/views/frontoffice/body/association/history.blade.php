@extends('layouts.frontapplayouts')
@section('title','Historique-Labo Citoyennétés')
@section('banner','Historique')
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
                <br>
                Créé en 2003, le Laboratoire Citoyennetés (LC) est une association de droit burkinabè à
                vocation régionale (Afrique de l’Ouest). Il est né dans un contexte où les modes de
                gouvernance et les citoyennetés sont à deux vitesses. D'un côté, une gouvernance et une
                citoyenneté formelles qui proposent des cadres rationalisés, peu en accord avec les réalités
                du milieu et de l'autre des modes de gouvernance et des citoyennetés ancrées dans le
                quotidien des populations qui se saisissent tant bien que mal des multiples références qui
                les entourent (Etat, tradition, marché, développement, etc.). <br><br>

                Nous voyons dans cette situation une grande partie des difficultés de construction d'un Etat
                post colonial apaisé, développé et démocratique.

                Dans le même temps, les processus de décentralisation ont suscité beaucoup d'espoir d'une
                meilleure articulation de ces modes de gouvernance et de citoyennetés. Cependant, si les
                dispositifs sont en place, il y a encore un travail important de facilitation et de mise en
                dialogue pour que les changements s'opèrent dans les façons de voir, de penser et d'agir et
                que la décentralisation ne soit pas l'occasion de reproduire à l'échelle locale les
                difficultés de l'échelle nationale.

                Conscients de cette situation, des acteurs du monde politique, de la recherche et du
                développement ont décidé de s'associer pour engager la réflexion, interpeller les décideurs
                et appuyer les collectivités territoriales dans leur rôle de régulation sociale et de
                construction politique de la cité. <br><br>

                Ainsi est née en avril 2003, l'Association construisons ensemble - Recherche sur les
                citoyennetés en transformation (ACE-RECIT). Depuis l'Assemblée générale de mars 2005,
                l'association a pris le nom de Laboratoire Citoyennetés (LC). Le LC a décidé de se donner
                comme finalité la contribution à l'instauration d'une gouvernance qui réconcilie les
                citoyen(ne)s et les gouvernants à partir du local.

                C'est une visée à la fois politique (nouvelle façon de gouverner et de gérer les affaires
                publiques) et culturelle (nouvelles identités, nouvelles références) axée sur les
                populations, les décideurs et les gouvernants, les agents et les opérateurs qui mettent en
                œuvre les politiques et les influencent. Nous concevons cette visée de façon engagée, par
                notre statut d'association indépendante, et rigoureuse par notre assise scientifique et
                académique.
                <br><br>
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
