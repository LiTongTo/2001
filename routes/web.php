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
    Route::any('/index','Admin\AdminController@index')->middleware('islog')->name('index');//后天首页
    Route::any('/brand','Admin\BrandController@brand')->middleware('islog')->name('brand.create');//品牌添加
    Route::any('/bstore','Admin\BrandController@bstore');//执行品牌添加
    Route::any('/bindex','Admin\BrandController@bindex')->middleware('islog')->name('brand');//品牌展示
    Route::any('/upload','Admin\BrandController@upload');//文件上传
    Route::any('/bedit/{brand_id}','Admin\BrandController@bedit');//品牌修改视图
    Route::any('/bupdate/{brand_id}','Admin\BrandController@bupdate');//品牌修改视图
    Route::any('/jd','Admin\BrandController@jd');//即点即改
    Route::any('/bdel','Admin\BrandController@bdel');//删除
    Route::any('/bdels','Admin\BrandController@bdels');//批量删除


    //多文件上传
    Route::any('/goods_imgs','Admin\ImgsController@goods_imgs')->name('goods.imgs');
    Route::any('/goods_imgsdo','Admin\ImgsController@goods_imgsdo');
    Route::any('/imgsdo','Admin\ImgsController@imgsdo');
    Route::any('/goods_imgslist','Admin\ImgsController@goods_imgslist')->name('imgslist');
    Route::any('/img_del/{id?}','Admin\ImgsController@img_del');
    Route::any('/imgedit/{id}','Admin\ImgsController@imgedit');
    Route::any('/upddo/{id}','Admin\ImgsController@upddo');
   // ****************************************************************
<<<<<<< HEAD
    Route::any('goods','Admin\GoodsController@goods')->name('goods.create');//添加页面
    Route::any('stores','Admin\GoodsController@stores');
    Route::any('gindex','Admin\GoodsController@gindex')->name('goods');
=======
    Route::any('goods','Admin\GoodsController@goods')->middleware('islog')->name('goods.create');//添加页面
    Route::any('store','Admin\GoodsController@store');
    Route::any('gindex','Admin\GoodsController@gindex')->middleware('islog')->name('goods');
>>>>>>> master
    Route::any('del','Admin\GoodsController@del');//删除
    Route::any('update/{id}','Admin\GoodsController@update');//修改
    Route::any('jidian','Admin\GoodsController@jidian');
    Route::any('edit','Admin\GoodsController@edit');
    Route::any('/uploads','Admin\GoodsController@uploads');//商品文件上传

    Route::any('/cate','Admin\CateController@cate')->middleware('islog')->name('cate.create');//分类添加
    Route::any('/cate_add','Admin\CateController@cate_add');//分类添加
    Route::any('/cate_index','Admin\CateController@cate_index')->middleware('islog')->name('cate');//分类添加
    Route::any('/cate_del','Admin\CateController@cate_del');//分类添加
    Route::any('/jdjg','Admin\CateController@jdjg');//分类添加


    Route::any('/reg','Admin\RegController@reg');
    Route::any('/regdo','Admin\RegController@regdo');
    Route::any('/imageCode','Admin\RegController@imageCode');
    Route::any('/create','Admin\RegController@create')->name('user.create');
    Route::any('/rstore','Admin\RegController@rstore');
    Route::any('/list','Admin\RegController@index')->name('user');
    Route::any('/delete/{brand_id}','Admin\RegController@delete');
    Route::any('/redit/{admin_id}','Admin\RegController@redit');
    Route::any('/rupdate/{admin_id}','Admin\RegController@rupdate');
    Route::any('/quit/','Admin\RegController@quit');
    
    #######角色#########################################
    Route::any('/role','Admin\RoleController@role');//添加
    Route::any('/roledo','Admin\RoleController@roledo');//执行添加
    Route::any('/roindex','Admin\RoleController@roindex');//展示
    Route::any('/rodel/{id?}','Admin\RoleController@rodel');//删除
    Route::any('/roedit/{id?}','Admin\RoleController@roedit');//执行修改
    Route::any('/roup/{id?}','Admin\RoleController@roup');//执行修改

<<<<<<< HEAD



=======
     #######权限#########################################
     Route::any('/right','Admin\RightController@right');//添加
     Route::any('/rigdo','Admin\RightController@rigdo');//执行添加
     Route::any('/rigindex','Admin\RightController@rigindex');//展示
     Route::any('/rigdel/{id?}','Admin\RightController@rigdel');//删除
     Route::any('/rigedit/{id?}','Admin\RightController@rigedit');//执行修改
     Route::any('/rigup/{id?}','Admin\RightController@rigup');//执行修改
>>>>>>> master
});

