@extends('layouts.frontapplayouts')
@section('title', 'Toutes l\'actualités-Labo Citoyennétés')
@section('banner', 'Toutes l\'actualités')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Actualités</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Actualités</a></li>
                                    <li class="breadcrumb-item active" style="color: #ff6902;">{{ $posts->titre }}</li>
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

                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" src="{{ asset('front/admin/articles/' . $posts->photoIllustration) }}"
                                class="img-fluid" alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    {{-- <span class="post-author">
                    <i class="far fa-user"></i><a href="#"> Admin</a>
                  </span> --}}
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> {{ $posts->Sname }}</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i>
                                        {{ $posts->created_at }}</span>
                                    <span class="post-comment"><i class="far fa-comment"></i> {{ $Comment_Post->count() }}<a
                                            href="#" class="comments-link">Commentaires</a></span>
                                </div>
                                <h2 class="entry-title">
                                    {{ $posts->titre }}
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <p>
                                    {!! $posts->contenus !!}
                                </p>
                            </div>

                            <div class="tags-area d-flex align-items-center justify-content-between">
                                {{-- <div class="post-tags">
                    @foreach ($souscategories as $items)
                    <a href="#">{{ $items->name }}</a>
                @endforeach
                </div> --}}

                                <div class="share-items">
                                    <ul class="post-social-icons list-unstyled">
                                        <li class="social-icons-head">Partager sur:</li>
                                     <li>{!! $shareComponent !!}</li>
                                        {{-- <li><a href="{{ $shareFacebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    @if ($Comment->count() != 0)
                        <!-- Post comment start -->
                        <div id="comments" class="comments-area">
                            <h3 class="comments-heading">Récents Commentaire(s)</h3>

                            <ul class="comments-list">
                                <li>
                                    @foreach ($Comment_Post as $items)
                                        <div class="comment d-flex">
                                            {{--  <img loading="lazy" class="comment-avatar" alt="author" src="{{ asset('front/public/images/news/avator1.png') }}"> --}}
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author mr-3">{{ $items->name }}</span>
                                                    <span class="comment-date float-right">{{ $items->created_at }}</span>
                                                </div>
                                                <div class="comment-content" style="color: #ff6902; font-weight: 400;">
                                                    <p class="quote-item"><span class="quote-text">{{ $items->content }}</span></p>
                                                </div>
                                                {{-- <div class="text-left">
                                                    <a class="comment-reply font-weight-bold" href="#">Repondre</a>
                                                </div> --}}
                                            </div>
                                        </div><!-- Comments end -->
                                    @endforeach
                                </li><!-- Comments-list li end -->
                            </ul><!-- Comments-list ul end -->
                            <div class="justify-center">
                                {{ $Comment_Post->links() }}
                            </div>
                        </div><!-- Post comment end -->

                    @endif


                    <div class="comments-form border-box">
                        <h3 class="title-normal">Ajouter un commentaire</h3>

                        <form method="POST" action="{{ route('labo.comment.store', $posts->id) }}" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">
                                        <span style="color: red;">(Attention, votre message séra réelu et publié!)</span>
                                            <textarea class="form-control form-control-message" name="content" id="content" cols="60"  required></textarea>
                                        </label>
                                    </div>
                                </div><!-- Col 12 end -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            <input class="form-control" name="nom" id="nom" placeholder="Votre nom" type="text" required>
                                        </label>
                                    </div>
                                </div><!-- Col 4 end -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required>
                                        </label>
                                    </div>
                                </div>

                            </div><!-- Form row end -->
                            <div class="clearfix">
                                <button class="btn btn-primary" type="submit" aria-label="post-comment">Envoyer</button>
                            </div>
                        </form><!-- Form end -->
                    </div><!-- Comments form end -->
                </div><!-- Content Col end -->

                <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                </div><!-- Sidebar Col end -->

            </div><!-- Main row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
    @include('frontoffice.body.acceuil.medias')
@endsection
@section('ogp')
<meta property="og:image" content="{{ asset('front/admin/articles/'.$imageUrl) }}">
<meta property="og:image:secure_url" content="{{ asset('front/admin/articles/'.$imageUrl) }}">
<meta property="og:image:alt" content="Articles images">
<meta property="og:title" content="{{ $imageTitre }}">
@endsection
