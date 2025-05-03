<section id="news" class="news">
    <div class="container">
      <div class="row text-center">
          <div class="col-12">
            <h3 class="section-sub-title">Récentes Actualités</h3>
          </div>
      </div>
      <!--/ Title row end -->
      <div class="row">
        @foreach ($posts as $items)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="#" class="latest-post-img">
                      <img loading="lazy" style="height:263px;" class="img-fluid" src="{{ asset('front/admin/articles/'.$items->photoIllustration)}}" alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="{{ route('labo.front.actualites.details',$items->id) }}" class="d-inline-block">{{ $items->titre}}</a>
                  </h4>
                  <div class="latest-post-meta">
                        <span class="post-item-date">
                            <i class="fa fa-folder"></i> {{ $items->Sname }}
                        </span>
                        <span class="post-item-date">
                            <i class="fa fa-clock"></i> {{ $items->created_at}}
                        </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->
        @endforeach
      </div>
      <!--/ Content row end -->

      <div class="general-btn text-center mt-4">
          <a class="btn btn-primary" href="{{ route('labo.front.actualites.all') }}">Toutes l'actualités</a>
      </div>

    </div>
    <!--/ Container end -->
  </section>
  <!--/ News end -->
