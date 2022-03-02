<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;


Route::get('/login', function () {
    return view('admin.login');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource("category", 'Auth\CategoryController');
    Route::resource("blogs", 'Auth\BlogController');

    //user
    Route::get("user-list", 'Auth\UserController@indexUser')->name('user');
    Route::get("user-list/{id}", 'Auth\UserController@destroy')->name('destroy');
    Route::get("show-user{id}", 'Auth\UserController@showUser')->name('show');
    //user change password
    Route::get("change-pass/{id}", 'Auth\UserController@editUser')->name('changepass');
    Route::post("change-pass", 'Auth\UserController@updateUserpass')->name('changepass1');
    //status
    Route::get('/status-update', 'Auth\CategoryController@statusUpdate')->name('status');
    Route::get('/status-updates/{blog}', 'Auth\BlogController@statusChange')->name('change');

    //admin change password
    Route::get("change/{id}", 'Auth\UserController@editAdmin')->name('adminchange');
    Route::post("change-pass", 'Auth\UserController@adminchanagepass')->name('changepassadmin');

    //setting
    Route::get("setting/{id}", 'Auth\UserController@settingedit')->name('setting');
    Route::post("setting", 'Auth\UserController@settingupdate')->name('changesetting');

    //about us
    Route::get("about-show", 'Auth\UserController@indexAbout')->name('about_show');
    Route::get("about/{id}", 'Auth\UserController@aboutusedit')->name('about');
    Route::post("about-update", 'Auth\UserController@aboutusupdate')->name('about_update');
    Route::get("about-delete/{id}", 'Auth\UserController@destroyAbout')->name('destroy_about');

    //Contact Us
    Route::get("contact",'Auth\UserController@indexContact')->name('contact_show');
    Route::get("contact-delete/{id}", 'Auth\UserController@destroyContact')->name('destroy_contact');
});
