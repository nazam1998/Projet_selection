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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('etape/{id}/create', 'EtapeController@create')->name('etape.create');
Route::get('etape/{etape}/edit', 'EtapeController@edit')->name('etape.edit');
Route::post('etape/{id}/store', 'EtapeController@store')->name('etape.store');
Route::put('etape/{etape}/update', 'EtapeController@update')->name('etape.update');
Route::delete('etape/{etape}/delete', 'EtapeController@destroy')->name('etape.destroy');

// Inscription formulaire

Route::post('inscription/{id}', 'WelcomeController@register')->name('inscription');
Route::get('inscription/{id}/create', 'WelcomeController@create')->name('inscription.add');

Auth::routes();
// Mailing
Route::get('mailing/personne', 'MailingController@personne');
Route::get('mailing/role', 'MailingController@role');
Route::get('mailing/group', 'MailingController@group');
Route::post('mailing/StoreUser', 'MailingController@storeUser')->name('mailing.storeUser');


Route::get('suivi/student/group/', 'StudentController@indexGroup')->name('student.group');
Route::get('suivi/staff/group/', 'StaffController@indexGroup')->name('staff.group');
// Resources
Route::resource('matiere', 'MatiereController');
Route::resource('mailing', 'MailingController');
Route::resource('annonce', 'AnnonceController');
Route::resource('contact', 'ContactController');
Route::resource('evenement', 'EvenementController');
Route::resource('formulaire', 'FormulaireController');
Route::resource('interet', 'InteretController');
Route::resource('role', 'RoleController');
Route::resource('group', 'GroupController');
Route::resource('titre', 'TitreController');
Route::resource('description', 'DescriptionController');


Route::get('staff/{user}/restore', 'StaffController@restore')->name('staff.restore');
Route::delete('staff/{user}/forceDestroy', 'StaffController@forceDestroy')->name('staff.forceDestroy');
Route::resource('suivi/staff', 'StaffController', ['parameters' => [
    'staff' => 'user'
]]);

Route::get('student/{user}/restore', 'StudentController@restore')->name('student.restore');
Route::delete('student/{user}/forceDestroy', 'StudentController@forceDestroy')->name('student.forceDestroy');
Route::resource('suivi/student', 'StudentController', ['parameters' => [
    'student' => 'user'
]]);


// Candidat

Route::get('candidat/{user}/restore', 'CandidatController@restore')->name('candidat.restore');

Route::delete('candidat/{user}/forceDestroy', 'CandidatController@forceDestroy')->name('candidat.forceDestroy');

Route::resource('candidat', 'CandidatController', ['parameters' => [
    'candidat' => 'user'
]]);

// User
Route::get('user/{users}/restore', 'UserController@restore')->name('users.restore');
Route::delete('user/{users}/forceDestroy', 'UserController@forceDestroy')->name('users.forceDestroy');

Route::resource('users', 'UserController');


Route::put('/phrase/{phrase}/update', 'PhraseController@update')->name('phrase.update');
Route::get('/suivi/student/{user}/matiere', 'StudentController@addMatiere')->name('addMatiere');
Route::post('/suivi/student/{user}/storeMatiere', 'StudentController@saveMatiere')->name('saveMatiere');

Route::get('/suivi/student/{user}/{matiere}/valide', 'StudentController@valider')->name('validerMatiere');
Route::get('/suivi/student/{user}/{matiere}/invalide', 'StudentController@invalider')->name('invaliderMatiere');

Route::get('note/{user}/{id}/edit', 'NoteController@edit')->name('note.edit');
Route::post('note/{user}/store', 'NoteController@store')->name('note.store');
Route::post('note/{user}/{id}/update', 'NoteController@update')->name('note.update');
Route::delete('note/{user}/{id}/delete', 'NoteController@destroy')->name('note.destroy');


Route::get('/home', 'HomeController@index')->name('home');
