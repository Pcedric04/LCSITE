{{-- <iframe width=\"560\" height=\"315\" src=\"{$embedUrl}\" frameborder=\"0\" allowfullscreen></iframe>"; --}}
@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Vidéos | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.videosdetailbanner')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-6 mb-2"  style="background-color: #fff;">
                    <h1 class="mt-3" style="color: #ff6902;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; ">
                    Vous suivez: <a href="#" style="color: black;"><b>{{ $videos->titre }}</b></a>
                </h1>
                <div class="card mt-4 mb-1">
                    <iframe width="auto" height="500" src="{{ $videos->url }}" title="YouTube video player"
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <p>
                        <span style="font-weight: 600;color: black;">Description: </span>{{ $videos->description }}
                    </p>
                    <h6>
                        mis en ligne le <span class="card-title"> <strong
                                style="color: #ff6902;">{{ $videos->created_at }}</strong> </span>
                    </h6>
                </div>
            <div id="social-links" class="mb-3">
                <ul style="display:inline; ">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.videos.details', $videos->id) }}"
                            class="social-button" id=""><span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.videos.details', $videos->id) }}"
                            class="social-button" id=""><span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.videos.details', $videos->id) }}"
                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ route('labo.front.videos.details', $videos->id) }}" class="social-button"
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
@endsection
