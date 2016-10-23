<?php

// Home
Route::get('/', 'HomeController')->name('home');

// Language
Route::get('language/{lang}', 'LanguageController')
    ->where('lang', implode('|', config('app.languages')));

// Admin
Route::get('admin', 'AdminController')->name('admin');

// Medias
Route::get('medias', 'FilemanagerController')->name('medias');

// Blog 
Route::get('blog/tag', 'BlogFrontController@tag');
Route::get('blog/search', 'BlogFrontController@search');
Route::get('articles', 'BlogFrontController@index');

Route::get('events', 'EventController@index');

Route::get('blog/order', 'BlogController@indexOrder')->name('blog.order');
Route::resource('blog', 'BlogController', ['except' => 'show']);
Route::put('postseen/{id}', 'BlogAjaxController@updateSeen');
Route::put('postactive/{id}', 'BlogAjaxController@updateActive');
Route::get('blog/{blog}', 'BlogFrontController@show')->name('blog.show');

// Comment
Route::resource('comment', 'CommentController', [
    'except' => ['create', 'show', 'update']
]);
Route::put('comment/{comment}', 'CommentAjaxController@update')->name('comment.update');
Route::put('commentseen/{id}', 'CommentAjaxController@updateSeen');

// Contact
Route::resource('contact', 'ContactController', ['except' => ['show', 'edit']]);

// Card
Route::resource('card', 'CardRegistrationController', ['except' => ['show', 'edit']]);

//Service
Route::resource('service', 'ServiceController', ['except' => ['show', 'edit']]);
Route::get('service/{id}', 'ServiceController@show')->name('service.show');

//CardManager
Route::resource('cardmanager', 'CardManagerController', ['except' => ['show', 'edit']]);

// Roles
Route::get('roles', 'RoleController@edit');
Route::post('roles', 'RoleController@update');

//Post

Route::resource('post', 'PostController', ['except' => ['show', 'edit']]);
Route::resource('blog', 'Bl', ['except' => ['show', 'edit']]);
Route::get('blog/{blog}', 'Bl@show')->name('blog.show');


//cardrel
Route::resource('cardrel', 'CardRel', ['except' => ['show', 'edit']]);
Route::get('cardrel/{cardrel}', 'CardRel@index')->name('cardrel.index');

// Users
Route::get('user/sort/{role?}', 'UserController@index');
Route::get('user/blog-report', 'UserController@blogReport')->name('user.blog.report');
Route::resource('user', 'UserController', ['except' => 'index']);
Route::put('uservalid/{id}', 'UserAjaxController@valid');
Route::put('userseen/{user}', 'UserAjaxController@updateSeen');

// Authentication 
Auth::routes();

// Email confirmation 
Route::get('resend', 'Auth\RegisterController@resend');
Route::get('confirm/{token}', 'Auth\RegisterController@confirm');

// Notifications
Route::get('notifications/{user}', 'NotificationController@index');
Route::put('notifications/{notification}', 'NotificationController@update');