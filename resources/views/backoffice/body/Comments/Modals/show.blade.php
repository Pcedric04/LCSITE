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
                        <form method="POST" action="{{ route('labo.back.comments.update', $comments->id) }}"
                            id="africa-form-submit">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputSuccess">Auteur du
                                                    commentaire<span style="color: red;">*</span></label>
                                                <input type="text" name="auteur" id="auteur" class="form-control"
                                                    title="Auteur" placeholder="Auteur" value="{{ $comments->name }}">
                                                <span class="auteur_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <section class="content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="col-form-label">
                                                            <strong>Contenu du commentaire<span
                                                                    style="color: red;">*</span></strong>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <textarea name="contenu">
                                                                            {{ $comments->content }}
                                                                </textarea>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fa fa-times"></i>Annuler</button>
                        <button type="button" onclick="updateRecord()" id="sender" class="btn"
                            style="background-color: #ff6902;">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status"
                                aria-hidden="true"> </span>
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('textarea'));
</script>
