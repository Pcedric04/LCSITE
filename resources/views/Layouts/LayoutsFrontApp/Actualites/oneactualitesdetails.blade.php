@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Actualités-Laboratoire Citoyennetés')
@section('content')
<div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="row mt-3">
                        <div class="row" style="background-color: #fff;">
                            <h1 class="mb-5" style="color: #ff6902; font-size: 30px; text-align: left; font-weight: 800;">
                                <b>{{ $posts->titre }}</b>
                            </h1>
                            <img class="mb-5 responsive" {{-- style="border: 1px solid #ff6902;"  --}}src="{{ asset('Articles/' . $posts->photoIllustration) }}" alt="image">
                            <p style="color: black;font-weight: 800;"><b>{{ $posts->sousTitre }}</b></p>
                            <p style="color: black; text-align: left;">{!! $posts->contenus !!}
                                <div id="social-links" class="mb-1">
                                    <ul style="display:inline; ">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.actualites.allpost.details', $posts->id) }}&amp;title={{ $posts->titre }}&amp;summary={{ $posts->sousTitre }}"
                                                class="social-button" id=""><span class="fab fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.actualites.allpost.details', $posts->id) }}&amp;title={{ $posts->titre }}&amp;summary={{ $posts->sousTitre }}"
                                                class="social-button" id=""><span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.actualites.allpost.details', $posts->id) }}&amp;title={{ $posts->titre }}&amp;summary={{ $posts->sousTitre }}"
                                                class="social-button" id=""><span class="fab fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/?text={{ route('labo.front.actualites.allpost.details', $posts->id) }}"
                                                class="social-button" id=""><span class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="row" style="background-color: #fff;">
                            <h5 class="mb-2">Les récents commentaires</h5>
                            @foreach ($Comment_Post as $comment)
                                @if ($comment->post_id == $posts->id)
                                    <div class="mb-3">
                                        <p style="font-weight:600; font-size: 13px; color: black;">{{ $comment->created_at }}:
                                            <strong style="font-weight:600; font-size: 13px; color: #ff6902;">{{ $comment->name }}</strong>
                                            sur "<a href="{{ route('labo.front.actualites.allpost.details', $posts->id) }}"
                                                style="color: #ff6902;">{{ $posts->titre }}</a>"
                                        </p>
                                        <p style="font-weight:600; font-size: 13px; color: black; "><i class="fa fa-comments"></i>
                                            {{ $comment->content }}</p>
                                    </div>
                                @endif
                            @endforeach
                            <p><a href="" style="float: right;font-weight:600; font-size: 13px; color: #ff6902; text-decoration: underline;">Tous les commentaires</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="row" style="background-color: #fff;">
                            <div class="card2">
                                <form method="POST" action="{{ route('labo.comment.store', $posts->id) }}">
                                    @csrf
                                    <h5 class="mb-2 mt-2">Exprimez vous!</h5>
                                    <div class="form-group">
                                        <label for="content">Votre nom</label>
                                        <span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="nom" id="nom"
                                            placeholder="Votre nom" style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Saisir votre commentaire</label>
                                        <span style="color: red;">(Attention, votre message séra réelu et publié!)</span>
                                        <textarea name="content" id="content" class="form-control" placeholder="Entrer votre commentaire" style="width: 100%;"></textarea>
                                    </div>
                                    <button type="submit" class="btn bg-primary text-white mb-2 mt-2"><span>Envoyer</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                            <p style="font-weight:600;font-size: 15px; color: #ff6902; width: auto;">
                                Tags: <a href="{{ route('labo.front.actualites.allpost') }}"
                                    class="btn btn-dark btn-sm">{{ $posts->categoriesName }}</a>
                                @foreach ($sousCat as $sousCat_items)
                                    <a href="{{ route('labo.front.actualites.souscat', $sousCat_items->id) }}"
                                        class="btn btn-dark btn-sm">{{ $sousCat_items->name }}</a>
                                @endforeach
                            </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mt-3">
                        <div class="panel panel-default" style="background-color: #fff;border: 2px solid #ff6902;">
                            <div class="panel-heading text-center"><h4 style="background: #ff6902;color: #fff; border-radius: 0px 15px;">Actualités</h4></div>
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
