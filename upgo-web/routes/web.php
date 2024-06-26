<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home');
//无分类，第一页
Route::get('/case/cate', 'CaseController@listCaseByCategory');
//无分类，第N页
Route::get('/case/page/{page}', 'CaseController@listCaseByCategory');

//有分类，第一页
Route::get('/case/cate/{cateId}', 'CaseController@listCaseByCategory');
//有分类，第N页
Route::get('/case/cate/{cateId}/page/{page}', 'CaseController@listCaseByCategory');
Route::get('/case/case/{caseId}', 'CaseController@caseDetail');

Route::get('/service', 'ServiceController@listAllService');
Route::get('/service/{page}', 'ServiceController@listAllService');

Route::get('/news', 'NewsController@listNews');
Route::get('/news/{page}', 'NewsController@listNews');


Route::get('/about', 'HomeController@aboutPage');
Route::get('/partner', 'HomeController@partnerPage');
Route::get('/partner/page/{page}', 'HomeController@partnerPage');

Route::get('/contact', 'HomeController@contactPage');
Route::get('/search/{keyWord}', 'HomeController@searchCase');


Route::get('/page/service/d/{serviceId}', 'ServiceController@serviceDetail');

Route::get('/web/pages/{pageId}', 'PagesController@webPageDetail');
