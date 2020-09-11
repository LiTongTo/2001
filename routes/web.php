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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/admin')->group(function(){
    Route::any('/index','Admin\AdminController@index')->name('index');//后天首页
    Route::any('/brand','Admin\BrandController@brand')->name('brand.create');//品牌添加
    Route::any('/bstore','Admin\BrandController@bstore');//执行品牌添加
    Route::any('/bindex','Admin\BrandController@bindex')->name('brand');//品牌展示
    Route::any('/upload','Admin\BrandController@upload');//文件上传
    Route::any('/bedit/{brand_id}','Admin\BrandController@bedit');//品牌修改视图
    Route::any('/bupdate/{brand_id}','Admin\BrandController@bupdate');//品牌修改视图
    Route::any('/jd','Admin\BrandController@jd');//即点即改
    Route::any('/bdel','Admin\BrandController@bdel');//删除
    Route::any('/bdels','Admin\BrandController@bdels');//批量删除
});

Route::any('/admin/reg','Admin\RegController@reg');
Route::any('/admin/regdo','Admin\RegController@regdo');
Route::any('/admin/imageCode','Admin\RegController@imageCode');
Route::any('/admin/create','Admin\RegController@create')->name('admin.create');
Route::any('/admin/store','Admin\RegController@store');
Route::any('/admin/list','Admin\RegController@index')->name('admin.list');
Route::any('/admin/delete/{brand_id}','Admin\RegController@delete');
Route::any('/admin/edit/{admin_id}','Admin\RegController@edit');
Route::any('/admin/update/{admin_id}','Admin\RegController@update');