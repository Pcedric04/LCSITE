<?php

use App\Models\flashinfos;
use App\Models\posts;
use App\Models\slides;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\usersController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $message = flashinfos::where('status', 'En ligne')->orderByDesc('id')->get();
                $posts = DB::table('posts')
                ->join('categories', 'categories.id', '=', 'posts.categories_id')
                ->join('souscategories', 'souscategories.id', '=', 'posts.souscategories_id')
                ->join('users', 'users.id', '=', 'posts.users_id')
                ->where('posts.status', '=', 'En ligne')
                ->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    'posts.contenus',
                    'posts.status',
                    'posts.visits',
                    'categories.name',
                    'souscategories.name as Sname',
                    DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
                    'users.nickname'
                )
                ->paginate(3);
                $agendas = DB::table('agendas')->where('status','En ligne')->orderByDesc('id')->paginate(3);
                $postsall = posts::orderByDesc('id')->where('status', '=', 'En ligne');
                $postsall1 = DB::table('posts')->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
                )
                ->paginate(3);
    $slides = slides::orderByDesc('id')->where('status', '=', 'En ligne')->paginate(3);

    return view('welcome', compact('message', 'posts', 'postsall','postsall1','agendas','slides'));
})->name('labo.index');

        Route::get('/search', [App\Http\Controllers\Front\searchController::class, 'index'])->name('labo.front.search.index');
        //Route::get('/actualités/toutes les actualités/{id}/plus', [App\Http\Controllers\Front\socialShareButtonsController::class,'ShareWidget'])->name('labo.front.actualites.details');
        Route::get('/association/mot-de-bienvenue', [App\Http\Controllers\Front\accueilController::class, 'MotBienvenuIndex'])->name('labo.front.mot.index');
        Route::get('/association/historiques', [App\Http\Controllers\Front\accueilController::class, 'HistoriqueIndex'])->name('labo.front.histoire.index');
        Route::get('/association/dynamiques', [App\Http\Controllers\Front\accueilController::class, 'DynamiqueIndex'])->name('labo.front.dynamique.index');
        Route::get('/association/organigramme', [App\Http\Controllers\Front\accueilController::class, 'OrganigrammeIndex'])->name('labo.front.organigramme.index');
        Route::get('/association/conseil-d\'administration', [App\Http\Controllers\Front\accueilController::class, 'ConseilIndex'])->name('labo.front.conseil.index');

        Route::get('/cellules/axe-recherche-capitalisation', [App\Http\Controllers\Front\accueilController::class, 'AxeRecherche'])->name('labo.front.axerecherche.index');
        Route::get('/cellules/axe-facilitation-influence', [App\Http\Controllers\Front\accueilController::class, 'AxeFacilitation'])->name('labo.front.axefacilitation.index');
        Route::get('/cellules/axe-suivi', [App\Http\Controllers\Front\accueilController::class, 'AxeSuivi'])->name('labo.front.axesuivi.index');

        Route::get('/zones/intervention/burkina-faso', [App\Http\Controllers\Front\zonesController::class, 'ZoneBurkina'])->name('labo.front.zone.burkina.index');
        Route::get('/zones/intervention/benin', [App\Http\Controllers\Front\zonesController::class, 'ZoneBenin'])->name('labo.front.zone.benin.index');
        Route::get('/zones/intervention/niger', [App\Http\Controllers\Front\zonesController::class, 'ZoneNiger'])->name('labo.front.zone.niger.index');
        Route::get('/centre-de-ressources', [App\Http\Controllers\Front\accueilController::class, 'Ressources'])->name('labo.front.centre.ressources.index');

        Route::get('/programmes/decentralisation-democratie-participation', [App\Http\Controllers\Front\projetsController::class, 'ddlpIndex'])->name('labo.front.decentralise.index');
        Route::get('/programmes/egouvernance-multimedia', [App\Http\Controllers\Front\projetsController::class, 'EgouvernanceIndex'])->name('labo.front.egouvernance.index');
        Route::get('/programmes/gouvernance-économique', [App\Http\Controllers\Front\projetsController::class, 'EgouvernanceEcoIndex'])->name('labo.front.egouvernanceEco.index');
        Route::get('/programmes/securite', [App\Http\Controllers\Front\projetsController::class, 'SecuriteIndex'])->name('labo.front.securite.index');
        Route::get('/programmes/transfrontalier-migration', [App\Http\Controllers\Front\projetsController::class, 'TransfontalierIndex'])->name('labo.front.transfontalier.index');

        Route::get('/plaidoyer-politique', [App\Http\Controllers\Front\accueilController::class, 'PlaidoyerIndex'])->name('labo.front.plaidoyer.index');
        Route::get('/publication', [App\Http\Controllers\Front\publicationsController::class, 'PublicationIndex'])->name('labo.front.publications.index');
        Route::get('/appels-d\'offres', [App\Http\Controllers\Front\accueilController::class, 'OffreIndex'])->name('labo.front.offre.index');
        Route::get('/emplois-stages', [App\Http\Controllers\Front\accueilController::class, 'StageIndex'])->name('labo.front.stage.index');

        Route::get('/recherches/etudes/capitalisation', [App\Http\Controllers\Front\capitalisationsController::class, 'index'])->name('labo.front.capitalisation.index');
        Route::get('/recherches/etudes/gouvernance-citoyennetés', [App\Http\Controllers\Front\gouvernancesController::class, 'index'])->name('labo.front.citoyennete.index');
        Route::get('/recherches/etudes/études-recit', [App\Http\Controllers\Front\etudesController::class, 'index'])->name('labo.front.etude.index');
        Route::get('/recherches/etudes/fiches-outils', [App\Http\Controllers\Front\fichesController::class, 'index'])->name('labo.front.outil.index');

        Route::get('/actualites/toutes-les-actualites', [App\Http\Controllers\Front\postsController::class, 'index'])->name('labo.front.actualites.all');
        Route::get('/actualites/categories/sous-categories/{id}/plus', [App\Http\Controllers\Front\postsController::class, 'souscatActu'])->name('labo.front.actualites.souscat');
        Route::get('/actualites/toutes-les-actualites/{id}/plus', [App\Http\Controllers\Front\postsController::class, 'details'])->name('labo.front.actualites.details');

        Route::get('/mediatheque/video', [App\Http\Controllers\Front\videosController::class, 'index'])->name('labo.front.videos.index');
        Route::get('/mediatheque/video/{id}/plus', [App\Http\Controllers\Front\videosController::class, 'details'])->name('labo.front.videos.details');
        Route::get('/mediatheque/audio', [App\Http\Controllers\Front\audiosController::class, 'index'])->name('labo.front.audios.index');
        Route::get('/mediatheque/audios/{id}/plus', [App\Http\Controllers\Front\audiosController::class, 'details'])->name('labo.front.audios.details');
        Route::get('/mediatheque/album', [App\Http\Controllers\Front\photosController::class, 'index'])->name('labo.front.albums.index');
        Route::get('/mediatheque/album/{id}/plus', [App\Http\Controllers\Front\photosController::class, 'details'])->name('labo.front.albums.details');

        Route::get('/contact', [App\Http\Controllers\Front\accueilController::class, 'contact'])->name('labo.front.contact.index');

        Route::post('/comments/{id}', [App\Http\Controllers\Front\commentController::class, 'store'])->name('labo.comment.store');
        Route::get('/agenda', [App\Http\Controllers\Front\agendaController::class, 'index'])->name('labo.front.agendas.index');
        Route::post('/newletters', [App\Http\Controllers\Front\newlettersControllers::class, 'store'])->name('labo.front.newsletters.store');

        Route::post('/like-post/{id}', [App\Http\Controllers\Front\postsController::class, 'likePost'])->name('labo.like.post');
        Route::post('/unlike-post/{id}', [App\Http\Controllers\Front\postsController::class, 'unlikePost'])->name('labo.unlike.post');



        // Route pour afficher le formulaire de connexion
        Route::get('/auth/login', [LoginController::class, 'index'])->name('home');

        // Route pour traiter la connexion (POST)
        Route::post('/auth/login/verify', [LoginController::class, 'login'])->name('labo.users.login');



