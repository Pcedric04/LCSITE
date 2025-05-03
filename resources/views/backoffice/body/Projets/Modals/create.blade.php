<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="card card-row ">
                    <form method="POST" action="{{ route('labo.back.projets.store') }}" id="africa-form-submit">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="card card-header" style="background-color: #ff6902;">
                                    </div>
                                    <span>(<span style="color:red;">*</span>)Champs obligatoires</span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Nom du projet<span style="color:red;">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control" title="Numéros" placeholder="Numéros">
                                                        <span class="name_err error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Durée du projet<span style="color:red;">*</span></label>
                                                        <input type="text" name="duree" id="duree" class="form-control" title="Durée" placeholder="Durée">
                                                        <span class="duree_err error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Financer par:</label>
                                                        <input type="text" name="financer" id="financer" class="form-control" title="Financement" placeholder="Financement">
                                                        <span class="financer_err error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Documents<span style="color:red;">*</span></label>
                                                        <input type="file" name="documents" id="documents" multiple class="form-control">
                                                        <span class="documents_err error text-danger"></span>
                                                    </div>
                                                </div>
                                              <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Catégories<span style="color:red;">*</span></label>
                                                        <select onclick="matValeur();" name="categories" id="select3" class="form-control" style="width: 100%;">
                                                            <option value="" style="text-align: center">--Catégories--</option>
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
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="inputSuccess">Régions<span style="color:red;">*</span></label>
                                                        <select onclick="maRegions();" name="regions" id="select2" class="form-control" style="width: 100%;">
                                                            <option value="" style="text-align: center">--Régions--</option>
                                                            @foreach ($regions as $regions_items)
                                                                <option value="{{ $regions_items->id }}" style="text-align: center">
                                                                        {{ $regions_items->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="Regions_err error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group" id="provinces">
                                                        <label class="col-form-label" for="inputSuccess">Provinces<span style="color:red;">*</span></label>
                                                        <input type="text" readonly class="form-control">
                                                        <span class="provinces_err error text-danger"></span>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <section class="content">
                                                            <h3 class="col-form-label">
                                                                <strong>Objectif du projet<span style="color: red;">*</span></strong>
                                                            </h3>
                                                        <div class="card-body">
                                                            <textarea  id="summernote" name="contenu">

                                                            </textarea>
                                                        </div>
                                                </section>
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
     function matValeur() {
        $("#select3").change(function() {
            var link = "{{ route('labo.back.albums.souscategories', ':id') }}";
            var link = link.replace(":id", $(this).val());
            $.ajax({
                url: link,
                method: 'GET',
                success: function(data) {
                    $('#souscategories').html(data);
                }
            })
        });
    };
    function maRegions() {
        $("#select2").change(function() {
            var link = "{{ route('labo.back.projets.regions', ':id') }}";
            var link = link.replace(":id", $(this).val());
            $.ajax({
                url: link,
                method: 'GET',
                success: function(data) {
                    $('#provinces').html(data);
                }
            })
        });
    };
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Saisir votre contenu',
                height: 200
            });
        });
</script>
