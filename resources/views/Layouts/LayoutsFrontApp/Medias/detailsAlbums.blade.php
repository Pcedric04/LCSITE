{{-- <iframe width=\"560\" height=\"315\" src=\"{$embedUrl}\" frameborder=\"0\" allowfullscreen></iframe>"; --}}
@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Détails de l\'album | Labo Citoyennetés')
@section('content')
     @include('Layouts.LayoutsFrontApp.Banner.albumsdetailbanner')
    <!-- Project Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-6 mb-2"  style="background-color: #fff;">
                    <div class="text-md-start mt-2 mb-3" style="max-width: 100%;">
                        <h1 style="font-size: 25px; text-align:center; color: #ff6902;">
                            {{ $albums->titre }}
                        </h1>
                    </div>
                    <div class="row">
                        @foreach ($photos as $photos_items)
                            <div class="col-md-4 col-sm-3 mb-3">
                                <div class="card project-item">
                                    <div class="card-body position-relative">
                                        <img class="img-fluid" src="{{ asset('Albums/'.$photos_items->photo_name) }}"
                                            alt="" style="height: 220px;width:auto;">
                                        <div class="project-overlay">
                                            <a class="btn btn-lg-square btn-light rounded-circle m-2"
                                                href="{{ asset('Albums/'.$photos_items->photo_name) }}"
                                                data-lightbox="project"><i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="social-links" class="mb-3">
                        <ul style="display:inline; ">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.albums.details', $albums->id) }}"
                                    class="social-button" id=""><span class="fab fa-facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.albums.details', $albums->id) }}"
                                    class="social-button" id=""><span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.albums.details', $albums->id) }}"
                                    class="social-button" id=""><span class="fab fa-linkedin"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/?text={{ route('labo.front.albums.details', $albums->id) }}" class="social-button"
                                    id=""><span class="fab fa-whatsapp"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
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
        </div>
    </div>
@endsection