// Afficher le formulaire d'inscription
Route::get('/user/register', [usersController::class, 'register'])->name('labo.front.users.register');

// Traiter les données du formulaire d'inscription
Route::post('/user/register', [usersController::class, 'store'])->name('labo.front.users.store');

        // Route pour déconnexion
        Route::get('/user/logout', [usersController::class, 'logout'])->name('labo.front.users.logout');

        // Route pour la politique de confidentialité
        Route::get('/user/privacy-policy', [usersController::class, 'cookies'])->name('labo.front.users.cookies');

        // Route pour le profil utilisateur, protégée par middleware 'auth'
        Route::get('/user/profil', [usersController::class, 'profil'])
            ->name('labo.front.users.profil')
            ->middleware('auth'); // Middleware pour s'assurer que seul un utilisateur connecté puisse y accéder

// Route de fallback en cas d'URL non trouvée
Route::fallback(function () {
    return view('frontoffice.body.404.error');
});

// Si tu as besoin de gérer les routes d'authentification, active-les comme ceci :
Auth::routes([
    'register' => false, // Désactive l'inscription via Auth::routes si tu veux uniquement utiliser tes routes personnalisées
]);





Route::middleware('auth:moodle')->group(function () {
    Route::get('/login/moodle', [App\Http\Controllers\Front\MoodleController::class, 'login'])->name('login.moodle');
});

