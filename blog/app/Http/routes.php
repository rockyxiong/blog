<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', function() {
//    return view('welcome');
//});

Route::get('user',array('as'=>'profile',function(){
	echo route('profile');
    return "<h1>命名路由</h1>";
}));

Route::get( '/','Home\IndexController@index' );
Route::get( '/list/{cate_id}','Home\IndexController@cate' );
Route::get( '/a/{art_id}','Home\IndexController@article' );
Route::any( 'admin/login','Admin\LoginController@login');
Route::get( 'admin/code','Admin\LoginController@code');
Route::get( 'admin/crypy','Admin\LoginController@crypy');

//分组路由
Route::group( ['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login']],function(){
	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	Route::any( 'pass','LoginController@pass' );
	Route::get( 'logout','LoginController@logout' );
	
	//资源路由
	Route::resource('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('links/changeorder', 'LinksController@changeOrder');
    Route::resource('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config/changecontent', 'ConfigController@changeContent');
    Route::resource('config/putfile', 'ConfigController@putFile');//将网站配置项写入配置文件
	Route::resource('article','ArticleController');
	Route::resource('category','CategoryController');
	Route::resource('links', 'LinksController');//友情连接资源路由
    Route::resource('navs', 'NavsController');//导航栏资源路由
    Route::resource('config', 'ConfigController');//网站配置资源路由
	Route::any( 'upload','CommonController@upload' );//上传图片控制器路由
});
//Route::get('test','UserController@index');
/*Route::group( ['middleware'=>['web']],function(){
	Route::get('/',function(){
		return view('welcome');
	});
	
	Route::get('/test',function(){
		return 'test';
	});
});*/

Event::listen("illuminate.query", function($sql, $bindings){
 $sql = str_replace(array('%','?'), array('%%',"'%s'"), $sql);
 $full_sql = vsprintf($sql, $bindings);
 echo $full_sql;
});
