<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\C_M_SController;
use App\Http\Controllers\CreateBlogController;
use App\Http\Requests\User\About_usRequest;
use App\Http\Controllers\ContactController;


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

// Route::get('/wellcome', function () {
//     return view('wellcome');
// });

Route::get('/', [BlogController::class, 'index'])->name('wellcome');

// user password reset thorgh the reset link
Route::get('foregtpassword', function () {
    return view('auth.passwords.email');
})->name('foregtpassword');
Route::get('resetpassword', function () {
    return view('auth.passwords.reset');
})->name('resetpassword');

Auth::routes();
Route::group(
    ['middleware' => 'auth:web'],
    function () {
        // the and Home page of Blog
        Route::get('/home', [HomeController::class, 'index'])->name('home');
       
        // Blog display with details
        Route::get('detail-blog/{slug}', [BlogController::class, 'detail'])->name('detail-blog');

        // like and dislike procces
        Route::get('like/{id}', [BlogController::class, 'like'])->name('like');
        Route::get('dislikes/{id}', [BlogController::class, 'user_dislikes'])->name('dislikes');

        // comment procces
        Route::Post('submit_comment/{id}', [BlogController::class, 'comment'])->name('submit_comment');

        // user Profile view
        Route::get('user-profile-view', [BlogController::class, 'user_blog'])->name('user_profile_view');

        // user can enter blog
        Route::get('create-blog', [CreateBlogController::class, 'create'])->name('create');
        Route::post('crete-blog', [CreateBlogController::class, 'store_blog'])->name('crete_blog');

        // user profile edit
        Route::get('edit-profile-view', [HomeController::class, 'view'])->name('edit_profile');
        Route::post('edit_profile/{id}', [HomeController::class, 'update'])->name('user_edit');

        // edit _blog  
        Route::get('edit_blog_button', [BlogController::class, 'edit_blog_button'])->name('edit_blog_button');
        Route::get('edit_blog/{slug}', [BlogController::class, 'blog_fatch'])->name('edit_blog');
        Route::post('submit_edit_blog/{slug}', [BlogController::class, 'blog_edit'])->name('submit_edit_blog');
        Route::get('delete_blog/{id}', [BlogController::class, 'blog_delete'])->name('delete_blog');

        // About US -------------------------------------
        Route::get('About',[C_M_SController::class,'About']);

         // contact Us ----------------------------------
        Route::get('contact_form', [ContactController::class, 'index'])->name('contact_form');
        Route::post('contact_store', [ContactController::class, 'store'])->name('contact_store');
    }
);
