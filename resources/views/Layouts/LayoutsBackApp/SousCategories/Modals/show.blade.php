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
                    <form method="POST" action="{{ route('labo.back.souscategories.update',$souscategories->id) }}" id="africa-form-submit">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="card card-header" style="background-color: #ff6902;">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Sous-Catégories</label>
                                                    <input type="text" name="souscategories" id="souscategories" value="{{ $souscategories->name }}" class="form-control" title="Sous-Catégories" placeholder="Sous-Catégories">
                                                    <span class="souscategories_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Types de catégories</label>
                                                    <select name="categories[]" id="select3" class="form-control" style="width: 100%;">
                                                        <option value="" style="text-align: center">
                                                        @foreach ($categories as $categories_items)
                                                        <option value="{{ $categories_items->id }}" style="text-align: center">
                                                                {{ $categories_items->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i><b>Annuler</b></button>
                        <button type="button" onclick="updateRecord()" id="sender" class="btn" style="background-color: #ff6902; color: white;">
                            <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                            <b id="text-load" class="text-hide">En cours...</b>
                            <b id="text-fix"><i class="fa fa-plus-circle"></i>Mise à jour</b>
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

