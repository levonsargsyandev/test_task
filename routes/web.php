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

Route::get('/register', [ 'as' => 'register', 'uses' => 'AuthController@showSignUp']);
Route::post('/register', [ 'as' => 'register', 'uses' => 'AuthController@signUp']);

Route::get('/login', [ 'as' => 'login', 'uses' => 'AuthController@showLogin']);
Route::post('/login', [ 'as' => 'login', 'uses' => 'AuthController@login']);

Route::post('/logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout']);


Route::get('/', 'CompanyController@index');
Route::resource('companies', 'CompanyController')->except([
    'create', 'store'
]);
Route::resource('employes', 'EmployeController')->except([
    'create', 'index', 'show'
]);

Route::get('/employes/create/{id}', [
	'as' =>'employe.create.company_id',
	'uses' => 'EmployeController@create'
]);

Route::post('/comments', [
	'as' => 'post.comment',
	'uses' => 'CommentsController@store'
]);
