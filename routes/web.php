<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great return redirect()->route('login');!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testlogin', function () {
    return view('testlogin');
});
Auth::routes();

        Route::get('/users', 'ChartController@index')->name('users');


        Route::get('/home', 'AcceuilController@index')->name('Acceuil');

        Route::any('/Dashbord', [
            'uses' =>'DashbordController@index',
            'as' => 'Dashbord',
            'middleware' => 'roles',
            'roles' => ['drh']
        ]);

        Route::any('/Affectation', [
            'uses' =>'AffectationController@showForm',
            'as' => 'Affectation',
            'middleware' => 'roles',
            'roles' => ['drh']
        ]);
        Route::get('/Affectationindex', [
            'uses' =>'AffectationController@index',
            'as' => 'Affectationindex',
            'middleware' => 'roles',
            'roles' => ['drh']
        ]);

        Route::get('/homeCommandeindex', [
            'uses' =>'HomeCommandeController@index',
            'as' => 'homeCommandeindex',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);

        Route::post('/homeCommande',[
            'uses' =>'HomeCommandeController@showForm',
            'as' => 'homeCommandepost',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);


        Route::get('/homeCommande',[
            'uses' =>'HomeCommandeController@showForm',
            'as' => 'homeCommande',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);

        Route::get('/homeSaisie',[
            'uses' =>'HomeSaisieController@index',
            'as' => 'homeSaisie',
            'middleware' => 'roles',
            'roles' => ['n+2','n+1']
        ]);

        Route::get('/Calculheure',[
            'uses' =>'CalculheureController@index',
            'as' => 'Calculheure',
            'middleware' => 'roles',
            'roles' => ['drh','dto']
        ]);

        Route::any('/CalculheureMois',
        [
            'uses' =>'CalculheureController@Showpermonth',
            'as' => 'CalculheureMois',
            'middleware' => 'roles',
            'roles' => ['drh','dto']
        ]);
        Route::any('/exportheure',
        [
            'uses' =>'CalculheureController@export',
            'as' => 'exportheure',
            'middleware' => 'roles',
            'roles' => ['drh','dto']
        ]);

        Route::any('/PrintCalculheureMois',
        [
            'uses' =>'CalculheureController@Printpermonth',
            'as' => 'PrintCalculheureMois',
            'middleware' => 'roles',
            'roles' => ['drh','dto']
        ]);

        Route::any('/CalculheureSecteur',
        [
            'uses' =>'CalculheureController@Showpersecteur',
            'as' => 'CalculheureSecteur',
            'middleware' => 'roles',
            'roles' => ['drh','dto']
        ]);

        Route::any('/Saisie',
        [
            'uses' =>'SaisieController@index',
            'as' => 'Saisie',
            'middleware' => 'roles',
            'roles' => ['n+2','n+1']
        ]);
        Route::any('/ModifSaisieindex',
        [
            'uses' =>'SaisieController@Updateindex',
            'as' => 'ModifSaisieindex',
            'middleware' => 'roles',
            'roles' => ['n+1']
        ]);
        Route::any('/ModifSaisie',
        [
            'uses' =>'SaisieController@Update',
            'as' => 'ModifSaisie',
            'middleware' => 'roles',
            'roles' => ['n+1']
        ]);

        Route::get('/Validation', 'ValidationController@index')->name('Validation');

        Route::post('/Validationstore', 'ValidationController@store');

        Route::post('/ValidationInvalideur', 'ValidationController@Invalideur');

        Route::post('/Saisiestore', 'SaisieController@store')->name('Saisiestore');

        Route::any('/Acceuil', 'AcceuilController@index')->name('Acceuil');

        Route::any('/Commandeindex',
        [
            'uses' =>'CommandeController@index',
            'as' => 'Commandeindex',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);

        Route::get('/Commande',
        [
            'uses' =>'CommandeController@index',
            'as' => 'Commande',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);

        Route::post('/Commandes',
        [
            'uses' =>'CommandeController@store',
            'as' => 'Commandestore',
            'middleware' => 'roles',
            'roles' => ['n+2']
        ]);


        Route::resource('admin/user', 'Admin\UsersController');

        Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

        Route::resource('user', 'UsersController');


});
