<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return "Notification Service v1.0.0";
});

$router->group(['middleware' => 'auth','prefix' => 'send'], function () use ($router) {
    $router->addRoute(['GET','POST'],'/telegram','TelegramController@send');
    $router->addRoute(['GET','POST'],'/discord','DiscordController@send');
});

