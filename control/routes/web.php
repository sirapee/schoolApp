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

//Route::get('/', function () {
//    return view('dashboard');
//})->middleware('auth');

Auth::routes();

Route::get('/404', function () {
    return view('errors.404');
});
Route::get('/500', function () {
    return view('errors.500');
});

Route::get('/userLogin', 'LoginController@index');
Route::get('/lockScreen', 'LoginController@lockScreen');
Route::get('/test/{id}', 'RegistrationController@test');

//Route::post('/userLogin', 'LoginController@store');
Route::post('/userLogin', 'LoginController@postLogin')->name('login');
Route::post('/unlock', 'LoginController@unlock')->name('unlock');

Route::get('/two-factor', 'LoginController@twoFactor');
Route::post('/two-factor', 'LoginController@postTwoFactor')->name('two-factor');

Route::post('/userLogout', 'LoginController@logout');
///Password reset
Route::get('/resetEmail', 'PasswordResetController@passwordReset');
Route::get('/resetPassword/{email}/{resetToken}', 'PasswordResetController@reset');
Route::post('/resetPassword', 'PasswordResetController@postReset');
Route::post('/resetEmail', 'PasswordResetController@passwordResetPost');

Route::group(['prefix' => '/backend/','middleware' => 'inputter'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    // Route::get('/system-management/{option}', 'SystemMgmtController@index');
    Route::get('/profile', 'ProfileController@index');

    Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
    Route::resource('user-management', 'UserManagementController');

    Route::resource('employee-management', 'EmployeeManagementController');
    Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

    Route::resource('system-management/department', 'DepartmentController');
    Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

    Route::resource('system-management/division', 'DivisionController');
    Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

    Route::resource('system-management/country', 'CountryController');
    Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

    Route::resource('system-management/state', 'StateController');
    Route::post('system-management/state/search', 'StateController@search')->name('state.search');

    Route::resource('system-management/city', 'CityController');
    Route::post('system-management/city/search', 'CityController@search')->name('city.search');

    Route::get('system-management/report', 'ReportController@index');
    Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
    Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
    Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

    Route::get('avatars/{name}', 'EmployeeManagementController@load');
});

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/news', function () {
    return view('frontend.news ');
});

Route::get('/about', function () {
    return view('frontend.about ');
});


Route::get('/gallery-album', function () {
    return view('frontend.gallery');
});