Route::group(
    ['middleware' => ['auth']],
    function () {

        /**Route pour le tableau de bord */
        Route::get('/administration/accueil', [App\Http\Controllers\Back\dashboardController::class, 'index'])->name('labo.back.index');
        Route::get('/disconnect', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('labo.users.logout');

        /**Route pour les flashs infos */
        Route::get('/administration/messages-flash', [App\Http\Controllers\Back\flashsController::class, 'index'])->name('labo.back.infos.index');
        Route::get('/administration/messages-flash/datatables', [App\Http\Controllers\Back\flashsController::class, 'datatables'])->name('labo.back.infos.datatables');
        Route::get('/administration/messages-flash/create', [App\Http\Controllers\Back\flashsController::class, 'create'])->name('labo.back.infos.create');
        Route::post('/administration/messages-flash/store', [App\Http\Controllers\Back\flashsController::class, 'store'])->name('labo.back.infos.store');
        Route::get('/administration/messages-flash/{id}/show', [App\Http\Controllers\Back\flashsController::class, 'show'])->name('labo.back.infos.show');
        Route::post('/administration/messages-flash/{id}/update', [App\Http\Controllers\Back\flashsController::class, 'update'])->name('labo.back.infos.update');
        Route::delete('/administration/messages-flash/{id}/delete', [App\Http\Controllers\Back\flashsController::class, 'delete'])->name('labo.back.infos.delete');
        Route::get('/administration/messages-flash/{id}/status', [App\Http\Controllers\Back\flashsController::class, 'status'])->name('labo.back.infos.status');

        /**Route pour les flashs infos */
        Route::get('/administration/slides', [App\Http\Controllers\Back\slidesController::class, 'index'])->name('labo.back.slides.index');
        Route::get('/administration/slides/datatables', [App\Http\Controllers\Back\slidesController::class, 'datatables'])->name('labo.back.slides.datatables');
        Route::get('/administration/slides/create', [App\Http\Controllers\Back\slidesController::class, 'create'])->name('labo.back.slides.create');
        Route::post('/administration/slides/store', [App\Http\Controllers\Back\slidesController::class, 'store'])->name('labo.back.slides.store');
        Route::get('/administration/slides/{id}/show', [App\Http\Controllers\Back\slidesController::class, 'show'])->name('labo.back.slides.show');
        Route::post('/administration/slides/{id}/update', [App\Http\Controllers\Back\slidesController::class, 'update'])->name('labo.back.slides.update');
        Route::delete('/administration/slides/{id}/delete', [App\Http\Controllers\Back\slidesController::class, 'delete'])->name('labo.back.slides.delete');
        Route::get('/administration/slides/{id}/status', [App\Http\Controllers\Back\slidesController::class, 'status'])->name('labo.back.slides.status');


        /**Route pour les categories */
        Route::get('/administration/categories', [App\Http\Controllers\Back\categoriesController::class, 'index'])->name('labo.back.categories.index');
        Route::get('/administration/categories/datatables', [App\Http\Controllers\Back\categoriesController::class, 'datatables'])->name('labo.back.categories.datatables');
        Route::get('/administration/categories/create', [App\Http\Controllers\Back\categoriesController::class, 'create'])->name('labo.back.categories.create');
        Route::post('/administration/categories/store', [App\Http\Controllers\Back\categoriesController::class, 'store'])->name('labo.back.categories.store');
        Route::get('/administration/categories/{id}/show', [App\Http\Controllers\Back\categoriesController::class, 'show'])->name('labo.back.categories.show');
        Route::post('/administration/categories/{id}/update', [App\Http\Controllers\Back\categoriesController::class, 'update'])->name('labo.back.categories.update');
        Route::delete('/administration/categories/{id}/delete', [App\Http\Controllers\Back\categoriesController::class, 'delete'])->name('labo.back.categories.delete');
        Route::get('/administration/categories/{id}/status', [App\Http\Controllers\Back\categoriesController::class, 'status'])->name('labo.back.categories.status');

        /**Route pour les sous-categories */
        Route::get('/administration/sous-categories', [App\Http\Controllers\Back\souscategoriesController::class, 'index'])->name('labo.back.souscategories.index');
        Route::get('/administration/sous-categories/datatables', [App\Http\Controllers\Back\souscategoriesController::class, 'datatables'])->name('labo.back.souscategories.datatables');
        Route::get('/administration/sous-categories-create', [App\Http\Controllers\Back\souscategoriesController::class, 'create'])->name('labo.back.souscategories.create');
        Route::post('/administration/sous-categories-store', [App\Http\Controllers\Back\souscategoriesController::class, 'store'])->name('labo.back.souscategories.store');
        Route::get('/administration/sous-categories/{id}/show', [App\Http\Controllers\Back\souscategoriesController::class, 'show'])->name('labo.back.souscategories.show');
        Route::post('/administration/sous-categories/{id}/update', [App\Http\Controllers\Back\souscategoriesController::class, 'update'])->name('labo.back.souscategories.update');
        Route::delete('/administration/sous-categories/{id}/delete', [App\Http\Controllers\Back\souscategoriesController::class, 'delete'])->name('labo.back.souscategories.delete');
        Route::get('/administration/sous-categories/{id}/status', [App\Http\Controllers\Back\souscategoriesController::class, 'status'])->name('labo.back.souscategories.status');

        /**Route pour les articles */
        Route::get('/administration/actualites', [App\Http\Controllers\Back\postsController::class, 'index'])->name('labo.back.actualites.index');
        Route::get('/administration/actualites/datatables', [App\Http\Controllers\Back\postsController::class, 'datatables'])->name('labo.back.actualites.datatables');

        Route::get('/administration/actualites/restore/index', [App\Http\Controllers\Back\postsController::class, 'restoreindex'])->name('labo.back.actualites.restore.index');

        Route::get('/administration/actualites/restore/datatables', [App\Http\Controllers\Back\postsController::class, 'restoredatatables'])->name('labo.back.actualites.restore.datatables');
        Route::get('/administration/actualites/{id}/restore/delete', [App\Http\Controllers\Back\postsController::class, 'restore'])->name('labo.back.actualites.restore');
        Route::delete('/administration/actualites/{id}/force/delete', [App\Http\Controllers\Back\postsController::class, 'forcedelete'])->name('labo.back.actualites.force');

        Route::get('/administration/actualites/create', [App\Http\Controllers\Back\postsController::class, 'create'])->name('labo.back.actualites.create');
        Route::post('/administration/actualites/store', [App\Http\Controllers\Back\postsController::class, 'store'])->name('labo.back.actualites.store');
        Route::get('/administration/actualites/{id}/show', [App\Http\Controllers\Back\postsController::class, 'show'])->name('labo.back.actualites.show');
        Route::post('/administration/actualites/{id}/update', [App\Http\Controllers\Back\postsController::class, 'update'])->name('labo.back.actualites.update');
        Route::delete('/administration/actualites/{id}/delete', [App\Http\Controllers\Back\postsController::class, 'delete'])->name('labo.back.actualites.delete');
        Route::get('/administration/actualites/{id}/status', [App\Http\Controllers\Back\postsController::class, 'status'])->name('labo.back.actualites.status');
        Route::get('/administration/actualites/{id}/sous-categories', [App\Http\Controllers\Back\postsController::class, 'random_souscategories'])->name('labo.back.actualites.souscategories');

        /**Route pour les comments */
        Route::get('/administration/commentaires', [App\Http\Controllers\Back\commentController::class, 'index'])->name('labo.back.comments.index');
        Route::get('/administration/commentaires/datatables', [App\Http\Controllers\Back\commentController::class, 'datatables'])->name('labo.back.comments.datatables');
        Route::get('/administration/commentaires/create', [App\Http\Controllers\Back\commentController::class, 'create'])->name('labo.back.comments.create');
        Route::post('/administration/commentaires/store', [App\Http\Controllers\Back\commentController::class, 'store'])->name('labo.back.comments.store');
        Route::get('/administration/commentaires/{id}/show', [App\Http\Controllers\Back\commentController::class, 'show'])->name('labo.back.comments.show');
        Route::post('/administration/commentaires/{id}/update', [App\Http\Controllers\Back\commentController::class, 'update'])->name('labo.back.comments.update');
        Route::delete('/administration/commentaires/{id}/delete', [App\Http\Controllers\Back\commentController::class, 'delete'])->name('labo.back.comments.delete');
        Route::get('/administration/commentaires/{id}/status', [App\Http\Controllers\Back\commentController::class, 'status'])->name('labo.back.comments.status');
        Route::get('/administration/commentaires/{id}/sous-categories', [App\Http\Controllers\Back\commentController::class, 'random_souscategories'])->name('labo.back.comments.souscategories');

        /**Route pour les videos */
        Route::get('/administration/videos', [App\Http\Controllers\Back\videosController::class, 'indexVideos'])->name('labo.back.Videos.index');
        Route::get('/administration/videos/datatables', [App\Http\Controllers\Back\videosController::class, 'datatablesVideos'])->name('labo.back.Videos.datatables');
        Route::get('/administration/videos/create', [App\Http\Controllers\Back\videosController::class, 'createVideos'])->name('labo.back.Videos.create');
        Route::post('/administration/videos/store', [App\Http\Controllers\Back\videosController::class, 'storeVideos'])->name('labo.back.Videos.store');
        Route::get('/administration/videos/{id}/show', [App\Http\Controllers\Back\videosController::class, 'showVideos'])->name('labo.back.Videos.show');
        Route::post('/administration/videos/{id}/update', [App\Http\Controllers\Back\videosController::class, 'updateVideos'])->name('labo.back.Videos.update');
        Route::delete('/administration/videos/{id}/delete', [App\Http\Controllers\Back\videosController::class, 'deleteVideos'])->name('labo.back.Videos.delete');
        Route::get('/administration/videos/{id}/status', [App\Http\Controllers\Back\videosController::class, 'statusVideos'])->name('labo.back.Videos.status');
        Route::get('/administration/videos/{id}/sous-categories', [App\Http\Controllers\Back\videosController::class, 'random_souscategories'])->name('labo.back.Videos.souscategories');

        /**Route pour les albums */
        Route::get('/administration/album', [App\Http\Controllers\Back\albumsController::class, 'indexAlbums'])->name('labo.back.albums.index');
        Route::get('/administration/album/datatables', [App\Http\Controllers\Back\albumsController::class, 'datatables'])->name('labo.back.albums.datatables');
        Route::get('/administration/album/create', [App\Http\Controllers\Back\albumsController::class, 'createAlbums'])->name('labo.back.albums.create');
        Route::post('/administration/album/store', [App\Http\Controllers\Back\albumsController::class, 'storeAlbums'])->name('labo.back.albums.store');
        Route::get('/administration/album/{id}/show', [App\Http\Controllers\Back\albumsController::class, 'showAlbums'])->name('labo.back.albums.show');
        Route::post('/administration/album/{id}/update', [App\Http\Controllers\Back\albumsController::class, 'updateAlbums'])->name('labo.back.albums.update');
        Route::delete('/administration/album/{id}/delete', [App\Http\Controllers\Back\albumsController::class, 'deleteAlbums'])->name('labo.back.albums.delete');
        Route::get('/administration/album/{id}/status', [App\Http\Controllers\Back\albumsController::class, 'statusAlbums'])->name('labo.back.albums.status');
        Route::get('/administration/album/{id}/sous-categories', [App\Http\Controllers\Back\albumsController::class, 'random_souscategories'])->name('labo.back.albums.souscategories');

        /**Route pour les audios */
        Route::get('/administration/audios', [App\Http\Controllers\Back\audiosController::class, 'indexAudios'])->name('labo.back.audios.index');
        Route::get('/administration/audios/datatables', [App\Http\Controllers\Back\audiosController::class, 'datatablesAudios'])->name('labo.back.audios.datatables');
        Route::get('/administration/audios/create', [App\Http\Controllers\Back\audiosController::class, 'createAudios'])->name('labo.back.audios.create');
        Route::post('/administration/audios/store', [App\Http\Controllers\Back\audiosController::class, 'storeAudios'])->name('labo.back.audios.store');
        Route::get('/administration/audios/{id}/show', [App\Http\Controllers\Back\audiosController::class, 'showAudios'])->name('labo.back.audios.show');
        Route::post('/administration/audios/{id}/update', [App\Http\Controllers\Back\audiosController::class, 'updateAudios'])->name('labo.back.audios.update');
        Route::delete('/administration/audios/{id}/delete', [App\Http\Controllers\Back\audiosController::class, 'deleteAudios'])->name('labo.back.audios.delete');
        Route::get('/administration/audios/{id}/status', [App\Http\Controllers\Back\audiosController::class, 'statusAudios'])->name('labo.back.audios.status');
        Route::get('/administration/audios/{id}/sous-categories', [App\Http\Controllers\Back\audiosController::class, 'random_souscategories'])->name('labo.back.audios.souscategories');

        /**Route pour les agendas */
        Route::get('/administration/agendas', [App\Http\Controllers\Back\agendaController::class, 'index'])->name('labo.back.agendas.index');
        Route::get('/administration/agendas/datatables', [App\Http\Controllers\Back\agendaController::class, 'datatables'])->name('labo.back.agendas.datatables');
        Route::get('/administration/agendas/create', [App\Http\Controllers\Back\agendaController::class, 'create'])->name('labo.back.agendas.create');
        Route::post('/administration/agendas/store', [App\Http\Controllers\Back\agendaController::class, 'store'])->name('labo.back.agendas.store');
        Route::get('/administration/agendas/{id}/show', [App\Http\Controllers\Back\agendaController::class, 'show'])->name('labo.back.agendas.show');
        Route::post('/administration/agendas/{id}/update', [App\Http\Controllers\Back\agendaController::class, 'update'])->name('labo.back.agendas.update');
        Route::delete('/administration/agendas/{id}/delete', [App\Http\Controllers\Back\agendaController::class, 'delete'])->name('labo.back.agendas.delete');
        Route::get('/administration/agendas/{id}/status', [App\Http\Controllers\Back\agendaController::class, 'status'])->name('labo.back.agendas.status');

        /**Route pour les capitalisations */
        Route::get('/administration/rapports-capitalisations', [App\Http\Controllers\Back\capitalisationsController::class, 'index'])->name('labo.back.capitalisations.index');
        Route::get('/administration/rapports-capitalisations/datatables', [App\Http\Controllers\Back\capitalisationsController::class, 'datatables'])->name('labo.back.capitalisations.datatables');
        Route::get('/administration/rapports-capitalisations/create', [App\Http\Controllers\Back\capitalisationsController::class, 'create'])->name('labo.back.capitalisations.create');
        Route::post('/administration/rapports-capitalisations/store', [App\Http\Controllers\Back\capitalisationsController::class, 'store'])->name('labo.back.capitalisations.store');
        Route::get('/administration/rapports-capitalisations/{id}/show', [App\Http\Controllers\Back\capitalisationsController::class, 'show'])->name('labo.back.capitalisations.show');
        Route::post('/administration/rapports-capitalisations/{id}/update', [App\Http\Controllers\Back\capitalisationsController::class, 'update'])->name('labo.back.capitalisations.update');
        Route::delete('/administration/rapports-capitalisations/{id}/delete', [App\Http\Controllers\Back\capitalisationsController::class, 'delete'])->name('labo.back.capitalisations.delete');
        Route::get('/administration/rapports-capitalisations/{id}/status', [App\Http\Controllers\Back\capitalisationsController::class, 'status'])->name('labo.back.capitalisations.status');
        Route::get('/administration/rapports-capitalisations/{id}/sous-categories', [App\Http\Controllers\Back\capitalisationsController::class, 'random_souscategories'])->name('labo.back.capitalisations.souscategories');

        /**Route pour les gouvernances */
        Route::get('/administration/rapports-gouvernances', [App\Http\Controllers\Back\gouvernancesController::class, 'index'])->name('labo.back.gouvernances.index');
        Route::get('/administration/rapports-gouvernances/datatables', [App\Http\Controllers\Back\gouvernancesController::class, 'datatables'])->name('labo.back.gouvernances.datatables');
        Route::get('/administration/rapports-gouvernances/create', [App\Http\Controllers\Back\gouvernancesController::class, 'create'])->name('labo.back.gouvernances.create');
        Route::post('/administration/rapports-gouvernances/store', [App\Http\Controllers\Back\gouvernancesController::class, 'store'])->name('labo.back.gouvernances.store');
        Route::get('/administration/rapports-gouvernances/{id}/show', [App\Http\Controllers\Back\gouvernancesController::class, 'show'])->name('labo.back.gouvernances.show');
        Route::post('/administration/rapports-gouvernances/{id}/update', [App\Http\Controllers\Back\gouvernancesController::class, 'update'])->name('labo.back.gouvernances.update');
        Route::delete('/administration/rapports-gouvernances/{id}/delete', [App\Http\Controllers\Back\gouvernancesController::class, 'delete'])->name('labo.back.gouvernances.delete');
        Route::get('/administration/rapports-gouvernances/{id}/status', [App\Http\Controllers\Back\gouvernancesController::class, 'status'])->name('labo.back.gouvernances.status');
        Route::get('/administration/rapports-gouvernances/{id}/sous-categories', [App\Http\Controllers\Back\gouvernancesController::class, 'random_souscategories'])->name('labo.back.gouvernances.souscategories');

        /**Route pour les etudes */
        Route::get('/administration/rapports-etudes-recit', [App\Http\Controllers\Back\etudesController::class, 'index'])->name('labo.back.etudes.index');
        Route::get('/administration/rapports-etudes-recit/datatables', [App\Http\Controllers\Back\etudesController::class, 'datatables'])->name('labo.back.etudes.datatables');
        Route::get('/administration/rapports-etudes-recit/create', [App\Http\Controllers\Back\etudesController::class, 'create'])->name('labo.back.etudes.create');
        Route::post('/administration/rapports-etudes-recit/store', [App\Http\Controllers\Back\etudesController::class, 'store'])->name('labo.back.etudes.store');
        Route::get('/administration/rapports-etudes-recit/{id}/show', [App\Http\Controllers\Back\etudesController::class, 'show'])->name('labo.back.etudes.show');
        Route::post('/administration/rapports-etudes-recit/{id}/update', [App\Http\Controllers\Back\etudesController::class, 'update'])->name('labo.back.etudes.update');
        Route::delete('/administration/rapports-etudes-recit/{id}/delete', [App\Http\Controllers\Back\etudesController::class, 'delete'])->name('labo.back.etudes.delete');
        Route::get('/administration/rapports-etudes-recit/{id}/status', [App\Http\Controllers\Back\etudesController::class, 'status'])->name('labo.back.etudes.status');
        Route::get('/administration/rapports-etudes-recit/{id}/sous-categories', [App\Http\Controllers\Back\etudesController::class, 'random_souscategories'])->name('labo.back.etudes.souscategories');

        /**Route pour les fiches */
        Route::get('/administration/rapports-fiches-outils', [App\Http\Controllers\Back\fichesController::class, 'index'])->name('labo.back.fiches.index');
        Route::get('/administration/rapports-fiches-outils/datatables', [App\Http\Controllers\Back\fichesController::class, 'datatables'])->name('labo.back.fiches.datatables');
        Route::get('/administration/rapports-fiches-outils/create', [App\Http\Controllers\Back\fichesController::class, 'create'])->name('labo.back.fiches.create');
        Route::post('/administration/rapports-fiches-outils/store', [App\Http\Controllers\Back\fichesController::class, 'store'])->name('labo.back.fiches.store');
        Route::get('/administration/rapports-fiches-outils/{id}/show', [App\Http\Controllers\Back\fichesController::class, 'show'])->name('labo.back.fiches.show');
        Route::post('/administration/rapports-fiches-outils/{id}/update', [App\Http\Controllers\Back\fichesController::class, 'update'])->name('labo.back.fiches.update');
        Route::delete('/administration/rapports-fiches-outils/{id}/delete', [App\Http\Controllers\Back\fichesController::class, 'delete'])->name('labo.back.fiches.delete');
        Route::get('/administration/rapports-fiches-outils/{id}/status', [App\Http\Controllers\Back\fichesController::class, 'status'])->name('labo.back.fiches.status');
        Route::get('/administration/rapports-fiches-outils/{id}/sous-categories', [App\Http\Controllers\Back\fichesController::class, 'random_souscategories'])->name('labo.back.fiches.souscategories');

        /**Route pour les projets */
        Route::get('/administration/projets', [App\Http\Controllers\Back\projetsController::class, 'index'])->name('labo.back.projets.index');
        Route::get('/administration/projets/datatables', [App\Http\Controllers\Back\projetsController::class, 'datatables'])->name('labo.back.projets.datatables');
        Route::get('/administration/projets/create', [App\Http\Controllers\Back\projetsController::class, 'create'])->name('labo.back.projets.create');
        Route::post('/administration/projets/store', [App\Http\Controllers\Back\projetsController::class, 'store'])->name('labo.back.projets.store');
        Route::get('/administration/projets/{id}/show', [App\Http\Controllers\Back\projetsController::class, 'show'])->name('labo.back.projets.show');
        Route::post('/administration/projet/{id}/update', [App\Http\Controllers\Back\projetsController::class, 'update'])->name('labo.back.projets.update');
        Route::delete('/administration/projets/{id}/delete', [App\Http\Controllers\Back\projetsController::class, 'delete'])->name('labo.back.projets.delete');
        Route::get('/administration/projets/{id}/status', [App\Http\Controllers\Back\projetsController::class, 'status'])->name('labo.back.projets.status');
        Route::get('/administration/projets/{id}/provinces', [App\Http\Controllers\Back\projetsController::class, 'random_provinces'])->name('labo.back.projets.regions');

        /**Route pour les publications */
        Route::get('/administration/publications', [App\Http\Controllers\Back\publicationsController::class, 'index'])->name('labo.back.publications.index');
        Route::get('/administration/publications/datatables', [App\Http\Controllers\Back\publicationsController::class, 'datatables'])->name('labo.back.publications.datatables');
        Route::get('/administration/publications/create', [App\Http\Controllers\Back\publicationsController::class, 'create'])->name('labo.back.publications.create');
        Route::post('/administration/publications/store', [App\Http\Controllers\Back\publicationsController::class, 'store'])->name('labo.back.publications.store');
        Route::get('/administration/publications-shows/{id}/show', [App\Http\Controllers\Back\publicationsController::class, 'show'])->name('labo.back.publications.show');
        Route::post('/administration/publications-update/{id}/update', [App\Http\Controllers\Back\publicationsController::class, 'update'])->name('labo.back.publications.update');
        Route::delete('/administration/publications-delete/{id}/delete', [App\Http\Controllers\Back\publicationsController::class, 'delete'])->name('labo.back.publications.delete');
        Route::get('/administration/publications-status/{id}/status', [App\Http\Controllers\Back\publicationsController::class, 'status'])->name('labo.back.publications.status');

        /**Route pour les utilisateurs */
        Route::get('/administration/utilisateurs', [App\Http\Controllers\Back\usersController::class, 'index'])->name('labo.back.users.index');
        Route::get('/administration/utilisateurs/datatables', [App\Http\Controllers\Back\usersController::class, 'datatables'])->name('labo.back.users.datatables');
        Route::get('/administration/utilisateurs/create', [App\Http\Controllers\Back\usersController::class, 'create'])->name('labo.back.users.create');
        Route::post('/administration/utilisateurs/store', [App\Http\Controllers\Back\usersController::class, 'store'])->name('labo.back.users.store');
        Route::get('/administration/utilisateurs/{id}/show', [App\Http\Controllers\Back\usersController::class, 'show'])->name('labo.back.users.show');
        Route::post('/administration/utilisateurs/{id}/update', [App\Http\Controllers\Back\usersController::class, 'update'])->name('labo.back.users.update');
        Route::delete('/administration/utilisateurs/{id}/delete', [App\Http\Controllers\Back\usersController::class, 'delete'])->name('labo.back.users.delete');
        Route::get('/administration/utilisateurs/{id}/status', [App\Http\Controllers\Back\usersController::class, 'status'])->name('labo.back.users.status');

        /**Route pour les roles */
        Route::get('/administration/roles', [App\Http\Controllers\Back\rolesController::class, 'index'])->name('labo.back.roles.index');
        Route::get('/administration/roles/datatables', [App\Http\Controllers\Back\rolesController::class, 'datatables'])->name('labo.back.roles.datatables');
        Route::get('/administration/roles/create', [App\Http\Controllers\Back\rolesController::class, 'create'])->name('labo.back.roles.create');
        Route::post('/administration/roles/store', [App\Http\Controllers\Back\rolesController::class, 'store'])->name('labo.back.roles.store');
        Route::get('/administration/roles/{id}/show', [App\Http\Controllers\Back\rolesController::class, 'show'])->name('labo.back.roles.show');
        Route::post('/administration/roles/{id}/update', [App\Http\Controllers\Back\rolesController::class, 'update'])->name('labo.back.roles.update');
        Route::delete('/administration/roles/{id}/delete', [App\Http\Controllers\Back\rolesController::class, 'delete'])->name('labo.back.roles.delete');
        Route::get('/administration/roles/{id}/status', [App\Http\Controllers\Back\rolesController::class, 'status'])->name('labo.back.roles.status');

        /**Route pour les permissions */
        Route::get('/administration/permissions', [App\Http\Controllers\Back\permissionsController::class, 'index'])->name('labo.back.permissions.index');
        Route::get('/administration/permissions/datatables', [App\Http\Controllers\Back\permissionsController::class, 'datatables'])->name('labo.back.permissions.datatables');
        Route::get('/administration/permissions/create', [App\Http\Controllers\Back\permissionsController::class, 'create'])->name('labo.back.permissions.create');
        Route::post('/administration/permissions/store', [App\Http\Controllers\Back\permissionsController::class, 'store'])->name('labo.back.permissions.store');
        Route::get('/administration/permissions/{id}/show', [App\Http\Controllers\Back\permissionsController::class, 'show'])->name('labo.back.permissions.show');
        Route::post('/administration/permissions/{id}/update', [App\Http\Controllers\Back\permissionsController::class, 'update'])->name('labo.back.permissions.update');
        Route::delete('/administration/permissions/{id}/delete', [App\Http\Controllers\Back\permissionsController::class, 'delete'])->name('labo.back.permissions.delete');
        Route::get('/administration/permissions/{id}/status', [App\Http\Controllers\Back\permissionsController::class, 'status'])->name('labo.back.permissions.status');

          /**Route pour les contact */
        Route::get('/administration/contact', [App\Http\Controllers\Back\contactControllers::class, 'index'])->name('labo.back.contact.index');
        Route::get('/administration/contact/datatables', [App\Http\Controllers\Back\contactControllers::class, 'datatables'])->name('labo.back.contact.datatables');
        Route::post('/administration/contact/store', [App\Http\Controllers\Back\contactControllers::class, 'store'])->name('labo.back.contact.store');
        Route::delete('/administration/contact/{id}/delete', [App\Http\Controllers\Back\contactControllers::class, 'delete'])->name('labo.back.contact.delete');
        Route::get('/administration/contact/{id}/show', [App\Http\Controllers\Back\contactControllers::class, 'show'])->name('labo.back.contact.show');

        /**Route pour les contact */
        Route::get('/administration/profil', [App\Http\Controllers\Back\profilControllers::class, 'index'])->name('labo.back.profil.index');
        Route::get('/administration/profil/{id}/show', [App\Http\Controllers\Back\profilControllers::class, 'show'])->name('labo.back.profil.show');
        Route::post('/administration/profil/{id}/image/update', [App\Http\Controllers\Back\profilControllers::class, 'updateimages'])->name('labo.back.profil.image.update');
        Route::post('/administration/profil/{id}/carnet/update', [App\Http\Controllers\Back\profilControllers::class, 'updatecarnets'])->name('labo.back.profil.carnet.update');
        Route::post('/administration/profil/store', [App\Http\Controllers\Back\profilControllers::class, 'storecarnets'])->name('labo.back.profil.carnet.store');

    });
