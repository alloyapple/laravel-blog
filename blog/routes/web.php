<?php

	Route::any('/', ['as' => 'home', 'uses' => 'PostsController@index']);

	// users
	Route::get('/login', ['as' => 'users.login-form', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/login', ['as' => 'users.login', 'uses' => 'Auth\LoginController@login']);
	Route::get('/logout', ['as' => 'users.logout', 'uses' => 'Auth\LoginController@logout']);
	Route::get('/registration', ['as' => 'users.registration-form', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('/registration', ['as' => 'users.register', 'uses' => 'Auth\RegisterController@register']);

	Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);
	Route::post('admin/grant', ['as' => 'users.grant-rights', 'uses' => 'UsersController@grantRights']);
	Route::get('users/{user}/delete', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

	Route::get('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@showAdminLoginForm']);
	Route::post('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@login']);

	// posts
	Route::resource('posts', 'PostsController');
	Route::get('posts/{post}/delete', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);

	// comments
	Route::resource('posts.comments', 'CommentsController', ['only' => ['store', 'destroy']]);
	Route::get('comments/{comment}/delete', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);

	Route::get('posts/{post}#comments', ['as' => 'comments.index', 'uses' => 'PostsController@show']);
	Route::get('posts/{post}#comment{comment}', ['as' => 'comments.show', 'uses' => 'PostsController@show']);

	// tags
	Route::resource('tags', 'TagsController');//, ['only' => ['store', 'destroy']]);
	Route::get('tags/{tag}/delete', ['as' => 'tags.destroy', 'uses' => 'TagsController@destroy']);
	Route::get('tags/{tag}', ['as' => 'tags.show', 'uses' => 'PostsController@tagFilter']);
