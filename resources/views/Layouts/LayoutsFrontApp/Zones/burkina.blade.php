@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Bukina Faso-Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.zoneburkinabanner')
    <!-- MotdeBienvenu Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 800px;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Burkina Faso</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-9">
                    <div class="service">
                        <div class="service-text mb-2">
                            <div class="responsive">
                                <img class="img-fluid" style="width: auto" src="{{ asset('Front/img/Accueil/BurkinaFaso_Regions.jpg') }}" alt="Burkina">
                            </div>
                            <p
                                style="text-align: left; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                        font-size: 18px;font-weight: 600; margin: 10px 10px;">
                                Pour construire son influence, Le LC combine aux résultats de recherches de terrain et de
                                diagnostics techniques plusieurs outils (forums multi-acteurs, radios locales, parrainage
                                des OSC) pour construire des processus de plaidoyer et d’interpellation sur des enjeux de
                                gouvernance et de citoyenneté aux échelles locale, nationale et sous-régionale.
                            </p>
                        </div>
                    </div>
                    <div id="social-links" class="mb-2">
                        <ul style="display:inline; ">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.zone.burkina.index') }}"
                                    class="social-button" id=""><span class="fab fa-facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.zone.burkina.index') }}"
                                    class="social-button" id=""><span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.zone.burkina.index') }}"
                                    class="social-button" id=""><span class="fab fa-linkedin"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/?text={{ route('labo.front.zone.burkina.index') }}"
                                    class="social-button" id=""><span class="fab fa-whatsapp"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
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
                    {{-- <div class="offset-2 col-lg-8 offset-2">
                        <div class="card  p-0 mt-4 mb-3">
                            @if ($publications !== null)
                            <img class="card-img-top" style="height: 300px; width: 100%;"
                            src="{{ asset('Couverture/'.$publications->couverture) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <strong style="color: #ff6902;">

                                    </strong>
                                </h5>
                                <center>
                                    <a href="{{ asset('Couverture/'.$publications->documents) }}" class="btn btn-dark btn-sm">Télécharger</a>
                                </center>

                            </div>
                            @else
                            <img class="card-img-top" style="height: 300px; width: 100%;"
                            src="{{ asset('Couverture/commune.jpg') }}" alt="Card image cap">
                            @endif
                        </div>
                        <a href="{{ route('labo.front.publications.index') }}" style="float: right; color: #ff6902; font-weight: 600;">Voir tous</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
