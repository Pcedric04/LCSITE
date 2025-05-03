<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-row">
                    <div class="card-header" style="background-color: #ff6902;">

                    </div>
                    <span>(<span style="color: red;">*</span>)Champs obligatoires</span>
                <div class="card-body">
                    <form method="POST" action="{{ route('labo.back.infos.update',$flash->id) }}" id="africa-form-submit">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess">Titre du flash<span style="color: red;"> *</span></label>
                                            <input type="text" name="flash" id="flash" class="form-control" title="Message flash" value="{{ $flash->infosflash }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess">Lien url</label>
                                            <input type="url" name="liens" id="liens" class="form-control" title="liens" value="{{ $flash->liens }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Annuler</button>
                        <button type="button" onclick="updateRecord()" id="sender" class="btn" style="background-color: #ff6902;">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                            <b id="text-load" class="text-hide">En cours...</b>
                            <b id="text-fix"><i class="fa fa-check-circle"></i>Modifier</b>
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
@yield('js')
