<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', 'UserController');
    $router->resource('cases', 'CaseAdminController');
    $router->resource('contact', 'AddressAdminController');
    $router->resource('banner', 'HomeBannerAdminController');
    $router->resource('partner', 'PartnerAdminController');
    $router->resource('service', 'ServiceAdminController');
    $router->resource('setting', 'SettingAdminController');
    $router->resource('about', 'AboutAdminController');
    $router->resource('home', 'HomeBannerAdminController');
    $router->resource('address', 'AddressAdminController');
    $router->resource('category', 'CategoryAdminController');
    $router->resource('about', 'AboutAdminController');

    Route::get('/case/detail/{caseId}', 'CaseAdminController@editImages');
    Route::get('/service/detail/{serviceId}', 'CaseAdminController@editImages');
});
