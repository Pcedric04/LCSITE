@extends('layouts.frontapplayouts')
@section('title','Transfrontalier et migration-Labo Citoyennétés')
@section('banner','Transfrontalier & migration')
@section('content')
<!--/ Header end -->
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
                        <li class="breadcrumb-item"><a href="#">Programmes</a></li>
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
          <div class="col-lg-8 mb-3">
            <h3 class="column-title">@yield('banner')</h3>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Titres</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Financements</th>
                        <th scope="col">Objectifs</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($projets as $items)
                      <tr>
                        <td><a href="#">{{ $items->name}}</td>
                        <td>{{ $items->duree}}</td>
                        <td>{{ $items->financer}}</td>
                        <td>{!! Str::limit(strip_tags( $items->objectifs  ), 150, '(...)') !!}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    {{ $projets->links() }}
                  </div>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-4">
            @include('frontoffice.body.infos.infos_sidebar')
          </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')

@endsection
