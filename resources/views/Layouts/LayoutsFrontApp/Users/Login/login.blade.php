@extends('Layouts.LayoutsFrontApp.frontappcon')
@section('title', 'Se connecter | Labo Citoyennetés')
@section('content')
<div class="container-fluid">
                <div class="container-fluid">
                  <div class="row">
                        <div class="col-md-8 col-sm-6 mb-3">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row">
                                <div class="card-body p-lg-5 text-black">
                                <form action="{{ route('labo.front.users.login') }}" method="post">
                                    @csrf
                                   <center>
                                    <div class="">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0"><img src="{{ asset('Front/img/logo.png') }}" alt="" style="width: 30%"></span>
                                        </div>
                                   </center>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Se connecter à son compte</h5>

                                    <div class="form-outline mb-4">
                                    <input style="width: 100%;" type="text" id="nickname" name="nickname" class="form-control form-control-lg" />
                                    <label class="form-label" for="nickname">Nom utilisateur</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <input style="width: 100%;" type="password" id="password" name="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="password">Mot de passe</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                    <button class="btn bg-primary btn-lg btn-block text-white" type="submit">Se connecter</button>
                                    </div>

                                    <a class="small text-muted" href="#!">Mot de passe oublié?</a>
                                    <p class="mb-1 pb-lg-2">Avez vous déja un compte?
                                        <a href="{{ route('labo.front.users.register') }}"
                                        style="color: #ff6902;">Créer votre compte</a></p>
                                </form>
                                </div>
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
