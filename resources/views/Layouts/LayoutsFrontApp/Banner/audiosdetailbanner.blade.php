<!-- Banniere Start -->
<div class="container-fluid page-header py-5 mb-2">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">Médiathèques</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('labo.index') }}">Accueil</a></li>
                <li class="breadcrumb-item" aria-current="page">Médiathèques</li>
                <li class="breadcrumb-item" aria-current="page">Audios</li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{ $audios->titre }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Banniere End -->
