@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Centre-De-Ressources | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.centre')
    <!-- MotdeBienvenu Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-md-start pb-5 pb-md-0" style="max-width: 800px;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Centre de ressources</h1>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="row" style="background-color: #fff;">
                        <div class="service">
                            <div class="service-text">
                                <img class="mt-3 mb-3" style="width:100%;border: 1px solid #ff6932;"
                                    src="{{ asset('Front/img/Accueil/ressources.jpg') }}" alt="centre de ressources">
                                <p
                                    style="color: black; margin-left: 10px; text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            font-size: 17px;font-weight: 600;">
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
                                <ul style="text-align: left; font-weight: bold;color: black;">
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
                                    style="color: black; text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                font-size: 18px;font-weight: 600;">
                                    Liste des documents physiques disponibles dans le centre de ressources Bénin
                                    <a href="{{ asset('PDF/centre-ressource-benin.pdf') }}" target="_blank">Cliquer ici</a>
                                </p>
                                <div id="social-links" class="mb-2">
                                    Partager:
                                    <ul style="display:inline; ">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.centre.ressources.index') }}"
                                                class="social-button" id=""><span
                                                    class="fab fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.centre.ressources.index') }}"
                                                class="social-button" id=""><span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.centre.ressources.index') }}"
                                                class="social-button" id=""><span
                                                    class="fab fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/?text={{ route('labo.front.centre.ressources.index') }}"
                                                class="social-button" id=""><span
                                                    class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="window.print()" class="social-button"
                                                id=""><span class="fa fa-print"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="panel panel-default" style="background-color: #fff;">
                               <div class="panel-heading text-center"><h4>Actualités</h4></div>
                                   <div class="panel-body">
                                    @foreach ($postsall1 as $items)
                                    <img class="img-circle pull-right img-thumbnail" width="80" height="80" src="{{ asset('Articles/'.$items->photoIllustration) }}">
                                    <span style="color: black;font-size: 12px;">
                                            {{ $items->created_at }}:
                                        </span><a href="{{ route('labo.front.actualites.allpost.details', $items->id) }}" style="font-size: 13px;color: #ff6902;font-weight: 600;">

                                        {{ $items->titre }}
                                    </a>
                                    <div class="clearfix"></div>
                                    <hr>
                                    @endforeach
                                  <h5 style="text-align: right;"><a href="#"  class="mb-5" style="color: #ff6902;margin-right: 10px;">Toute les actualités</a></h5>
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
                        <div class="container-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
