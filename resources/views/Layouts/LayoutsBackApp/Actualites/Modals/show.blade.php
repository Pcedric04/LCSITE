@extends('Layouts.LayoutsBackApp.layoutbackapp')
@section('title', 'Articles | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsBackApp.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">Modifier votre articles</h1>
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
                                Articles
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
                        <a href="{{ route('labo.back.actualites.index') }}" title="Nouvelle Actualité" class="btn btn-primary"
                            style="color: #fff;">
                            <i class="fa fa-file-alt"></i><strong> Liste des articles</strong>
                        </a>
                        <a href="{{ route('labo.back.actualites.index') }}" title="Annuler" class="btn btn-danger"
                            style="color: #fff;">
                            <i class="fa fa-times"></i><strong> Annuler</strong>
                        </a>
                        <button type="button" onclick="updateRecord()" id="sender" class="btn btn-success">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                            <b id="text-load" class="text-hide">En cours...</b>
                            <b id="text-fix"><i class="fa fa-check-circle"></i><strong>Mise à jour</strong></b>
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
                            <form method="POST" action="{{ route('labo.back.actualites.update',$posts->id) }}" id="africa-form-submit">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card card-header"
                                            style="background-color: #ff6902;">
                                            </div>
                                            <div class="card-body">
                                            <p>(<span style="color: red;">*</span>)champs obligatoires</p>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess">Titre<span style="color: red;">*</span></label>
                                                            <input type="text" name="titre" id="titre" class="form-control" title="Titre" placeholder="Titre" value="{{ $posts->titre }}">
                                                            <span class="titre_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess">Sous-titre</label>
                                                            <input type="text" name="soustitre" id="soustitre" class="form-control" title="Sous-titre" placeholder="Sous-titre" value="{{ $posts->sousTitre }}">
                                                            <span class="soustitre_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label" for="inputSuccess">Catégories<span style="color: red;">*</span></label>
                                                        <select onclick="matValeur();" name="categories" id="select3" class="form-control" style="width: 100%;">
                                                            <option value="" style="text-align: center">
                                                            @foreach ($categories as $categories_items)
                                                            <option value="{{ $categories_items->id }}" style="text-align: center">
                                                                    {{ $categories_items->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="categories_err error text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group" id="souscategories">
                                                        <label class="col-form-label" for="inputSuccess">Sous-catégories associées<span style="color: red;">*</span></label>
                                                        <input type="text" id="souscategories" name="souscategories" class="form-control" readonly>
                                                        <span class="souscategories_err error text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <section class="content">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="col-form-label">
                                                                            <strong>Contenu de l'article<span style="color: red;">*</span></strong>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <textarea name="contenu" id="summernote">
                                                                            {{ $posts->contenus }}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                        </section>
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
   {{--  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('textarea'));
    </script> --}}
@endsection
