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
                    <form method="POST" action="{{ route('labo.back.publications.store') }}" id="africa-form-submit">
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
                                                    <label class="col-form-label" for="inputSuccess">Page de couverture:(<span style="color:red;">jpg,jpeg,png</span>)</label>
                                                    <input type="file" name="pages" id="pages" class="form-control">
                                                    <span class="pages_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Titre de la publication<span style="color:red;">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                    <span class="name_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Pays<span style="color:red;">*</span></label>
                                                    <select name="pays" id="pays" class="form-control" style="width: 100%;">
                                                        <option value="" style="text-align: center">
                                                        <option value="Burkina-Faso" style="text-align: center">Burkina-Faso</option>
                                                        <option value="Niger" style="text-align: center">Niger</option>
                                                        <option value="Bénin" style="text-align: center">Bénin</option>
                                                    </select>
                                                    <span class="pays_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Fichier:(<span style="color:red;">* Pdf</span>)</label>
                                                    <input type="file" name="documents" id="documents" class="form-control">
                                                    <span class="documents_err error text-danger"></span>
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
                            <b id="text-load" class="text-hide">Ajout cours...</b>
                            <b id="text-fix"><i class="fa fa-plus-circle"></i>Ajouter</b>
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
