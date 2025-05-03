@extends('layouts.errorlayouts')
@section('title','404-Labo Citoyennetés')
@section('content')
<!--/ Header end -->
{{-- <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">ERROR 404</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ERROR 404</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end --> --}}
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">

      <div class="row">

        <div class="col-12">
          <div class="error-page text-center">
            <div class="error-code">
              <h2><strong>404</strong></h2>
            </div>
            <div class="error-message">
              <h3>Oops... Page non trouvée!</h3>
            </div>
            <div class="error-body">
              Essayer de revénir à la page d'accueil du site <br>
              <a href="{{ route('labo.index') }}" class="btn btn-primary">retour à la page d'accueil</a>
            </div>
          </div>
        </div>

      </div><!-- Content row -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection
