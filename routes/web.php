<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
  Route::get('/', IndexController::class)->name('main.index');
});
Route::get('/register', [RegisterController::class])->name('register');

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
        Route::get('/', 'IndexController')->name('personal');

    Route::group(['prefix' => 'liked'], function () {
        Route::get('/', 'LikedController@index')->name('personal.liked.index');
        Route::delete('/{post}', 'LikedController@delete')->name('personal.liked.delete');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', 'CommentController@index')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'CommentController@edit')->name('personal.comment.edit');
        Route::patch('/{comment}', 'CommentController@update')->name('personal.comment.update');
        Route::delete('/{comment}', 'CommentController@delete')->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
        Route::get('/', 'IndexController')->name('admin');

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index')->name('admin.post.index');
        Route::get('/create', 'PostController@create')->name('admin.post.create');
        Route::post('/', 'PostController@store')->name('admin.post.store');
        Route::get('/{post}', 'PostController@show')->name('admin.post.show');
        Route::get('/{post}/edit', 'PostController@edit')->name('admin.post.edit');
        Route::patch('/{post}', 'PostController@update')->name('admin.post.update');
        Route::delete('/{post}', 'PostController@delete')->name('admin.post.delete');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/', 'CategoryController@store')->name('admin.category.store');
        Route::get('/{category}', 'CategoryController@show')->name('admin.category.show');
        Route::get('/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
        Route::delete('/{category}', 'CategoryController@delete')->name('admin.category.delete');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'TagController@index')->name('admin.tag.index');
        Route::get('/create', 'TagController@create')->name('admin.tag.create');
        Route::post('/', 'TagController@store')->name('admin.tag.store');
        Route::get('/{tag}', 'TagController@show')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'TagController@edit')->name('admin.tag.edit');
        Route::patch('/{tag}', 'TagController@update')->name('admin.tag.update');
        Route::delete('/{tag}', 'TagController@delete')->name('admin.tag.delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/', 'UserController@store')->name('admin.user.store');
        Route::get('/{user}', 'UserController@show')->name('admin.user.show');
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::patch('/{user}', 'UserController@update')->name('admin.user.update');
        Route::delete('/{user}', 'UserController@delete')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
