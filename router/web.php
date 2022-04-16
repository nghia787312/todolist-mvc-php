<?php
use App\Http\Router;

$router = new Router();

$router->get('/', 'WorkController@index');
$router->get('/show_create', 'WorkController@showCreate');
$router->post('/create', 'WorkController@create');
$router->get('/show_edit', 'WorkController@showEdit');
$router->get('/delete', 'WorkController@delete');
$router->post('/edit', 'WorkController@edit');

$router->run();