@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Albums | Labo Citoyennetés')
@section('content')
        @include('Layouts.LayoutsFrontApp.Banner.albumbanner')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-md-start pb-5 pb-md-2" style="max-width: 100%;">
                <h1 style="font-size: 25px; text-align:center;background-color: #ff6902; color: #ffff;">Albums</h1>
            </div>
            <div class="row">
                @foreach ($albums as $albums_items)
                    <div class="col-lg-4 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('labo.front.albums.details', $albums_items->id) }}">
                                <img class="img-fluid" src="{{ asset('AlbumsLogo/' . $albums_items->logo) }}" alt="albums">
                                </a>
                            </div>
                            <h5 class="mb-3 text-center">
                                <p><i class="fa fa-calendar-alt"></i> {{ $albums_items->created_at }}:
                                    <a style="color: #ff6902;" href="{{ route('labo.front.albums.details', $albums_items->id) }}">
                                 {{  $albums_items->titre  }}
                                </a></p>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="pagination d-flex justify-content-center">
           {{--  {{ $albums->render('pagination::simple-bootstrap-4') }} --}}
            {!! $albums->links() !!}
        </div>
    </div>
    <!-- Service End -->
    <div class="container-fluid">
        <div id="social-links" class="mb-2">
            <ul style="display:inline; ">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.albums.index') }}"
                        class="social-button" id=""><span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.albums.index') }}"
                        class="social-button" id=""><span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.albums.index') }}"
                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/?text={{ route('labo.front.albums.index') }}"
                        class="social-button" id=""><span class="fab fa-whatsapp"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
@endsection
