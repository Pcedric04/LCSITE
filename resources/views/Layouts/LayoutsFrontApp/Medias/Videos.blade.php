{{-- <iframe width=\"560\" height=\"315\" src=\"{$embedUrl}\" frameborder=\"0\" allowfullscreen></iframe>"; --}}
@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Vidéos | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.videosbanner')
    <div class="container-fluid">
        <div class="text-center text-md-start pb-5 pb-md-2" style="max-width: 100%;">
            <h1 style="font-size: 25px; text-align:center;background-color: #ff6902; color: #ffff;">Vidéos</h1>
        </div>
        <div class="row">
            @foreach ($videos as $videos_items)
                <div class="col-lg-4 col-md-4">
                    <div class="card mt-4 mb-3">
                        <div class="card-body">
                        <iframe style="width:100%;" height="300" src="{{ $videos_items->url }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        <h5 class="card-title">
                            <strong style="color: #ff6902;">
                                {{ $videos_items->created_at }}:
                            </strong>
                            <a href="{{ route('labo.front.videos.details', $videos_items->id) }}"
                                style="color: black; font-size: 15px;"><b>{{ $videos_items->titre }}</b>
                            </a>
                        </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination d-flex justify-content-center">
        {{-- {{ $videos->render('pagination::simple-bootstrap-4') }} --}}
        {!! $videos->links() !!}
    </div>
    <div class="container-fluid">
        <div id="social-links" class="mb-2">
            <ul style="display:inline; ">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.videos.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.videos.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.videos.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.videos.index') }}" class="social-button"
                        id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @endsection
