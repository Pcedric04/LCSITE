{{-- <iframe width=\"560\" height=\"315\" src=\"{$embedUrl}\" frameborder=\"0\" allowfullscreen></iframe>"; --}}
@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Détails des audios | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.audiosdetailbanner')
<div class="container-fluid">
    <div class="container-fluid">
        {{--  <div class="text-center text-md-start pb-5 pb-md-2" style="max-width: 100%;">
            <h1 style="font-size: 25px; text-align:center;background-color: #ff6902; color: #ffff;">Vidéos</h1>
        </div> --}}
        <div class="row mt-3">
            <div class="col-md-8 col-sm-6 mb-2"  style="background-color: #fff;">
                <h1 class="mt-3" style="color: #ff6902;">
                    Vous écoutez: <a href="#" style="color: black;font-size: 18px;"><b>{{ $audios->titre }}</b></a></h1>
                <div class="card">
                    <iframe width="auto" height="500" scrolling="no" frameborder="no" allow="autoplay"
                        src="{{ $audios->url }}"></iframe>
                </div>
                <div class="card-body">
                    <p>
                        <span style="font-weight: 600;color: black;">Description: </span>{{ $audios->description }}
                    </p>
                    <h6>
                        Mis en ligne le <span class="card-title"> <strong
                                style="color: #ff6902;">{{ $audios->created_at }}</strong> </span>
                    </h6>
                    <div id="social-links">
                        <ul style="display:inline; ">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.audios.details', $audios->id) }}"
                                    class="social-button" id=""><span class="fab fa-facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.audios.details', $audios->id) }}"
                                    class="social-button" id=""><span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.audios.details', $audios->id) }}"
                                    class="social-button" id=""><span class="fab fa-linkedin"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/?text={{ route('labo.front.audios.details', $audios->id) }}" class="social-button"
                                    id=""><span class="fab fa-whatsapp"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
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
