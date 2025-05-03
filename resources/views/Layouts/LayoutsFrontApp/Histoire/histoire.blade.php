@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Historique | Labo Citoyennétés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.histoirebanner')
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="text-md-start pb-5 pb-md-0" style="max-width: 500px;">
                    <h1 class="display-5"
                        style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                        'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Historique</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <div class="service position-relative">
                            <div class="service-text" style="background-color: #fff;">
                                <img class="img-fluid" src="{{ asset('Front/img/logo.png') }}" alt="Icon" style="float: left;position: relative;">
                                <p style="color: black; text-align: left;font-size: 15px;font-weight: 500; margin-left: 10px;">
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
                                <div id="social-links">
                                    <ul style="display:inline; ">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.histoire.index') }}"
                                                class="social-button" id=""><span class="fab fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.histoire.index') }}"
                                                class="social-button" id=""><span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.histoire.index') }}"
                                                class="social-button" id=""><span class="fab fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/?text={{ route('labo.front.histoire.index') }}"
                                                class="social-button" id=""><span class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="panel panel-default" style="background-color: #fff;border: 2px solid #ff6902;">
                            <div class="panel-heading text-center">
                                <h4 style="background: #ff6902;color: #fff; border-radius: 0px 15px;">Actualités</h4>
                            </div>
                            <div class="panel-body">
                                @foreach ($postsall1 as $items)
                                    <img class="img-circle pull-right img-thumbnail" width="80" height="80"
                                        src="{{ asset('Articles/' . $items->photoIllustration) }}">
                                    <span style="color: black;font-size: 12px;">
                                        {{ $items->created_at }}:
                                    </span><a href="{{ route('labo.front.actualites.allpost.details', $items->id) }}"
                                        style="font-size: 12px;color: #ff6902;font-weight: 600;">

                                        {{ $items->titre }}
                                    </a>
                                    <div class="clearfix"></div>
                                    <hr>
                                @endforeach
                                <h5 style="text-align: right;font-size: 14px;"><a
                                        href="{{ route('labo.front.actualites.allpost') }}" class="mb-5"
                                        style="color: #ff6902;margin-right: 10px;">Toute les actualités</a></h5>
                                <br>
                            </div>
                        </div>
                        <section>
                            <div class="card mt-3">
                                <iframe class="banner"
                                    src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/LaboCitoyennetes&tabs=timeline&width=420&height=550&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                    width="400" height="550" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                                </iframe>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
@endsection
