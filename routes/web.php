<?php

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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'tp', 'namespace' => 'TpLink', 'middleware' => ['auth']], function () {
    /*仪表盘*/
    Route::get('/', 'TpLinkController@dashboard')->name('tp.dashboard');
    /*个人信息*/
    Route::get('profile', 'TpLinkController@profile')->name('tp.profile');
    /*修改个人信息*/
    Route::get('profile/edit', 'TpLinkController@editProfile')->name('tp.editProfile');
    /*查看所有平台*/
    Route::get('platform', 'TpLinkController@platforms')->name('tp.platforms');
    /*导出某个平台的数据*/
    Route::get('platform/{id}/export', 'TpLinkController@exportPlatform')->name('tp.exportPlatform');
    /*查看某个平台下的product*/
    Route::get('platform/{id}', 'TpLinkController@showPlatform')->name('tp.showPlatform')->where('id', '\d+');
    /*查看所有的products*/
    Route::get('products', 'TpLinkController@products')->name('tp.products');
    /*查看某个product*/
    Route::get('products/{id}', 'TpLinkController@showProduct')->name('tp.showProduct')->where('id', '\d+');
    /*到处某个product*/
    Route::get('products/{id}/export', 'TpLinkController@exportProduct')->name('tp.exportProduct')->where('id', '\d+');
    /*导入excel*/
    Route::get('import', 'TpLinkController@importExcel');
    Route::group(['prefix' => 'admin', 'middleware' => ['admin_auth']], function () {
        /*所有用户*/
        Route::get('users', 'TpLinkController@users')->name('tp.users');
        /*查看用户*/
        Route::get('users/{id}', 'TpLinkController@showUser')->name('tp.showUser')->where('id', '\d+');
        /*编辑用户*/
        Route::get('users/{id}/edit', 'TpLinkController@editUser')->name('tp.editUser')->where('id', '\d+');
        /*编辑用户提交*/
        Route::post('users/{id}', 'TpLinkController@storeUser')->name('tp.storeUser')->where('id', '\d+');
        /*删除用户*/
        Route::delete('users/{id}', 'TpLinkController@delUser')->name('tp.delUser')->where('id', '\d+');
        /*搜索键值对*/
        Route::get('keyword', 'TpLinkController@showKeyword')->name('tp.showKeyword');
        /*键值对提交*/
        Route::post('keyword', 'TpLinkController@storeKeyword')->name('tp.storeKeyword');
        /*删除关键字*/
        Route::delete('keyword/{id}', 'TpLinkController@delKeyword')->name('tp.delKeyword')->where('id', '\d+');
        /*导出关键字*/
        Route::get('keyword/export', 'TpLinkController@exportKeyword')->name('tp.exportKeyword');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index');

