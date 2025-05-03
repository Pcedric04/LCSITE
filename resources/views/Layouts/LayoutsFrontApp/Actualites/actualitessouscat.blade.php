@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Toutes les actualités | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.postsbanner')
    <div class="container-fluid">
        <div class="container-fluid">
            @if ( $posts == null || $posts->count()<= 0)
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                            'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Aucune actualités trouvées
                </h1>
            @else
                <div class="row">
                    @foreach ($posts as $posts_items)
                        <div class="col-md-4">
                            <div class="card  p-0 mt-4 mb-3">
                                <span class="badge rounded-pill bg-primary">{{ $posts_items->Sname }}</span>
                                <img class="card-img-top" style="height: 262px; width: 400px;"
                                    src="{{ asset('Articles/' . $posts_items->photoIllustration) }}" alt="Article image">
                                <div class="card-body">
                                    <h5 class="card-title"> <strong style="color: #ff6902;">
                                            {{ $posts_items->created_at }}:</strong>
                                        <b>{{ $posts_items->titre }}</b>
                                    </h5>
                                    <a href="{{ route('labo.front.actualites.allpost.details',$posts_items->id) }}">
                                        <p class="card-text" style="color:black; font-weight:500;font-size: 14px;">{!! Str::limit(strip_tags($posts_items->contenus), 200, '(...)') !!}</p>
                                    </a>
                                    <div class="text-start mt-2">
                                        <p style="font-weight: 400;">{{ $posts_items->visits }} view(s)</p>
                                    </div>
                                    <div id="social-links" class="mb-2">
                                        <ul style="display:inline; ">
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.index') }}" class="social-button"
                                                    id=""><span class="fab fa-facebook"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.index') }}"
                                                    class="social-button" id=""><span class="fab fa-twitter"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.index') }}"
                                                    class="social-button" id=""><span class="fab fa-linkedin"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://wa.me/?text={{ route('labo.index') }}" class="social-button" id=""><span
                                                        class="fab fa-whatsapp"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="float: right; ">
                                        <a href="{{ route('labo.front.actualites.allpost.details', $posts_items->id) }}"
                                            class="text-white btn btn-sm bg bg-primary">
                                           En savoir plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="pagination d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
