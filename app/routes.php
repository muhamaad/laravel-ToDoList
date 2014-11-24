<?php
Route::bind('task',function($value,$route){
	return Item::where('id',$value)->first();
});
Route::get('/',array('as' =>'home' ,'uses'=>'HomeController@getIndex' ))->before('auth');
Route::post('/',array('uses'=>'HomeController@postIndex'))->before('csrf');


Route::get('logout',array('as'=>'logout','uses'=>'HomeController@getlogout'));

Route::get('/new',array('as'=>'new','uses'=>'HomeController@getnew'));
Route::post('new',array('uses'=>'HomeController@postnew'))->before('csrf');

Route::get('/delete/{task}',array('as'=>'delete','uses'=>'HomeController@getdelete'));
Route::get('/done/{id}', array('as' =>'done' ,'uses'=>'HomeController@getdone' ));

Route::get('/login', array('as' =>'login' ,'uses'=>'AuthController@getLogin' ))->before('guest');
Route::post('login', array('uses' =>'AuthController@postLogin' ))->before('csrf');

Route::get('/register', array('as' =>'register' ,'uses'=>'HomeController@getregister' ));
Route::post('register', array('uses' =>'HomeController@postregister' ))->before('csrf');

/*Route::get('/login', function()
{
    return 'Hello World';
});*/