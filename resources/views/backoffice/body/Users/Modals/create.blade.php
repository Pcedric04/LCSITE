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
                    <form method="POST" action="{{ route('labo.back.users.store') }}" id="africa-form-submit">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="card card-header" style="background-color: #ff6902;">
                                    </div>
                                    <span>(<span style="color: red;">*</span>)Champs obligatoires</span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Nom(s)<span style="color: red;">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control" title="Nom(s) utilisateur" placeholder="Entrer le(s) nom(s)">
                                                    <span class="name_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Prénoms(s)<span style="color: red;">*</span></label>
                                                    <input type="text" name="surname" id="surname" class="form-control" title="Prénom(s) utlisateur" placeholder="Entrer le(s) prénoms(s)">
                                                    <span class="surname_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Pseudo de l'utilisateur<span style="color: red;">*</span></label>
                                                    <input type="text" name="nickname" id="nickname" class="form-control" title="Pseudo utlisateur" placeholder="Entrer le pseudo de l'utilisateur">
                                                    <span class="nickname_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Email de l'utilisateur<span style="color: red;">*</span></label>
                                                    <input type="email" name="email" id="email" class="form-control" title="Email utlisateur" placeholder="Entrer l'email de l'utilisateur">
                                                    <span class="email_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess">Associer un rôle<span style="color: red;">*</span></label>
                                                    <select name="roles[]" id="select3" class="form-control" style="width: 100%;">
                                                        <option value="" style="text-align: center">
                                                        @foreach ($roles as $roles_items)
                                                        <option value="{{ $roles_items->id }}" style="text-align: center">
                                                                {{ $roles_items->name }}
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

