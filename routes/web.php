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

Route::prefix('login')->group(function(){
  Route::get('/user', 'Auth\LoginController@showLoginForm')->name('login.user');
  Route::post('/user', 'Auth\LoginController@login')->name('login.user.submit');
  Route::get('/company', 'Auth\CompanyLoginController@showLoginForm')->name('login.company');
  Route::post('/company', 'Auth\CompanyLoginController@login')->name('login.company.submit');
  Route::get('/', 'Auth\LoginController@showUserTypeSelection')->name('login');
});

Route::prefix('register')->group(function(){
  Route::get('/user', 'Auth\RegisterController@showRegistrationForm')->name('register.user');
  Route::post('/user', 'Auth\RegisterController@register')->name('register.user.submit');
  Route::get('/company', 'Auth\CompanyRegisterController@showRegistrationForm')->name('register.company');
  Route::post('/company', 'Auth\CompanyRegisterController@register')->name('register.company.submit');
  Route::get('/', 'Auth\RegisterController@showUserTypeSelection')->name('register');
});

Route::get('/company-dashboard', "CompanyController@index")->name('company.dashboard');

Route::get('/company/{id}', "PagesController@companyProfile")->name('company.profile');
Route::get('/user/{id}', "PagesController@userProfile")->name('user.profile');
Route::get('/new', "CompanyController@new")->name('job.new');
