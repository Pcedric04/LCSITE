<div class="container-fluid">
    <div class="container-fluid">
        <div class="row mb-3" style="background-color: #fff;">
            <h1 class="mb-4 m-2 text-center"
            style="font-size:28px; color: #ff6902;text-decoration: underline;">Nos cellules</h1>
            <div class="col-lg-4 col-md-6">
                <div class="card1 card-favorite">
                  <div class="card-img-container">
                    <a href="#" style="background-image:url({{  asset('Front/img/Accueil/axe01.jpg') }})" class="card-img"></a>
                  </div>
                  <div class="card-content" style="background-color: #ff6902;  border-radius: 0px 15px;" >
                    <h2 style="color: #fff; font-size: 17px; font-weight: 600;">
                            <a href="{{ route('labo.front.axerecherche.index') }}">
                                Axe Recherche/Capitalisation
                      </a>
                    </h2>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card1 card-favorite">
                  <div class="card-img-container">
                    <a href="#" style="background-image:url({{ asset('Front/img/Accueil/axe02.jpg') }})" class="card-img"></a>
                  </div>
                  <div class="card-content" style="background-color: #ff6902; border-radius: 0px 15px;">
                    <h2 style="color: #fff; font-size: 17px; font-weight: 600;">
                            <a href="{{ route('labo.front.axefacilitation.index') }}">
                                Axe Facilitation/Influence
                      </a>
                    </h2>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card1 card-favorite">
                  <div class="card-img-container">
                    <a href="#" style="background-image:url({{ asset('Front/img/Accueil/axe03.png') }})" class="card-img"></a>
                  </div>
                  <div class="card-content" style="background-color: #ff6902; border-radius: 0px 15px;">
                    <h2 style="color: #fff; font-size: 17px; font-weight: 600;">
                            <a href="{{ route('labo.front.axesuivi.index') }}">
                                Axe Suivi
                      </a>
                    </h2>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.card1 {
    min-width: 0;
    width: 100%;
    color: #696969;
    -webkit-transition: .3s ease all;
    transition: .3s ease all;
    border: none;
    border-radius: 5px;
    padding: 0;
    margin-bottom: 30px;
}

.card1 .card-img-container .card-img {
  background-size: cover;
  background-position: top center;
  display: block;
  height: 175px;
}

.card1 .card-img {
  height: 150px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.card1 .card-img-container {
  position: relative;
  overflow: hidden;
  width: 100%;
}

.card1 .card-content {
  text-align: center;
}

.card1 .card-meta {
  font-size: 12px;
}

.card1 .meta-box {
  margin-right: 20px;
}

.card1 .card-content h2 {
  margin-top: 10px;
  margin-bottom: 0;
  font-size: 16px;
  line-height: 1.4;
}

.card1 h2 a {
  color: #ffffff;
  -webkit-transition: .3s ease all;
  transition: .3s ease all;
}

a:hover{
    text-decoration:none;
}

.card1:hover h2 a {
  color: #0C0C0C;
}

.card1 .meta-tags a:hover {
  color: #FFF;
}
.card1 .meta-tags .tag {
  background: #DD1B16;
  color: #f9c7c6;
}
.card1 .meta-tags a:last-child {
  margin-right: 0;
  border-bottom-right-radius: 5px;
}
.card1 .meta-tags a:first-child {
  border-top-left-radius: 5px;
}
.card1 .meta-tags a {
  display: inline-block;
  padding: 3px 8px;
  color: #FFF;
  -webkit-transition: .3s ease all;
  transition: .3s ease all;
}
</style>
