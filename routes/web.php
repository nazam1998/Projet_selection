<?php

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

Route::get('/', 'WelcomeController@index');
Route::get('etape/{id}/create', 'EtapeController@create')->name('etage.create');
Route::get('etape/{etape}/edit', 'EtapeController@edit')->name('etage.edit');
Route::post('etape/{etape}/{id}/store', 'EtapeController@store')->name('etage.store');
Route::put('etape/{etape}/update', 'EtapeController@update')->name('etage.update');
Route::delete('etape/{etape}/delete', 'EtapeController@destroy')->name('etage.delete');


Auth::routes();

Route::resource('matiere', 'MatiereController');
Route::resource('annonce', 'AnnonceController');
Route::resource('contact', 'ContactController');
Route::resource('mailing', 'MailingController');
Route::resource('evenement', 'EvenementController');
Route::resource('formulaire', 'FormulaireController');
Route::resource('interet', 'InteretController');
Route::resource('role', 'RoleController');
Route::resource('group', 'GroupController');

Route::get('/home', 'HomeController@index')->name('home');
