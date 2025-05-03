@extends('layouts.frontapplayouts')
@section('title', 'Contact-Labo Citoyennétés')
@section('banner', 'Contact')
@section('content')
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">@yield('banner')</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
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
                <div class="col-lg-8">
                    <h3 class="column-title">Poser nous vos préoccupation</h3>
                    <form action="{{ route('labo.back.contact.store') }}" method="POST">
                        @csrf
                        <div class="error-container"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nom Complet</label>
                                        <input class="form-control form-control-name" name="name" id="name"
                                            placeholder="" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-email" name="email" id="email"
                                            placeholder="" type="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Objet</label>
                                        <input class="form-control form-control-subject" name="objet" id="objet"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
                                    required></textarea>
                            </div>
                            <div class="text-right"><br>
                                <button class="btn btn-primary solid blank" type="submit">Envoyer</button>
                            </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    @include('frontoffice.body.infos.infos_sidebar')
                  </div><!-- Col end -->
            </div><!-- Content row -->
        </div>
    </section>
    @include('frontoffice.body.acceuil.medias')
@endsection
