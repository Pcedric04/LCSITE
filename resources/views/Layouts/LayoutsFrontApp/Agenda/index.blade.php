<!-- Facebook Start -->
<div class="container-fluid">
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <div class="col-lg-5 col-md-5 mb-3">
                <div class="text-center text-md-start pb-5 pb-md-2" style="max-width: 100%;">
                    <h1 style="font-size: 25px; text-align:center;background-color: #ff6902; color: #ffff;">
                        <i class="fab fa-facebook"></i> Suivez notre page facebook
                    </h1>
                </div>
                <div style="max-width: 100%;">
                    <div class="fb-page"
                        data-href="https://www.facebook.com/LaboCitoyennetes"
                        data-tabs="timeline"
                        data-width="370"
                        data-height="420"
                        data-small-header="false"
                        data-adapt-container-width="false"
                        data-hide-cover="false"
                        data-show-facepile="true">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="text-center text-md-start pb-5 pb-md-2">
                    <h1 class="display-7 mb-4 responsive"
                        style="background-color: #ff6902;font-size: 22px; text-align:center; color: #ffff;">
                        <i class="fa fa-calendar-alt"></i> Agenda & Evènements à vénir
                    </h1>
                    <div class="conatiner-fluid  mb-3">
                        <div class="card">
                            <div class="card-body" style="color:#ff6902; font-size: 16px;">
                                <ul>
                                    @if (empty($agendas))
                                        <h5 class="mb-3">
                                            Aucun agenda disponible
                                        </h5>
                                    @else
                                        @foreach ($agendas as $agendas_items)
                                            <p class="mb-3">
                                                <h5><i class="fa fa-calendar-alt" style="color:#ff6902;"></i> {{ $agendas_items->titre }}</h5>
                                                <p>{{ $agendas_items->contenu }}</p>
                                            </p>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facebook End -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v16.0&appId=215852657759123&autoLogAppEvents=1" nonce="SqaVjKj9"></script>
