<?php

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

Route::get('/', 'PagesController@getIndex');
Route::post('/', 'PagesController@postIndex')->name('post');
Route::get('shop', 'PagesController@getShop');
Route::get('shop/{id}', 'PagesController@getItem')->name('shop');
Route::get('event', 'PagesController@getEvent');
Route::get('news', 'PagesController@getNews');
Route::get('fondatrice', 'PagesController@getFondatrice');
Route::get('partenaires', 'PagesController@getPartenaire')->name('partner');
Route::get('apropos', 'PagesController@getAbout');
Route::post('apropos', 'EmailController@postEmail')->name('post.email.post');
Route::get('item', 'PagesController@getItem');
Route::get('/panier/{id}', 'PagesController@getAjoutPanier')->name('panier.ajout');
Route::get('/reduce/{id}', 'PagesController@getReduirePanier')->name('panier.reduire');
Route::get('/panier', 'PagesController@getPanier')->name('panier');
Route::get('/membres', 'PagesController@getMembers')->name('members');
Route::get('/membre/{name}/{id}', 'PagesController@getList')->name('members.list');
Route::get('/membre/{name}/profile/{id}', 'PagesController@profile')->name('member.profile');
Route::get('unsubscribe/{id}/{token}', 'PagesController@showUnsubscribe')->name('unsubscribe');
Route::post('unsubscribe/{id}/{token}', 'PagesController@postUnsubscribe');
Route::get('/payement', 'PagesController@getPayment')->name('payments');
Route::post('/payement', 'PagesController@postPayment')->name('post.payments');
Route::get('/payement/approved/{token}/{id}', 'PagesController@getApproved')->name('approved');
Route::get('/payement/paypal', 'PagesController@getPaypal')->name('paypal');
Route::get('/paypal', 'PagesController@getPaypalPayment')->name('paypal.payment');
Route::get('/payement/paypal/approved/{token}/{id}', 'PagesController@getPaypalApproved')->name('paypal.approved');
/*
 * Authentications Routes
 */
Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('inscription');
Route::post('inscription', 'GetOrderController@getOrder')->name('register');
Route::get('connexion', 'Auth\LoginController@showLoginForm')->name('connexion');
Route::post('connexion', 'Auth\LoginController@login')->name('post.connexion');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('confirm/{id}/{token}', 'Auth\RegisterController@confirm');
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/*
 * Administrations Routes
 */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
    /*
     * Home Page
     */
   Route::resource('dashboard', 'admin\PostsController');
   Route::resource('dashboard1', 'admin\Posts1Controller');
   Route::resource('dashboard2', 'admin\Posts2Controller');
   /*
    * Shop Routes
    */
   Route::resource('shop', 'admin\ShopController')->middleware('isAdmin');
   Route::resource('top', 'admin\TopController')->middleware('isAdmin');
   /*
    * Media and News Routes
    */
   Route::resource('media', 'admin\MediasController')->middleware('isAdmin');
    /*
   * Events Routes
   */
    Route::resource('event', 'admin\EventsController')->middleware('isAdmin');
    /*
    * Fondatrice Routes
    */
    Route::resource('fondatrice', 'admin\FondatriceController')->middleware('isAdmin');
    /*
    * Fondatrice Routes
    */
    Route::resource('partenaires', 'admin\PartenairesController')->middleware('isAdmin');
    /*
    * About Routes
    */
    Route::resource('apropos', 'admin\AboutController')->middleware('isAdmin');
    /*
     * Member Routes
     */
    Route::resource('membre', 'admin\MembresController')->middleware('isAdmin');
    /*
     * Category Routes
     */
    Route::resource('categories', 'admin\CategoriesController')->middleware('isAdmin');
    /*
     * Newsletter Routes
     */
    Route::resource('newsletter', 'admin\NewsController')->middleware('isAdmin');
    /*
    * Service Client Routes
    */
    Route::resource('customer', 'admin\CustomersController')->middleware('isAdmin');
    Route::resource('client', 'admin\ClientController')->middleware('isAdmin');
});























/*
 * User Routes
 */

Route::group(['prefix' => 'user'], function (){
   Route::resource('dashboard', 'user\PostsController');
   Route::get('payment', 'user\PostsController@getPayment')->name('payment');
});
