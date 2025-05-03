
<section class="subscribe no-padding">
    <div class="container">
      <div class="row">
          <div class="col-lg-4">
            <div class="subscribe-call-to-acton">
                <h3>Appeler nous!</h3>
                <h4>(+226) 25-36-90-47</h4>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-8">
            <div class="ts-newsletter row align-items-center">
                <div class="col-md-5 newsletter-introtext">
                  <h4 class="text-white mb-0">Newsletter</h4>
                  <p class="text-white">Dernières mise à jour & Actualités</p>
                </div>

                <div class="col-md-7 newsletter-form">
                  <form action="{{ route('labo.front.newsletters.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="newsletter-email" class="content-hidden">Email</label>
                        <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Entrer votre email" autocomplete="true">
                      </div>
                  </form>
                </div>
            </div><!-- Newsletter end -->
          </div><!-- Col end -->

      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section>
  <!--/ subscribe end -->
<!--/ News end -->
<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-3 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">A Propos</h3>
            <p><a href="{{ route('labo.front.histoire.index') }}"> {!! Str::limit(strip_tags('Créé en 2003, le Laboratoire Citoyennetés (LC) est une association de droit burkinabè à
                vocation régionale (Afrique de l’Ouest). Il est né dans un contexte où les modes de
                gouvernance et les citoyennetés sont à deux vitesses. D\'un côté, une gouvernance et une
                citoyenneté formelles qui proposent des cadres rationalisés, peu en accord avec les réalités
                du milieu et de l\'autre des modes de gouvernance et des citoyennetés ancrées dans le
                quotidien des populations qui se saisissent tant bien que mal des multiples références qui
                les entourent (Etat, tradition, marché, développement, etc.). <br><br>

                Nous voyons dans cette situation une grande partie des difficultés de construction d\'un Etat
                post colonial apaisé, développé et démocratique.

                Dans le même temps, les processus de décentralisation ont suscité beaucoup d\'espoir d\'une
                meilleure articulation de ces modes de gouvernance et de citoyennetés. Cependant, si les
                dispositifs sont en place, il y a encore un travail important de facilitation et de mise en
                dialogue pour que les changements s\'opèrent dans les façons de voir, de penser et d\'agir et
                que la décentralisation ne soit pas l\'occasion de reproduire à l\'échelle locale les
                difficultés de l\'échelle nationale.

                Conscients de cette situation, des acteurs du monde politique, de la recherche et du
                développement ont décidé de s\'associer pour engager la réflexion, interpeller les décideurs
                et appuyer les collectivités territoriales dans leur rôle de régulation sociale et de
                construction politique de la cité. <br><br>

                Ainsi est née en avril 2003, l\'Association construisons ensemble - Recherche sur les
                citoyennetés en transformation (ACE-RECIT). Depuis l\'Assemblée générale de mars 2005,
                l\'association a pris le nom de Laboratoire Citoyennetés (LC). Le LC a décidé de se donner
                comme finalité la contribution à l\'instauration d\'une gouvernance qui réconcilie les
                citoyen(ne)s et les gouvernants à partir du local.

                C\'est une visée à la fois politique (nouvelle façon de gouverner et de gérer les affaires
                publiques) et culturelle (nouvelles identités, nouvelles références) axée sur les
                populations, les décideurs et les gouvernants, les agents et les opérateurs qui mettent en
                œuvre les politiques et les influencent. Nous concevons cette visée de façon engagée, par
                notre statut d\'association indépendante, et rigoureuse par notre assise scientifique et
                académique.'),200, '(...)') !!} </a></p>
            <div class="footer-social">
                <p>Suivez nous sur: </p>
              <ul>
                <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Nos Bureaux</h3>
            <div class="working-hours">
              <p>Burkina-Faso</p>
              <ul>
                <li class="d-flex justify-content-between">
                    06 BP 9037 Ouaga 06
                </li>
                <li class="d-flex justify-content-between">
                    +226 25 36 90 47
                </li>
                <li class="d-flex justify-content-between">
                    burkina@laboratoire-citoyennetes.org
                </li>
              </ul>
            </div>
            <div class="working-hours">
                <p>Bénin</p>
                <ul>
                  <li class="d-flex justify-content-between">
                    04 BP 867 Cotonou 04
                  </li>
                  <li class="d-flex justify-content-between">
                    +229 21 30 65 78
                  </li>
                  <li class="d-flex justify-content-between">
                    benin@laboratoire-citoyennetes.org
                  </li>
                </ul>
              </div>
              <div class="working-hours">
                <p>Niger</p>
                <ul>
                  <li class="d-flex justify-content-between">
                    BP 18909 Niamey CNTP
                  </li>
                  <li class="d-flex justify-content-between">
                    +227 20 35 12 93
                  </li>
                  <li class="d-flex justify-content-between">
                    niger@laboratoire-citoyennetes.org
                  </li>
                </ul>
              </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Programmes</h3>
            <div class="working-hours">
                <p>Burkina-Faso</p>
                <ul>
                  <li class="d-flex justify-content-between">
                    APC
                  </li>
                  <li class="d-flex justify-content-between">
                    DEPAC-2
                  </li>
                  <li class="d-flex justify-content-between">
                    PReSS
                  </li>
                  <li class="d-flex justify-content-between">
                    AGECol
                  </li>
                  <li class="d-flex justify-content-between">
                    PAFICOM
                  </li>
                  <li class="d-flex justify-content-between">
                    Projet SOLIDAR
                  </li>
                </ul>
              </div>
            <div class="working-hours">
                <p>Bénin</p>
                <ul>
                  <li class="d-flex justify-content-between">
                    PACT
                  </li>
                </ul>
            </div>
            <div class="working-hours">
                <p>Niger</p>
                <ul>
                  <li class="d-flex justify-content-between">
                    Programme redévabilité Bénin Projet « Société civile,
                    participation communautaire et coproduction de la sécurité
                  </li>
                </ul>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Liens Utiles</h3>
            <ul class="list-arrow">
              <li><a href="https://www.eda.admin.ch/countries/burkina-faso/fr/home.html" target="_blank">Cooperation Suisse</a></li>
              <li><a href="https://european-union.europa.eu/index_fr" target="_blank">Union Européenne</a></li>
              <li><a href="https://www.unicef.org/fr" target="_blank">Unicef</a></li>
              <li><a href="https://www.banquemondiale.org/fr/home" target="_blank">Banque Mondiale</a></li>
              <li><a href="https://unhabitat.org/" target="_blank">UN-Habitat</a></li>
            </ul>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="copyright-info text-center">
              <span>Copyright &copy; <a href="{{ route('labo.back.index') }}" target="_blank">Labo-Citoyennetés</a>.</strong>
                2017-<script>document.write(new Date().getFullYear());</script>, Designé &amp; Développé par <a href="#">GrapeIT</a></span>
            </div>
          </div>
         {{--  <div class="col-md-12">
            <div class="copyright-info text-center">
              <span>Distributed by <a href="https://themewagon.com/">Themewagon</a></span>
            </div>
          </div> --}}

         {{--  <div class="col-md-12">
            <div class="footer-menu text-center">
              <ul class="list-unstyled mb-0">
                <li><a href="about.html">About</a></li>
                <li><a href="team.html">Our people</a></li>
                <li><a href="faq.html">Faq</a></li>
                <li><a href="news-left-sidebar.html">Blog</a></li>
                <li><a href="pricing.html">Pricing</a></li>
              </ul>
            </div>
          </div> --}}
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->
