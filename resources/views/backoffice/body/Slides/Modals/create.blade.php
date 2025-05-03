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
                <form method="POST" action="{{ route('labo.back.slides.store') }}" id="africa-form-submit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="card card-header" style="background-color: #ff6902;">
                                </div>
                                <div class="card-body">
                                    <span>(<span style="color: red;">*</span>)Champs obligatoires</span>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputSuccess">Image du slide<span style="color:red;">*</span></label>
                                                <input type="file" name="image" id="image"
                                                    class="form-control" title="image du slide"
                                                    placeholder="image du slide">
                                                <span class="image_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputSuccess">Titre<span style="color:red;">*</span></label>
                                                <input type="text" name="titre" id="titre"
                                                    class="form-control" title="Titre" placeholder="Titre">
                                                <span class="titre_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="inputSuccess">Sous-Titre</label>
                                                <input type="text" name="soustitre" id="soustitre"
                                                    class="form-control" title="soustitre"
                                                    placeholder="soustitre">
                                                <span class="soustitre_err error text-danger"></span>
                                            </div>
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
<script>
$(function()
{
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
