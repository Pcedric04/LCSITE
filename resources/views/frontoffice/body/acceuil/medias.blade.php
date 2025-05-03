
<section class="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
              <h3 class="section-sub-title">Médiathèques</h3>
            </div>
        </div>
      <div class="row">
          <div class="col-lg-4 mt-5 mt-lg-0">
            <h3 class="column-title">Médias</h3>
            <div class="row all-clients">
                <div class="col-sm-4 col-4">
                    <figure class="clients-logo">
                      <a href="{{ route('labo.front.videos.index') }}"><img loading="lazy" class="img-fluid" src="{{ asset('front/public/images/icon-image/videos.png') }}" alt="clients-logo" /></a>
                    </figure>
                    <p style="font-weight: 600;color: black;">
                        <a href="{{ route('labo.front.videos.index') }}">LC Vidéos</a>
                    </p>
                </div><!-- Client 1 end -->

                <div class="col-sm-4 col-4">
                  <figure class="clients-logo">
                      <a href="{{ route('labo.front.albums.index') }}"><img loading="lazy" class="img-fluid" src="{{ asset('front/public/images/icon-image/album.png') }}" alt="clients-logo" /></a>
                  </figure>
                  <p style="font-weight: 600;color: black;">
                    <a href="{{ route('labo.front.albums.index') }}">LC Albums</a>
                </p>
                </div><!-- Client 2 end -->

                <div class="col-sm-4 col-4">
                    <figure class="clients-logo">
                      <a href="{{ route('labo.front.audios.index') }}"><img loading="lazy" class="img-fluid" src="{{ asset('front/public/images/icon-image/audio.png') }}" alt="clients-logo" /></a>
                    </figure>
                    <p style="font-weight: 600;color: black;">
                        <a href="{{ route('labo.front.audios.index') }}">LC Audios</a>
                    </p>
                </div><!-- Client 3 end -->

            </div><!-- Clients row end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-sm-6">
            <h3 class="column-title">Agendas</h3>

            <div id="testimonial-slide" class="testimonial-slide">
                @foreach ($agendas as $items)
                <div class="item">
                    <div class="quote-item">
                        <span class="quote-text">
                          {{$items->titre}}
                        </span>
                    </div><!-- Quote item end -->
                  </div>
                  <!--/ Item 1 end -->
                @endforeach

            </div>
            <!--/ Testimonial carousel end-->
          </div><!-- Col end -->

          <div class="col-lg-4 mt-5 mt-lg-0">
            <h3 class="column-title">Centre des ressources</h3>
            <p>Le Centre de ressources répond au souci du Laboratoire Citoyennetés
                de capitaliser des documents et des ouvrages portant sur les processus
                de décentralisation, les enjeux de la gouvernance
                et de la citoyenneté et le développement local.... </p>
            <a href="{{ route('labo.front.centre.ressources.index') }}" class="post-title">En savoir plus</a>
          </div>
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Content end -->
