@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Mot de bienvenue | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.motbanner')
    <div class="container-fluid">
        <div class="container-fluid">
                <div class="text-md-start pb-5 pb-md-0" style="max-width: 500px;">
                    <h1 class="display-5"
                        style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Mot de Bienvenue</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="service position-relative">
                            <div class="service-text" style="background-color: #fff;">
                                <div style="float:left; text-align: center; margin-right: 10px;">
                                <img class="img-fluid" src="{{ asset('Front/img/Accueil/President.jpg') }}" alt="icone">
                                    <h5 class="mb-2" style="font-weight: 600; font-size: 15px; color: black;">Raogo Antoine SAWADOGO</h5>
                                        <p class="mb-0" style="font-weight: 600;font-size: 14px;">LE PRESIDENT</p>
                                </div>
                                <p style="margin-left: 10px;margin-right: 10px; position: relative;color: black; text-align: left; font-size: 15px;font-weight: 600;">
                                    Chers internautes, soyez les bienvenus sur le site web du Laboratoire Citoyennetés. Le
                                    Laboratoire Citoyennetés (LC) se définit comme un laboratoire d’analyse, de conseils, de
                                    renforcement des capacités d’action et de plaidoyer associant la recherche en sciences sociales
                                    à la facilitation et à l’influence du dialogue entre citoyens et gouvernants sur le plan
                                    national et sous-régional. L’association mère (ACE-RECIT) vise à termes à la refondation de
                                    l’état à partir du local, d’où son option d’investir la gouvernance locale.

                                    Les interventions du LC reposent sur la production de connaissances associées à des appuis aux
                                    processus institutionnels. Elles visent à contribuer à des changements structurels et durables,
                                    à des réformes porteuses partant du vécu et des aspirations citoyennes et non d’actions
                                    ponctuelles sans réelle portée à moyen et long terme.

                                    Le site web du LC est une vitrine pour la vulgarisation des nombreuses études et recherches, et
                                    des nombreux rapports, découlant d’un travail minutieux d’enquêtes sur le terrain et d’une
                                    méthodologie de travail on ne peut plus rigoureuse. Cette abnégation au travail nous a valu la
                                    confiance renouvelée de nombreux partenaires à qui nous témoignons une fois de plus notre
                                    gratitude.

                                    Grâce à ses partenaires, le LC pilote de nombreux programmes portant sur le MotdeBienvenu public
                                    local (éducation, état civil, eau potable et assainissement, action sociale, etc.),
                                    l’intégration sous-régional, le dialogue politique et l’interpellation, le foncier et les
                                    ressources naturelles.

                                    Visitez notre site web et vous en saurez davantage sur les activités et les productions du
                                    Laboratoire Citoyennetés.
                                </p>
                                <p
                                    style="margin-right: 10px;text-align: right; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                font-size: 18px;font-weight: 600; color: black;">
                                    Je vous remercie !
                                </p>
                                <div id="social-links">
                                    <ul style="display:inline; ">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.mot.index') }}"
                                                class="social-button" id=""><span class="fab fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.mot.index') }}"
                                                class="social-button" id=""><span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.mot.index') }}"
                                                class="social-button" id=""><span class="fab fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/?text={{ route('labo.front.mot.index') }}"
                                                class="social-button" id=""><span class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
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
    <!-- Mot de bienvenue End -->
@endsection
