@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Dynamique | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.dynamiquebanner')
    <!-- MotdeBienvenu Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="responsive text-md-start pb-5 pb-md-0">
                <h1 class="display-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                    'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Dynamique</h1>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="service position-relative">
                        <div class="service-text" style="background-color: #fff;">
                            <img class="img-fluid" src="{{ asset('Front/img/logo.png') }}" alt="icone" style="float: left;position: relative;;">
                            <p style="text-align: left; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 17px;font-weight: 600;">
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
                            <div id="social-links">
                                Partager:
                                <ul style="display:inline; ">
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.dynamique.index') }}"
                                            class="social-button" id=""><span class="fab fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.dynamique.index') }}"
                                            class="social-button" id=""><span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.dynamique.index') }}"
                                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://wa.me/?text={{ route('labo.front.dynamique.index') }}"
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
