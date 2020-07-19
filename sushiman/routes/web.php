<?php

use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

*/
//client gestion des vues
Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/about', 'ClientController@about');
Route::get('/mentions', 'ClientController@mentions');
Route::get('/conditions', 'ClientController@conditions');

//Client Page detail pour un produit
Route::get('/single_product/{id}', 'SingleProductController@single_product');
Route::patch('/single_product/{id}', 'SingleProductController@single_product');
Route::get('/ajouter_au_panierSingleProduct/{id}/{qty?}', 'SingleProductController@ajouter_au_panierSingleProduct');
Route::get('/ajouter_au_panierMultipleProducts/{id}/{qty?}', 'SingleProductController@ajouter_au_panierMultipleProducts');
//?{accompagnement1}&{accompagnement2}
Route::post('/modifierQtySingleProduct', 'ProduitController@modifierQtySingleProduct');

//Client gestion produit
Route::get('/select_by_cat/{nom_produit}', 'ProduitController@select_by_cat');

//Client gestion panier
Route::get('/ajouter_au_panier/{id}', 'ProduitController@ajouter_au_panier');
Route::get('/ajouter_au_panierPageCarte/{id}', 'ProduitController@ajouter_au_panierPageCarte');
Route::get('/ajouter_au_panierPagePanier/{id}', 'ProduitController@ajouter_au_panierPagePanier');
Route::get('/panier', 'ProduitController@panier');
Route::post('/modifierQty', 'ProduitController@modifierQty');
Route::get('/enlever_item/{id}', 'ProduitController@enlever_item');

//page contact
Route::get('/contact', 'ContactController@view');
Route::post('/contact', [
    'as' => 'contact_path',
    'uses' => 'ContactController@store' 
    ]);

    // Route::get('/test-email', function(){
    //     return new ContactMessageCreated('Yamina','yumy@gmail.com','Un nouveau sujet','un contenu de texte');
    //});
//Route::post('/contact', 'ContactController@storeConsent');


//paiement
Route::get('/paiement', 'ProduitController@paiement');
Route::post('/payer', 'ProduitController@payer' );

//ADMIN
// Auth::routes(['register' => false]);
 Auth::routes();

Route::get('/admin_login', 'AdminController@index');
 
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('/login/admin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function() {
    Route::resource('roles','RoleController');
    Route::resource('utilisateurs','UserController');  
    Route::get('/signout', 'Auth\LoginController@logout');  
    Route::get('/', 'AdminController@admin');

//Admin commandes
Route::get('/commandes', 'ProduitController@commandes');
Route::get('/voir_pdf/{id}', 'PdfController@voir_pdf');




//Admin afficher element
Route::get('/categories', 'AdminController@categories');
Route::get('/sous_categories', 'AdminController@sous_categories');
Route::get('/produits', 'AdminController@produits');
Route::get('/sliders', 'AdminController@sliders');
Route::get('/commandes', 'AdminController@commandes');
Route::get('/allergenes', 'AdminController@allergenes');

//Admin ajouter element
Route::get('/ajoutercategorie', 'AdminController@ajoutercategorie');
Route::get('/ajouterproduit', 'AdminController@ajouterproduit');
Route::get('/ajouterslider', 'AdminController@ajouterslider');
Route::get('/ajouterallergene', 'AdminController@ajouterallergene');

//admin gestion allergene
Route::post('/sauver_allergene', 'AllergeneController@sauver_allergene');
Route::get('/edit_allergene/{id}', 'AllergeneController@edit_allergene');
Route::post('/modifier_allergene', 'AllergeneController@modifier_allergene');
Route::get('/supprimer_allergene/{id}', 'AllergeneController@supprimer_allergene');

 //admin gestion catégorie
Route::post('/sauver_category', 'CategoryController@sauver_category');
Route::get('/edit_categorie/{id}', 'CategoryController@edit_categorie');
Route::post('/modifier_categorie', 'CategoryController@modifier_categorie');
Route::get('/supprimer_categorie/{id}', 'CategoryController@supprimer_categorie');

//admin gestion produit
Route::post('/sauver_produit', 'ProduitController@sauver_produit');
Route::get('/activer_produit/{id}', 'ProduitController@activer_produit');
Route::get('/desactiver_produit/{id}', 'ProduitController@desactiver_produit');
Route::get('/edit_produit/{id}', 'ProduitController@edit_produit');
Route::post('/modifier_produit', 'ProduitController@modifier_produit');
Route::get('/supprimer_produit/{id}', 'ProduitController@supprimer_produit');

//admin gestion slider
Route::post('/sauver_slider', 'SliderController@sauver_slider');
Route::get('/desactiver_slider/{id}', 'SliderController@desactiver_slider');
Route::get('/activer_slider/{id}', 'SliderController@activer_slider');
Route::get('/edit_slider/{id}', 'SliderController@edit_slider');
Route::post('/modifier_slider', 'SliderController@modifier_slider');
Route::get('/supprimer_slider/{id}', 'SliderController@supprimer_slider');



    

});