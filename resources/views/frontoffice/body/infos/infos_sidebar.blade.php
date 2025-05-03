
<div class="sidebar sidebar-right">
    <div class="widget recent-posts">
        <h3 class="widget-title">Récentes Actualités</h3>
        <ul class="list-unstyled">
            @foreach ($postsall as $items)
                <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                        <a href="#"><img loading="lazy" alt="img"
                                src="{{ asset('front/admin/articles/' . $items->photoIllustration) }}"></a>
                    </div>
                    <div class="post-info">
                        <h4 class="entry-title">
                            <a
                                href="{{ route('labo.front.actualites.details', $items->id) }}">{{ $items->titre }}</a>
                        </h4>
                    </div>
                </li><!-- 1st post end-->
            @endforeach
        </ul>

    </div><!-- Recent post end -->

    <div class="widget">
        <h3 class="widget-title">Categories</h3>
        <ul class="arrow nav nav-tabs">
            @foreach ($categories as $items)
                <li><a href="#">{{ $items->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- Categories end -->


    <div class="widget widget-tags">
        <h3 class="widget-title">Tags </h3>

        <ul class="list-unstyled">
            @foreach ($souscategories as $items)
                <li><a href="{{ route('labo.front.actualites.souscat',$items->id) }}">{{ $items->name }}</a></li>
            @endforeach

        </ul>
    </div><!-- Tags end -->


</div><!-- Sidebar end -->
