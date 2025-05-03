<!-- Actualites Start -->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row mb-3" style="background-color: #fff;">
    <h1 class="display-7 mb-4 m-2 text-center"
        style="font-size:28px; color: #ff6902;text-decoration: underline;">Récentes actualités</h1>
        @foreach ($posts as $posts_items)
            <div class="col-lg-4">
                <div class="card responsive p-0 mt-4 mb-3">
                    <span class="badge rounded-pill bg-primary">{{ $posts_items->Sname }}</span>
                    <img class="card-img-top" style="height: 262px; width: auto;"
                        src="{{ asset('Articles/' . $posts_items->photoIllustration) }}" alt="article image">
                    <div class="card-body">
                        <a href="{{ route('labo.front.actualites.allpost.details',$posts_items->id) }}"><h5 class="card-title" style="font-size: 18px;"> <strong style="color: #ff6902;">
                                {{ date('d-m-y', strtotime($posts_items->created_at)) }}:</strong>
                            <b>{{ $posts_items->titre }}</b>
                        </h5></a>
                        <a href="{{ route('labo.front.actualites.allpost.details',$posts_items->id) }}">
                            <p class="card-text" style="color:black; font-weight:500;font-size: 14px;">{!! Str::limit(strip_tags($posts_items->contenus), 200, '(...)') !!}</p>
                        </a>
                        <div class="text-start mt-2">
                            <p style="font-weight: 400;">{{ $posts_items->visits }} view(s)</p>
                        </div>
                        <div id="social-links" class="mb-2">
                            <ul style="display:inline; ">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.index') }}" class="social-button"
                                        id=""><span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.index') }}"
                                        class="social-button" id=""><span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.index') }}"
                                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/?text={{ route('labo.index') }}" class="social-button" id=""><span
                                            class="fab fa-whatsapp"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                <div style="float: right; ">
                    <a href="{{ route('labo.front.actualites.allpost.details', $posts_items->id) }}"
                        class="text-white btn btn-sm bg bg-primary">
                       En savoir plus
                    </a>
                </div>
            </div>
            </div>
            </div>
        @endforeach
        <div>
            <a href="{{ route('labo.front.actualites.allpost') }}" class="btn btn-sm bg bg-primary"
                style="position: absolute; border-color: #ff6902; float: right;color:white; position: relative; margin-bottom: 10px;">
                Toutes les actualités
            </a>
        </div>
    </div>
</div>
</div>
<!-- Actualites End -->
