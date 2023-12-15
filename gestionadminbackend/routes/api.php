<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\SousFamilleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\ArtCaractController;
use App\Http\Controllers\ComplimantaireController;
use App\Http\Controllers\SimilaireController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\ConnecteClientController;



use App\Http\Controllers\AuthController;

Route::middleware('api')->group(function () { Route::resource('art-caracts', ArtCaractController::class); });



Route::group([
'middleware' => 'api',
'prefix' => 'auth'
], function ($router) {
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    Route::middleware('api')->group(function () {
        Route::resource('categories', CategorieController::class);
        Route::resource('familles', FamilleController::class);
        Route::resource('sous_familles', SousFamilleController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('modeles', ModeleController::class);
        Route::resource('caracteristiques', CaracteristiqueController::class);
        Route::resource('art_caracts', ArtCaractController::class);
        Route::get('/caractsbyart/{id_art}', [ArticleController::class,'getCaractsByArt']);
        Route::resource('complimantaires', ComplimantaireController::class);
        Route::resource('similaires', SimilaireController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('commandes', CommandeController::class);
        Route::resource('ligne_commandes', LigneCommandeController::class);
        Route::get('/lignecmd/{idcom}',[LigneCommandeController::class,'showArtticleByCommande']);
        Route::get('/ligneart/{idart}',[LigneCommandeController::class,'showArtCommandeByArticle']);
        Route::get('/cl/{idclient}',[ClientController::class,'showClient']);
        Route::get('/com/{idclient}',[CommandeController::class,'showCommandeByClient']);
        Route::get('/caracta/{idart}',[ArtCaractController::class,'showCaractByArt']);
        Route::get('/lignec/{idcom}',[LigneCommandeController::class,'showLigneCByCommande']);
        Route::get('/lignemod/{idmod}',[CaracteristiqueController::class,'showLigneCaractByModel']);



});
