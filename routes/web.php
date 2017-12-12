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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/job/{id}', 'PagesController@job')->name('job.details');

Auth::routes();

Route::prefix('prijava')->group(function(){
  Route::get('/uporabnik', 'Auth\LoginController@showLoginForm')->name('login.user');
  Route::post('/uporabnik', 'Auth\LoginController@login')->name('login.user');
  Route::get('/podjetje', 'Auth\CompanyLoginController@showLoginForm')->name('login.company');
  Route::post('/podjetje', 'Auth\CompanyLoginController@login')->name('login.company');
  Route::get('/', 'Auth\LoginController@showUserTypeSelection')->name('login');
});

Route::prefix('registracija')->group(function(){
  Route::get('/uporabnik', 'Auth\RegisterController@showRegistrationForm')->name('register.user');
  Route::post('/uporabnik', 'Auth\RegisterController@register')->name('register.user');
  Route::get('/company', 'Auth\CompanyRegisterController@showRegistrationForm')->name('register.company');
  Route::post('/company', 'Auth\CompanyRegisterController@register')->name('register.company');
  Route::get('/', 'Auth\RegisterController@showUserTypeSelection')->name('register');
});


Route::get('/company-dashboard', "CompanyController@index")->name('company.dashboard');

Route::get('/company/{id}', "PagesController@companyProfile")->name('company.profile');
Route::get('/user/{id}', "PagesController@userProfile")->name('user.profile');
Route::get('/user/{id}/sporocila', "PagesController@userMessages")->name('user.messages');
Route::get('/company/{id}/sporocila', "CompanyController@companyMessages")->name('company.messages');
Route::get('/new', "CompanyController@new")->name('job.new');
