@extends('layouts.backapplayouts')
@section('title', 'Mon profil')
@section('content')
    @include('backoffice.back.headers.navbar.navbar')
    @include('backoffice.back.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a
                                    href="{{ route('labo.back.index') }}">Accueil</a>
                            </li>
                            <li style="font-weight: 800; text-light" class="breadcrumb-item active">
                                Comptes
                            </li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">
                                @yield('title')
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('back/admin/profil/'.$photo)}}" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                                <p class="text-muted text-center" style="text-transform:capitalize; ">{{  Auth::user()->roles()->pluck('name')->implode(', ')}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Articles en rédaction</b> <a class="float-right" style="color: #ff6902;">{{ $posts_offline->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Articles publiés</b> <a class="float-right" style="color: #ff6902;">{{ $posts_online->count() }}</a>
                                    </li>
                                </ul>
                                <a onclick="showRecord('{{ route('labo.back.profil.show',Auth::user()->id ) }}')" class="btn btn-sm btn-block"  style="background-color: #ff6902;color: #fff;"><b>Modifier</b></a>
                            </div>

                        </div>

                        @if ($carnets !== null)
                        <div class="card">
                            <div class="card-header"  style="background-color: #ff6902;color: #fff;">
                                <h3 class="card-title">A propos de moi</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Profession</strong>
                                <p class="text-muted">
                                    {{ $carnets->profession }}
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>
                                <p class="text-muted">{{ $carnets->adresse }}</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Competences</strong>
                                    <p class="text-muted">
                                        <span class="tag tag-danger">{{ $carnets->competences }}</span>
                                    </p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Biographie</strong>
                                <p class="text-muted">{{ $carnets->biographie }}</p>
                            </div>

                        </div>
                        @else
                        <div class="card">
                            <div class="card-header"  style="background-color: #ff6902;color: #fff;">
                                <h3 class="card-title">A propos de moi</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Profession</strong>
                                <p class="text-muted">
                                    Non renseignée
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>
                                <p class="text-muted"> Non renseignée</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Competences</strong>
                                    <p class="text-muted">
                                        <span class="tag tag-danger"> Non renseignée</span>
                                    </p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Biographie</strong>
                                <p class="text-muted"> Non renseignée</p>
                            </div>

                        </div>
                    @endif

                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#activity" data-toggle="tab"
                                            style="background-color: #ff6902;color: #fff;">
                                                Mes Articles publiés
                                        </a>
                                    </li>
                                   {{--  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Commentaires</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane scroll-container" id="activity">
                                        <div class="scroll-content">
                                            @foreach ($posts as $items)
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{ asset('front/admin/articles/'. $items->photoIllustration)}}" alt="image">
                                                        <span class="username">
                                                        <a style="color: #ff6902;" href="{{ route('labo.front.actualites.details',$items->id) }}" target="_blank">{{ $items->titre }}</a>
                                                        {{-- <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a> --}}
                                                    </span>
                                                    <span class="description">par {{ $items->nickname }} {{ $items->created_at }}</span>
                                                </div>
                                                <p>
                                                    {!! Str::limit(strip_tags($items->contenus), 300, '(...)') !!}
                                                </p>
                                                {{-- <p style="margin-bottom: 2cm;">
                                                    <span class="float-left">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Comments (5)
                                                        </a>
                                                    </span>
                                                </p> --}}
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="africa-modal-container">

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
