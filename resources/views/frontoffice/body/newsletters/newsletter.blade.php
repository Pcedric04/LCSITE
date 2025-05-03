<!DOCTYPE html>
<html>

<head>
    <title>Newsletter Laboratoire-Citoyennetés</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }
        h2 .hover{
            color: #ff6902;
        }

        p {
            color: #555;
            line-height: 1.5;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <img src="{{ asset('front/public/images/logo.png') }}" alt="Labo-Citoyennetes" class="img-fluid">
        </center>
        <h1 class="mb-2">Bienvenue sur <span style="color: #ff6902;">Laboratoire-Citoyennetés</span></h1>
        <p class="mb-2">Merci de vous êtes inscrits à notre newsletter. Voici nos derniers articles de la semaine:</p>
        <h1>1.Articles</h1>
        @foreach ($posts as $post)
            <img src="{{ asset('front/admin/articles/'.$post->photoIllustration) }}"
                alt="photo article" style="float: left; height: 100px; width: 90px; margin-right: 10px;">
            <h2 class="mb-2" style="position:relative; ">
                <a href="{{ route('labo.front.actualites.details',$post->id) }}" target="_blank" style="color: #ff6902;text-decoration: none;">
                    {{ $post->titre }}
                </a>
            </h2>
            <p>{!! Str::limit(strip_tags($post->contenus), 240, '(...)') !!}</p>
            <a style="display: inline;" href="{{ route('labo.front.actualites.details',$post->id) }}" class="mb-2">Lire la suite</a>
        @endforeach
        {{-- <br>
        <br>
        <h1>2.Agendas</h1>
        @foreach ($agendas as $agenda)
        <h2 class="mb-2" style="color: #ff6902;text-decoration: none;">
                {{ $agenda->titre }}
        </h2>
        <p>{{ $agenda->contenu }}</p>
        @endforeach --}}
        <br>
        <br>
        <p>Pour tout besoin d'informations n'hésitez pas à nous contacter.</p>
        <p>Bonne suite,</p>
        <p>Equipe Laboratoire-Citoyennetés</p>

        <div class="footer">
            Cet email a été envoyé à {{ $recipient }}. Se désinscrire, <a href="#">cliquer ici</a>.
        </div>
    </div>
</body>

</html>
