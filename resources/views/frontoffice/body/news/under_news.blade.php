@extends('layouts.frontapplayouts')
@section('title', 'Catégories actualités-Labo Citoyennétés')
@section('banner', 'Catégories')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Catégories</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Actualités</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('banner')</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-4 mb-lg-0">
                    @if ( $posts == null || $posts->count()<= 0)
                    <h1 class="display-5 mb-5"
                        style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                                'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Aucun articles trouvés
                    </h1>
                @else
                    @foreach ($posts as $items)
                        <div class="post">
                            <div class="post-media post-image">
                                <img style="height: 411px;width: 100%;" loading="lazy"
                                    src="{{ asset('front/admin/articles/' . $items->photoIllustration) }}" class="img-fluid"
                                    alt="post-image">
                            </div>

                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta">
                                        {{--  <span class="post-author">
                        <i class="far fa-user"></i><a href="#"> {{ $items->surname }}</a>
                      </span> --}}
                                        <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="#"> {{ $items->Sname }}</a>
                                        </span>
                                        <span class="post-meta-date"><i class="far fa-calendar"></i>
                                            {{ $items->created_at }}</span>
                                        <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#"
                                                class="comments-link">Comments</a></span>
                                    </div>
                                    <h2 class="entry-title">
                                        <a
                                            href="{{ route('labo.front.actualites.details', $items->posts_id) }}">{{ $items->titre }}</a>
                                    </h2>
                                </div><!-- header end -->

                                <div class="entry-content">
                                    <p>{!! Str::limit(strip_tags($items->contenus), 300, '(...)') !!}</p>
                                </div>

                                <div class="post-footer">
                                    <a href="{{ route('labo.front.actualites.details', $items->posts_id) }}"
                                        class="btn btn-primary">Lire la suite</a>
                                </div>

                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->
                    @endforeach
                @endif
                    <div>
                        {!! $posts->links() !!}
                    </div>
                    {{-- <nav class="paging" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav> --}}

                </div><!-- Content Col end -->

                <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                </div><!-- Sidebar Col end -->

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
    @include('frontoffice.body.acceuil.medias')
@endsection
