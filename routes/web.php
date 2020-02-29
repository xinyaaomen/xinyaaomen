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

// Route::get('/', function () {
// 	$name = '莘亚门&方环敏';
//     return view('welcome',['name'=>$name]);
// });
// Route::get('/xym',function(){
// echo 'X&F';
// });
// Route::get('/user','UserController@index');
// Route::post('/add','UserController@add');
//  Route::get('/admin','AdminController@admindo');
//  Route::post('/nl','AdminController@nl')->name('do');
// Route::get('/show/{id}/{name}',function($id,$name){
// 	echo "商品ID";
// 	echo $id;
// 	echo "商品名称";
// 	echo $name;
// })->where(['name'=>'\w+']);
//外来人口路由
Route::prefix('/people')->middleware('checklogin')->group(function(){
Route::get('create','PeopleController@create');
Route::post('store','PeopleController@store');
Route::get('/','PeopleController@index');
Route::get('edit/{id}','PeopleController@edit');
Route::post('update/{id}','PeopleController@update');
Route::get('destroy/{id}','PeopleController@destroy');
});
// Route::view('/login','login');
// Route::post('/logindo','LoginController@logindo');
//学生表路由
Route::prefix('/student')->group(function(){
Route::get('create','StudentController@create');
Route::post('store','StudentController@store');
Route::get('/','StudentController@index');
Route::get('edit/{id}','StudentController@edit');
Route::post('update/{id}','StudentController@update');
Route::get('destroy/{id}','StudentController@destroy');
});
//商品表路由
Route::prefix('/brand')->middleware('checkdenglu')->group(function(){
Route::get('create','BrandController@create');
Route::post('store','BrandController@store');
Route::get('/','BrandController@index');
Route::get('edit/{id}','BrandController@edit');
Route::post('update/{id}','BrandController@update');
Route::get('destroy/{id}','BrandController@destroy');
});
Route::view('/denglu','denglu');
Route::post('/dengludo','DengluController@dengludo');
//文章表路由
Route::prefix('/wenzhang')->middleware('checkdlu')->group(function(){
Route::get('create','WenzhangController@create');
Route::post('store','WenzhangController@store');
Route::get('/','WenzhangController@index');
Route::get('edit/{id}','WenzhangController@edit');
Route::post('update/{id}','WenzhangController@update');
Route::get('destroy/{id}','WenzhangController@destroy');
Route::get('checkOnly','WenzhangController@checkOnly');
});
Route::view('/dlu','dlu');
Route::post('/dludo','DluController@dludo');
//商品分类路由
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::get('/category/index','CategoryController@index');

//商品管理路由
Route::get('/goods/create','GoodsController@create');
Route::post('/goods/store','GoodsController@store');
Route::get('/goods/index','GoodsController@index');
Route::get('/goods/edit/{id}','GoodsController@edit');
Route::post('/goods/update/{id}','GoodsController@update');
//管理员路由
Route::get('/jiafang/create','JiafangController@create');
Route::post('/jiafang/store','JiafangController@store');
Route::get('/jiafang/index','JiafangController@index');
Route::get('/jiafang/edit/{id}','JiafangController@edit');
Route::post('/jiafang/update/{id}','JiafangController@update');
Route::get('/jiafang/destroy/{id}','JiafangController@destroy');
//
Route::get('/','Index\IndexController@index');
Route::view('/login','index/login');
Route::view('/reg','index/reg');
Route::get('/setcookie','Index\IndexController@setCookie');
Route::get('/send','Index\IndexController@ajaxsend');
Route::get('/proinfo','Index\IndexController@proinfo');
Route::get('/prolist','Index\IndexController@prolist');
//
// Route::get('/userx/create','UserxController@create');
// Route::post('/userx/store','UserxController@store');
// Route::get('/userx/index','UserxController@index');
// Route::get('/userx/kgycreate','UserxController@kgycreate');
// //
// Route::post('/kgy/store','KgyController@store');
// Route::get('/kgy/index','KgyController@index');
// Route::get('/kgy/edit/{id}','KgyController@edit');
// Route::post('/kgy/update/{id}','KgyController@update');
// Route::get('/kgy/destroy/{id}','KgyController@destroy');

