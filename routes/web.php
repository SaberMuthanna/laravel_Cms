<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;

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






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes(['verify' => true]);

        Route::get('/', 'WelcomeController@index')->name('welcome');

        Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
        Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
        Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::resource('categories', 'CategoryController');
            Route::resource('tags', 'TagController');
            Route::resource('posts', 'PostController')->middleware(['auth', 'verifyCategoriesCount']);
            Route::get('trashedPost', 'PostController@trashed')->name('trashed');
            Route::get('trashedPost', 'PostController@trashed')->name('trashed');
            Route::Put('restore/{post}', 'PostController@restore')->name('restore');
        });
        Route::group(['middleware' => ['auth', 'admin']], function () {
            Route::get('users', 'UserController@index')->name('users.index');
            Route::get('users/profile', 'UserController@edit')->name('users.edit-profile');
            Route::put('users/profile', 'UserController@update')->name('users.update-profile');
            Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        });
    }
);
