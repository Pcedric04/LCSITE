{{-- <iframe width=\"560\" height=\"315\" src=\"{$embedUrl}\" frameborder=\"0\" allowfullscreen></iframe>"; --}}
@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Audios-Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.audiobanner')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-md-start pb-5 pb-md-2" style="max-width: 100%;">
            <h1 style="font-size: 25px; text-align:center;background-color: #ff6902; color: #ffff;">Audios</h1>
        </div>
        <div class="row">
            @foreach ($audios as $audios_items)
                <div class="col-lg-4 col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <iframe style="width: 100%;" height="200" scrolling="yes" frameborder="yes" allow="autoplay"
                            src="{{ $audios_items->url }}"></iframe>
                        </div>
                        <h5  class="mb-3 text-center">
                            <strong style="color: #ff6902;">
                                {{ $audios_items->created_at }}:</strong>
                            <a href="{{ route('labo.front.audios.details', $audios_items->id) }}"
                                style="color: black;"><b>{{ $audios_items->titre }}</b></a>
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination d-flex justify-content-center">
     {{--    {{ $audios->render('pagination::simple-bootstrap-4') }} --}}
     {!! $audios->links() !!}
    </div>
    <div class="container-fluid">
        <div id="social-links" class="mb-2">
            <ul style="display:inline; ">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.audios.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.audios.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.audios.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.audios.index') }}" class="social-button"
                        id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
    @endsection
