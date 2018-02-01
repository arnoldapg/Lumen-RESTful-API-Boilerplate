<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function($router){
	/*posts*/
	$router->group(['prefix' => 'posts'], function($router){
		//$router->group(['middleware' => 'auth'], function($router){ this function restrict unauthorized users
			$router->post('add', 'PostsController@createPost');
			$router->put('edit/{id}', 'PostsController@updatePost');
			$router->delete('delete/{id}', 'PostsController@deletePost');
		//});
			$router->get('index', 'PostsController@index');
			$router->get('view/{id}', 'PostsController@viewPost');
	});
	/*users*/
	$router->group(['prefix' => 'users', 'middleware' => 'cors'], function($router){
		$router->get('index', 'UsersController@index');
		$router->get('view/{id}', 'UsersController@view');
		$router->post('add', 'UsersController@add');
		$router->put('edit/{id}', 'UsersController@update');
		$router->delete('delete/{id}', 'UsersController@delete');
	});
});