<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="card card-row ">
                    <form method="POST" action="{{ route('labo.back.Videos.update',$videos->id) }}" id="africa-form-submit">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="card card-header" style="background-color: #ff6902;">
                                    </div>
                                    <span>(<span style="color:red;">*</span>)Champs obligatoires</span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Titre de la vidéo<span style="color:red;">*</span></label>
                                                    <input type="text" name="titres" id="titres" class="form-control" title="Titre" value="{{ $videos->titre }}">
                                                    <span class="titres_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Url<span style="color:red;">*</span></label>
                                                    <input type="url" name="liens" id="liens" class="form-control" title="URL" value="{{ $videos->url }}">
                                                    <span class="liens_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Description<span style="color:red;">*</span></label>
                                                    <input type="text" name="description" id="description" class="form-control" title="Description" value="{{ $videos->description }}">
                                                    <span class="description_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Catégories<span style="color:red;">*</span></label>
                                                    <select onclick="matValeur();" name="categories" id="select3" class="form-control" style="width: 100%;">
                                                        <option value="" style="text-align: center">
                                                        @foreach ($categories as $categories_items)
                                                        <option value="{{ $categories_items->id }}" style="text-align: center">
                                                                {{ $categories_items->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group" id="souscategories">
                                                    <label class="col-form-label" for="inputSuccess">Sous-catégories associées<span style="color:red;">*</span></label>
                                                   <input type="text" id="soucategories" name="souscategories" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i><b>Annuler</b></button>
                        <button type="button" onclick="storeRecord()" id="sender" class="btn" style="background-color: #ff6902; color: white;">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                            <b id="text-load" class="text-hide">En cours...</b>
                            <b id="text-fix"><i class="fa fa-plus-circle"></i>Modifier</b>
                        </button>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>

<form>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
</form>
