@extends('Layouts.LayoutsBackApp.layoutbackapp')
@section('title', 'Albums | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsBackApp.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">Nouvel album</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a
                                    href="{{ route('labo.back.index') }}">Accueil</a>
                            </li>
                            <li style="font-weight: 800; text-light" class="breadcrumb-item active">
                                Gestion du site
                            </li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">
                                Nouvel album
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-lg-12">
                         <a href="{{ route('labo.back.albums.index') }}" title="liste albums" class="btn btn-primary"
                            style="color: #fff;">
                            <i class="fa fa-file-alt"></i><strong> Liste des albums</strong>
                        </a>
                        <button type="button" onclick="storeRecord()" id="sender" class="btn btn-success">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status"
                                aria-hidden="true"> </span>
                            <b id="text-load" class="text-hide">En cours...</b>
                            <b id="text-fix"><i class="fa fa-check-circle"></i><strong>Ajouter</strong></b>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-row card-default">
                            <form method="POST" action="{{ route('labo.back.albums.store') }}" id="africa-form-submit" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="">
                                            <div class="card card-header" style="background-color: #ff6902;">
                                            </div>
                                            <div class="card-body">
                                                <span>(<span style="color: red;">*</span>)Champs obligatoires</span>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess">Logo de l'album<span style="color:red;">*</span></label>
                                                            <input type="file" name="logo" id="logo"
                                                                class="form-control" title="Logo de l'album"
                                                                placeholder="Logo de l'album">
                                                            <span class="logo_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess">Titre<span style="color:red;">*</span></label>
                                                            <input type="text" name="titre" id="titre"
                                                                class="form-control" title="Titre" placeholder="Titre">
                                                            <span class="titre_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label"
                                                                for="inputSuccess">Description</label>
                                                            <input type="text" name="description" id="description"
                                                                class="form-control" title="Description"
                                                                placeholder="Description">
                                                            <span class="description_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label" for="inputSuccess">Catégories
                                                            <span style="color: red;">*</span>
                                                        </label>
                                                        <select  onclick="matValeur();" name="categories" id="select3" class="form-control" style="width: 100%;">
                                                            <option value="" style="text-align: center">
                                                                @foreach ($categories as $categories_items)
                                                            <option value="{{ $categories_items->id }}"
                                                                style="text-align: center">
                                                                {{ $categories_items->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group" id="souscategories">
                                                            <label class="col-form-label" for="inputSuccess">Sous-catégories associées
                                                                <span style="color: red;">*</span>
                                                            </label>
                                                                <input type="text" id="soucategories" name="souscategories" class="form-control" readonly>
                                                            <span class="souscategorie_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label" for="inputSuccess">Vos images de l'albums
                                                            <span style="color: red;">*</span>
                                                            <span style="color: red;">(Selection multiple possible)</span>
                                                        </label>
                                                        <input type="file" name="albums[]" id="albums" class="form-control" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

