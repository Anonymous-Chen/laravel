<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//基础路由
Route::get('/', function () {
    return view('welcome');
});

Route::get('baisc1', function () {
    return 'hello world';
});

Route::post('baisc2', function () {
    return 'baisc2';
});

//多请求路由

Route::match(['get','post'],'muty1',function(){
   return 'muty1';
});

Route::any('muty2',function (){
   return 'muty2';
});

//路由参数

 Route::get('user/{id}',function ($id){
    return 'User-'.$id;
});

//Route::get('user/{name?}',function ($name=null){
//    return 'User1-'.$name;
//});

Route::get('user/{name?}',function ($name='nul'){
    return 'User1-'.$name;
})->where('name','[A-Za-z]+');

//路由别名

//路由群组

//路由中输出视图

//Route::get('member/info','MemberController@info');

//Route::get('member/info',['uses'=>'MemberController@info']);


Route::get('member/{id}',['uses'=>'MemberController@info']);

Route::get('test1',['uses'=>'StudentController@test1']);

Route::get('query1',['uses'=>'StudentController@query1']);

Route::get('query2',['uses'=>'StudentController@query2']);

Route::get('query3',['uses'=>'StudentController@query3']);

Route::get('query4',['uses'=>'StudentController@query4']);

Route::get('query5',['uses'=>'StudentController@query5']);





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
