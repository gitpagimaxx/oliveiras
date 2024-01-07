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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');

     // Matches "/api/login
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1 
    //get one user by id
    $router->get('usuarios/obter-por-id/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('usuarios/obter-todos', 'UserController@allUsers');

    /*
    Galerias
     */
    $router->get('galeria/obter-todos', 'GaleriaController@obterTodos');
    $router->get('galeria/obter-por-id/{id}', 'GaleriaController@obterPorId');
    $router->post('galeria/cadastrar', 'GaleriaController@cadastrar');
    $router->put('galeria/alterar/{id}', 'GaleriaController@alterar');
    $router->delete('galeria/deletar/{id}', 'GaleriaController@deletar');

        /*
    Galerias
     */
    $router->get('fotos/obter-todos', 'FotosController@obterTodos');
    $router->get('fotos/obter-por-id/{id}', 'FotosController@obterPorId');
    $router->post('fotos/cadastrar', 'FotosController@cadastrar');
    $router->put('fotos/alterar/{id}', 'FotosController@alterar');
    $router->delete('fotos/deletar/{id}', 'FotosController@deletar');

});