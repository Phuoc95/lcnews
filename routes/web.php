<?php
route::pattern('name' ,'(.*)');
route::pattern('id', '([0-9]+)');


Route::namespace('Admin')->prefix('admin')->group( function() {
	Route::prefix('index')->group(function() {
		Route::get('index' , [
			'uses' => 'IndexController@index',
			'as'   => 'admin.index.index'
		]);
	});

	Route::prefix('cat')->group(function() {
		Route::get('index' , [
			'uses' => 'CatController@index',
			'as'   => 'admin.cat.index'
		]);
		Route::get('add' , [
			'uses' => 'CatController@getAdd',
			'as'   => 'admin.cat.add'
		]);
		Route::post('add',[
			'uses'=>'CatController@postAdd',
			'as'=>'admin.cat.add'
		]);

		Route::get('del/{id}',[
			'uses'=>'CatController@del',
			'as'=>'admin.cat.del'
		]);

		Route::get('edit/{id}', [
			'uses' => 'CatController@getEdit',
			'as'   => 'admin.cat.edit'
		]);
		Route::post('edit/{id}',[
			'uses'=>'CatController@postEdit',
			'as'=>'admin.cat.edit'
		]);
	});

	Route::prefix('user')->group(function(){
		Route::get('index',[
			'uses'=>'UserController@index',
			'as'=>'admin.user.index',
		]);
		Route::get('add',[
			'uses'=>'UserController@getAdd',
			'as'=>'admin.user.add'
		]);
		Route::post('add',[
			'uses'=>'UserController@postAdd',
			'as'=>'admin.user.add'
		]);
		Route::get('del/{id}',[
			'uses'=>'UserController@del',
			'as'=>'admin.user.del',
		]);
		Route::get('edit/{id}',[
			'uses'=>'UserController@getEdit',
			'as'=>'admin.user.edit'
		]);
		Route::post('edit/{id}',[
			'uses'=>'UserController@postEdit',
			'as'=>'admin.user.edit'
		]);

	});
	Route::prefix('news')->group(function(){
		Route::get('index',[
			'uses'=>'NewsController@index',
			'as'=>'admin.news.index',
		]);
		Route::get('add',[
			'uses'=>'NewsController@getAdd',
			'as'=>'admin.news.add',
		]);
		Route::post('add',[
			'uses'=>'NewsController@postAdd',
			'as'=>'admin.news.add',
		]);
		Route::get('edit',[
			'uses'=>'NewsController@getEdit',
			'as'=>'admin.news.edit',
		]);
		Route::post('edit',[
			'uses'=>'NewsController@postEdit',
			'as'=>'admin.news.edit',
		]);
		Route::get('del/{id}',[
			'uses'=>'NewsController@del',
			'as'=>'admin.news.del',
		]);
	});
});


//Trang Cnews
Route::namespace('Cnews')->group( function() {
	Route::get('' , [
		'uses' => 'IndexController@index',
		'as'   => 'cnews.index.index'
	]);
	Route::get('{name}-{id}' , [
		'uses' => 'NewsController@cat',
		'as'   => 'cnews.news.cat'
	]);

	Route::get('{name}-{id}.html' , [
		'uses' => 'NewsController@detail',
		'as'   => 'cnews.news.detail'
	]);

	Route::get('add' , [
		'uses' => 'NewsController@getAdd',
		'as'   => 'cnews.news.add'
	]);
});














