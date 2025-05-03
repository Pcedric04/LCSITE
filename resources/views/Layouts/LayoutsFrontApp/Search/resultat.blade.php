<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('Layouts.LayoutsFrontApp.Headers.header')

<body>
    @include('Layouts.LayoutsFrontApp.Navbar.navbar')
    @if (empty($message) || $message->count() == 0)
    @else
        @include('Layouts.LayoutsFrontApp.Flash.flashinfo', ['message' => $message])
    @endif
    <div class="container-fluid">
        <div class="row">
            <h1 class="mb-5 mt-2" style="font-size: 35px;color: #ff6902;">Resultats de la recherche</h1>
            @if ($posts->count()!=0 || $agendas->count()!=0)
                <div class="col-lg-12">
                    <div class="container-fluid mb-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul>
                                    @foreach ($posts as $items)
                                        <li class="mb-3">
                                            <a href="{{ route('labo.front.actualites.allpost.details',$items->id) }}"  style="font-weight: 600; font-size: 18px;color: #ff6902;">
                                                {{ $items->titre }}<span style="color: black;"> (Actualités)</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    @foreach ($agendas as $items)
                                        <li class="mb-3" style="font-weight: 600; font-size: 18px;color: #ff6902;">{{ $items->titre }} <span style="color: black;">(Agendas)</span> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            @else
            <h3>Aucun résultat trouvés</h3>
                <a href="{{ route('labo.index') }}" style="font-size: 18px;color: #ff6902;" class="mt-5"> <span class="fa fa-arrow-left"> retour a l'accueil</span></a>
            @endif
        </div>
    </div>
    @include('Layouts.LayoutsFrontApp.Footers.footer')
    @include('cookie-consent::index')
    @include('Layouts.LayoutsFrontApp.Footers.script')

</body>

</html>

