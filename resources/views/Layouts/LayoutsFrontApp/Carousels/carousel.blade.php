<!-- Carousel Start -->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-8 col-md-12">
                <div id="header-carousel" class="carousel ">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="width: 945px; height: 430px;" src="{{ asset('Front/img/arton2422.jpg') }}">
                            <div class="carousel-caption text-center">
                                <h1 style="font-weight: 600;font-size: 25px; margin-left: 15px;
                                color: #fff;text-shadow: #ff6925 1px 0 10px; text-transform:uppercase; ">
                                    <strong>Lancement de la phase operationnelle du projet fasoveil</strong>
                                </h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img style="width: 945px; height: 430px;" src="{{ asset('Front/img/arton2423.jpg') }}">
                            <div class="carousel-caption text-center">
                                <h1 style="font-weight: 600;font-size: 25px; margin-left: 15px;
                                color: #fff;text-shadow: #ff6925 1px 0 10px;text-transform:uppercase; ">
                                    <strong>Allocution du president du laboratoire citoyennetés</strong>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précedent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="panel panel-default" style="background-color: #fff;border: 2px solid #ff6902;">
                    <div class="panel-heading text-center">
                        <h4 style="background: #ff6902;color: #fff; border-radius: 0px 15px;">Actualités</h4>
                    </div>
                    <div class="panel-body">
                        @foreach ($postsall1 as $items)
                            <img class="img-circle pull-right img-thumbnail" width="80" height="80"
                                src="{{ asset('Articles/' . $items->photoIllustration) }}">
                            <span style="color: black;font-size: 12px;">
                                {{ $items->created_at }}:
                            </span><a href="{{ route('labo.front.actualites.allpost.details', $items->id) }}"
                                style="font-size: 12px;color: #ff6902;font-weight: 600;">

                                {{ $items->titre }}
                            </a>
                            <div class="clearfix"></div>
                            <hr>
                        @endforeach
                        <h5 style="text-align: right;font-size: 14px;"><a
                                href="{{ route('labo.front.actualites.allpost') }}" class="mb-5"
                                style="color: #ff6902;margin-right: 10px;">Toute les actualités</a></h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
