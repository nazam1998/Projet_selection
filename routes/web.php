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
Route::get('etape/{id}/create', 'EtapeController@create')->name('etape.create');
Route::get('etape/{etape}/edit', 'EtapeController@edit')->name('etape.edit');
Route::post('etape/{id}/store', 'EtapeController@store')->name('etape.store');
Route::put('etape/{etape}/update', 'EtapeController@update')->name('etape.update');
Route::delete('etape/{etape}/delete', 'EtapeController@destroy')->name('etape.destroy');

Route::post('inscription/{id}', 'WelcomeController@register')->name('inscription');
Route::get('inscription/{id}/create', 'WelcomeController@create')->name('inscription.add');

Auth::routes();

Route::get('mailing/personne', 'MailingController@personne');
Route::get('mailing/role', 'MailingController@role');
Route::get('mailing/group', 'MailingController@group');
Route::post('mailing/StoreUser', 'MailingController@storeUser')->name('mailing.storeUser');

Route::resource('matiere', 'MatiereController');
Route::resource('mailing', 'MailingController');
Route::resource('annonce', 'AnnonceController');
Route::resource('contact', 'ContactController');
Route::resource('evenement', 'EvenementController');
Route::resource('formulaire', 'FormulaireController');
Route::resource('interet', 'InteretController');
Route::resource('role', 'RoleController');
Route::resource('group', 'GroupController');
Route::resource('suivi', 'StaffController');

Route::get('note/{id}/create', 'NoteController@create')->name('note.create');
Route::get('note/{id}/edit', 'NoteController@edit')->name('note.edit');
Route::post('note/{id}/store', 'NoteController@store')->name('note.store');
Route::get('note/{id}/show', 'NoteController@show')->name('note.show');
Route::post('note/{id}/update', 'NoteController@update')->name('note.update');
Route::delete('note/{id}/delete', 'NoteController@destroy')->name('note.destroy');

Route::get('/home', 'HomeController@index')->name('home');
