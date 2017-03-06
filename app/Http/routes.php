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

Route::get('orm1',['uses'=>'StudentController@orm1']);

Route::get('orm2',['uses'=>'StudentController@orm2']);

Route::get('orm3',['uses'=>'StudentController@orm3']);

Route::get('orm4',['uses'=>'StudentController@orm4']);

Route::get('section1',['uses'=>'StudentController@section1']);

Route::any('url',['as'=>'ut','uses'=>'StudentController@urltest']);

Route::any('request1',['as'=>'re1','uses'=>'StudentController@request1']);


//sessionstart,使用session前的准备
Route::group(['middleware'=>['web']],function(){

    Route::any('session1',['uses'=>'StudentController@session1']);
    Route::any('session2',['uses'=>'StudentController@session2']);
});

Route::any('response',['uses'=>'StudentController@response']);

//宣传
Route::any('activity0',['uses'=>'StudentController@activity0']);
//活动
Route::group(['middleware'=>['activity']],function(){
    Route::any('activity1',['uses'=>'StudentController@activity1']);
    Route::any('activity2',['uses'=>'StudentController@activity2']);
    Route::any('activity3',['uses'=>'StudentController@activity3']);
});






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
