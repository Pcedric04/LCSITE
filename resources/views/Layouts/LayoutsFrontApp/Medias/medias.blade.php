<!-- Mediatheques Start -->
 <div class="container-fluid">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 mb-5 mt-3">
            <div class="row" style="background-color: #fff;">
                <div class="col-lg-4 col-md-4 mt-3">
                    <div class="card mb-2">
                        <div class="" style="background-color: #ff6902; border-radius: 0px 15px;">
                            <h1  style="text-align:center; font-size: 18px;font-weight: 600;color: white;">Médiathèques</h1>
                        </div>
                    </div>
                    <div class="row" style="background-color: ghostwhite;">
                        <div class="col-lg-4 col-md-4">
                            <div class="team-item pb-4">
                                <div class="icon"><img src="{{ asset('Front/img/icon/videos.png') }}" alt="" width="60"></div>
                                <h5 style="font-size:16px;" >LC Vidéos</h5>
                                <a href="{{ route('labo.front.videos.index') }}"><button
                                        class="btn btn-sm btn-primary bg bg-dark play-button">Suivre</button></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-item pb-4">
                                <div class="icon"><img src="{{ asset('Front/img/icon/album.png') }}" alt="" width="80"></div>
                                <h5 style="font-size:16px;" >LC Photos</h5>
                                <a href="{{ route('labo.front.albums.index') }}"><button class="btn btn-sm btn-primary bg bg-dark play-button">Suivre</button></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4">
                            <div class="team-item pb-4">
                                <div class="icon"><img src="{{ asset('Front/img/icon/audio.png') }}" alt="" width="60"></div>
                                <h5 style="font-size:16px;" >LC Audios</h5>
                                <a href="{{ route('labo.front.audios.index') }}"><button
                                        class="btn btn-sm btn-primary bg bg-dark play-button">Ecouter</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card mb-2">
                        <div style="background-color:#ff6902; border-radius: 0px 15px;">
                            <h5 style="text-align:center; font-size: 16px;font-weight: 600;color: white;">Agenda & Evènements à venir</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                        @foreach($agendas as $items)
                                        <li style="color:#ff6902;font-weight:600; font-size: 14px;">
                                            {{$items->titre}}
                                        </li>
                                    <hr>
                                </p>
                        @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="text-center text-lg-start pb-5 pb-lg-0">
                        <div class="card">
                        <div style="background-color: #ff6902; border-radius: 0px 15px;">
                        <h1 style="text-align:center; font-size: 16px;font-weight: 600;color: white;">Centre de ressources<h1>
                        </div>
                        </div>
                    </div>
                    <div class="team-item pb-4">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('Front/img/Accueil/ressources.jpg') }}" alt="Medias"
                                style="width: 100%;height: 184px;">
                        </a>
                        <p style="text-align: left; font-weight: 500; margin-left: 15px;font-size: 16px;color: black;">
                            {{ Str::limit(
                                'Le Centre de ressources répond au souci du Laboratoire Citoyennetés de capitaliser
                                des documents et des ouvrages portant sur les processus de décentralisation,
                                les enjeux de la gouvernance et de la citoyenneté et le développement local.
                                Il comporte un éventail de périodiques, de bulletins officiels, de littérature grise,
                                d’ouvrages et de revues de sciences sociales et juridiques et sur le développement.
                                C’est un lieu de recherche destiné aux étudiants, aux chercheurs, aux associations de développement
                                et aux consultants.',300,'...',
                            ) }}
                            <a href="{{ route('labo.front.centre.ressources.index') }}" class="mt-2 btn btn-sm bg-primary"
                                style="float: right; color: white;font-weight: 600;margin-right: 10px;margin-bottom: 10px; position: relative;">En savoir plus</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Mediatheques End -->
