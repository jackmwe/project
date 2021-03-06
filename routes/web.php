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

/*Login Routes
Route::get('auth/logintry', 'AuthController@getLogin');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@getLogout');

//Logout Links
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('welcome', function () {
    return view('pages/welcome');
});

Route::get('manual', function () {
    return view('pages/manual');
});

Route::get('error', function () {
    return view('errors/403');
});

Route::get('portal/{slug}', ['as'=>'portal.single', 'uses'=>'PortalController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('portal',['uses'=>'PortalController@getIndex', 'as'=>'portal.index']);

Route::get('closure', 'PagesController@getClosure');
Route::get('about', 'PagesController@getAbout');


Route::get('contact', 'PagesController@getContact');

Route::post('contact', 'PagesController@postContact');

Route::get('nomination', 'NominationController@getNomination');

route::resource('nominations','NominationController');

Route::post('nomination', 'NominationController@postNomination');

Route::get('/nominate-leader', 'NominationController@index')->name('nominations.index');

route::resource('posts','PostController');

route::resource('bibles','BibleController');
Route::get('/bible-study', 'BibleController@bs')->name('bibles.bs');
route::resource('missions','MissionController');

route::resource('contacts','ContactController');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::resource('users', 'UserController');

Route::get('profile', 'UserController@profile')->name('profile');

Route::get('users/editProfile/{id}','UserController@editProfile')->name('editProfile');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

route::resource('category','CategoryController',['except'=>['create']]);


Route::resource('products', 'ProductController', ['except' => 'show']);
route::resource('library','LibraryController');

Route::get('dynamic_pdf','UserController@pdf');