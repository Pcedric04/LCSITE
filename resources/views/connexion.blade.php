<!DOCTYPE html>
<html lang="UTF-8 Fr_fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="{{ asset('front/public/images/favicon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/public/images/favicon.png') }}">
    <title>Page de connexion-Laboratoire-Citoyennetés</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('back/dist/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="hold-transition login-page">
    <!-- /.login-box -->
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <div class="card-header text-center">
                <a href="{{ route('home') }}"><img src="{{ asset('front/public/images/logo.png') }}" alt="" height="75"></a>
            </div>
            <div class="card-body login-card-body" style="border-radius: 10px 10px;">
                <p class="login-box-msg">ouvrir une session</p>
                <form action="{{ route('labo.users.login') }}" method="post" id="form-submit">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}"
                            class="form-control" placeholder="Nom utilisateur">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Mot de passe">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="far fa-eye" id="togglePassword"></i>
                            </div>
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="icheck-dark">
                                <input type="checkbox" id="remember">
                                <label for="remember">Se rappeller</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6 col-md-6">
                            <button type="submit" id="sender" class="btn" style="font-weight: 600; background-color: #ff6902;color: white;">
                                <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                                <b id="text-load" class="text-hide">Connexion en cours...</b>
                                <b id="text-fix"> Connexion</b>
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="#" style="color: #ff6902;">Mot de passe oublié</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('labo.index') }}" class="text-center" style="color: #ff6902;">
                        <i class="fa fa-globe"></i> Revenir au site public
                    </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
/*             function storeRecord(){
                        var form = $('#form-submit');
                        $("#africa-modal-container div.modal .form-group .form-control" ).removeClass("is-invalid");
                        $(".error" ).html("");
                        var formNode = document.getElementById('form-submit');
                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: new FormData(formNode),
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function () {
                                $('#text-fix').addClass('text-hide');
                                $('#text-load').removeClass('text-hide');
                                $('#btn-load').removeClass('d-none');
                                $('#sender').addClass('enabled');
                            },
                            success: function(result){
                                $("#form-submit").trigger('reset');
                                var type = result.type;
                                var message = result.message;
                                switch(type){
                                    case 'info':
                                        swal(message, "", "info");
                                        break;
                                    case 'warning':
                                        swal("Attention!", message, "warning");
                                        break;
                                    case 'success':
                                        swal("Succès !", ''+message+'', "success");
                                        break;
                                    case 'error':
                                        swal("Attention!", message, "error");
                                        break;
                                }
                                    $('#text-load').addClass('text-hide');
                                    $('#text-fix').removeClass('text-hide');
                                    $('#sender').addClass('disabled');
                                    $('#btn-load').addClass('d-none');
                                    $('#example').DataTable().ajax.reload(null, true);
                            },
                            error: function(xhr, status, error) {
                                var response=xhr.responseJSON;
                                $.each(response, function(key, value) {
                                    $("#africa-modal-container div.modal .form-group."+key+" .form-control").addClass("is-invalid");
                                    $('.'+key+'_err').text(value);
                                    $('#text-load').addClass('text-hide');
                                    $('#text-fix').removeClass('text-hide');
                                    $('#btn-load').addClass('d-none');
                                    $('#sender').removeClass('disabled');
                                });
                            }
                        });
            }; */
    </script>
</body>

</html>
