
<section id="main-container" class="main-container pb-2">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
              <h3 class="section-sub-title">Nos Cellules</h3>
            </div>
        </div>
      <div class="row">

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{ asset('front/public/images/services/axe01.jpg') }}" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="{{ route('labo.front.axerecherche.index') }}">Axe Recherche/Capitalisation</a></h3>
                    <p>
                        {!! Str::limit(strip_tags(
                        'La cellule recherche s’investit dans un processus permanent de diagnostic et de réflexivité
                        à partir de données ancrées sur les réalités du terrain. La capitalisation, à travers un processus
                        de mutualisation (recherche/action), alimente en permanence notre stratégie d’influence aux échelles nationale
                        et sous-régionale sur les enjeux politiques constitutifs de la gouvernance et
                        de la citoyenneté révélés par nos interventions locales.'
                        ), 200, '(...)') !!}
                    </p>
                    <a class="learn-more d-inline-block" href="{{ route('labo.front.axerecherche.index') }}" aria-label="service-details"><i class="fa fa-caret-right"></i> En savoir plus</a>
                </div>
              </div>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{ asset('front/public/images/services/axe02.jpg') }}" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="{{ route('labo.front.axefacilitation.index') }}">Axe Facilitation/Influence</a></h3>
                    <p> {!! Str::limit(strip_tags(
                        'Pour construire son influence, Le LC combine aux résultats de recherches de terrain et de
                        diagnostics techniques plusieurs outils (forums multi-acteurs, radios locales, parrainage
                        des OSC) pour construire des processus de plaidoyer et d’interpellation sur des enjeux de
                        gouvernance et de citoyenneté aux échelles locale, nationale et sous-régionale.'
                        ), 200, '(...)') !!}
                    </p>
                    <a class="learn-more d-inline-block" href="{{ route('labo.front.axefacilitation.index') }}" aria-label="service-details"><i class="fa fa-caret-right"></i> En savoir plus</a>
                </div>
              </div>
          </div><!-- Service2 end -->
        </div><!-- Col 2 end -->

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{ asset('front/public/images/services/axe03.png') }}" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="{{ route('labo.front.axesuivi.index') }}">Axe Suivi</a></h3>
                    <p>
                        {!! Str::limit(strip_tags(
                            'Le Centre de ressources répond au souci du Laboratoire Citoyennetés de capitaliser des
                            documents et des ouvrages portant sur les processus de décentralisation, les enjeux de la
                            gouvernance et de la citoyenneté, le développement local. Il comporte un éventail de
                            périodiques, bulletins officiels, littérature grise, ouvrages et revues de sciences sociales
                            et sur le développement qui en fait un lieu de recherche destiné aux étudiants, chercheurs,
                            associations de développement, et consultants.'
                        ), 200, '(...)') !!}
                    </p>
                    <a class="learn-more d-inline-block" href="{{ route('labo.front.axesuivi.index') }}" aria-label="service-details"><i class="fa fa-caret-right"></i> En savoir plus</a>
                </div>
              </div>
          </div><!-- Service3 end -->
        </div><!-- Col 3 end -->
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
