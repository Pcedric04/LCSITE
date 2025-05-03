<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-center mb-2">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('back/admin/profil/'. $photo)}}" alt="User profile picture">
                                </div>
                                <form action="{{ route('labo.back.profil.image.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="img_profil" class="form-control mb-3">
                                    <center class="mb-3">
                                        <button type="submit" class="btn btn-sm" style="background-color: #ff6902; color: #fff;"> Valider</button>
                                        <button type="submit" class="btn btn-sm" style="background-color: red; color: #fff;"> Supprimer</button>
                                    </center>
                                </form>
                            </div>
                            <div class="col-lg-7 offset-1 card">
                                @if($carnets != null)
                                    <form action="{{ route('labo.back.profil.carnet.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Profession</label>
                                                            <input type="text" name="profession" id="profession" class="form-control" value="{{ $carnets->profession }}">
                                                        </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Adresse</label>
                                                            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $carnets->adresse }}">
                                                        </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Competences</label>
                                                            <input type="text" name="competences" id="competences" class="form-control" value="{{ $carnets->competences }}">
                                                        </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Biographie</label>
                                                            <textarea name="biographie" id="biographie" class="form-control">
                                                                {{ $carnets->biographie }}
                                                            </textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center class="mb-3"><button type="submit" class="btn btn-sm" style="background-color: #ff6902; color: #fff;"> Valider</button></center>
                                    </form>
                                @else
                                    <form action="{{ route('labo.back.profil.carnet.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Profession</label>
                                                            <input type="text" name="profession" id="profession" class="form-control">
                                                        </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Adresse</label>
                                                            <input type="text" name="adresse" id="adresse" class="form-control">                                                      </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Competences</label>
                                                            <input type="text" name="competences" id="competences" class="form-control">
                                                        </div>
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="inputSuccess"> Biographie</label>
                                                            <textarea name="biographie" id="biographie" class="form-control">
                                                            </textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center class="mb-3"><button type="submit" class="btn btn-sm" style="background-color: #ff6902; color: #fff;"> Valider</button></center>
                                    </form>
                                @endif
                            </div>
                        </div>
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
