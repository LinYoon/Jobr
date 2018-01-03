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

Route::get('/', 'PagesController@showJobs')->name('home');
Route::get('/delo/{id}', 'PagesController@job')->name('job.details');
Route::post('/delo/{id}', 'PagesController@jobApply')->name('apply');
Route::get('/podjetja', "PagesController@showCompanies")->name('companies');
Route::get('/podjejte/{id}', "PagesController@companyProfile")->name('company.profile');

Auth::routes();

Route::prefix('prijava')->group(function(){
  Route::get('/uporabnik', 'Auth\LoginController@showLoginForm')->name('login.user');
  Route::post('/uporabnik', 'Auth\LoginController@login')->name('login.user.submit');
  Route::get('/podjejte', 'Auth\CompanyLoginController@showLoginForm')->name('login.company');
  Route::post('/podjejte', 'Auth\CompanyLoginController@login')->name('login.company.submit');
  Route::get('/', 'Auth\LoginController@showUserTypeSelection')->name('login');
});

Route::prefix('registracija')->group(function(){
  Route::get('/uporabnik', 'Auth\RegisterController@showRegistrationForm')->name('register.user');
  Route::post('/uporabnik', 'Auth\RegisterController@register')->name('register.user.submit');
  Route::get('/podjejte', 'Auth\CompanyRegisterController@showRegistrationForm')->name('register.company');
  Route::post('/podjejte', 'Auth\CompanyRegisterController@register')->name('register.company.submit');
  Route::get('/', 'Auth\RegisterController@showUserTypeSelection')->name('register');
});


Route::get('/prijave', "UserController@applies")->name('applies');

Route::get('/sporocila', "UserAndCompanyController@messages")->name('messages');
Route::get('/profil', "UserAndCompanyController@profile")->name('profile');

Route::get('/podjejte/{id}/sporocila', "CompanyController@companyMessages")->name('company.messages');
Route::get('/novo-delo', "CompanyController@showNewJobForm")->name('job.new');
Route::post('/novo-delo', "CompanyController@newJob")->name('job.new');
Route::get('/podjejte/delo/{id}', "CompanyController@showJobStats")->name('company.job');
Route::get('/uporabnik/{id}', "CompanyController@userProfile")->name('user.profile.company');
Route::get('/company-dashboard', "CompanyController@index")->name('company.dashboard');
