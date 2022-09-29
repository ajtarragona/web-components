<?php

//authentication routes
Route::group(['middleware' => ['web','language']], function () {
	//TODO
	Route::get('/login', 'Ajtarragona\WebComponents\Controllers\Auth\SessionController@showLoginForm')->name('login');
	Route::post('/login', 'Ajtarragona\WebComponents\Controllers\Auth\SessionController@login')->name('tgn.dologin');
	
});

Route::group(['middleware' => ['web','language','auth']], function () {
	Route::post('/logout', 'Ajtarragona\WebComponents\Controllers\Auth\SessionController@logout')->name('tgn.logout');
});


Route::group(['prefix' => 'ajtarragona/webcomponents','middleware' => ['web','language']], function () {
	
	
	Route::get('/', 'Ajtarragona\WebComponents\Controllers\DocsController@docs')->name('webcomponents.home');
	
	

	//rutas de Documentación
	Route::get('/docs/testcombo', 'Ajtarragona\WebComponents\Controllers\DocsController@testCombo')->name('webcomponents.combo');
	Route::get('/docs/testcombohtml', 'Ajtarragona\WebComponents\Controllers\DocsController@testComboHtml')->name('webcomponents.combohtml');
	Route::get('/docs/testcombogroups', 'Ajtarragona\WebComponents\Controllers\DocsController@testComboGroups')->name('webcomponents.combogroups');
	Route::get('/docs/mentions', 'Ajtarragona\WebComponents\Controllers\DocsController@mentionsCombo')->name('webcomponents.mentions');
	Route::get('/docs/modal', 'Ajtarragona\WebComponents\Controllers\DocsController@docsModal')->name('webcomponents.docs.modal');
	Route::post('/docs/mapmarkers', 'Ajtarragona\WebComponents\Controllers\DocsController@mapmarkers')->name('webcomponents.mapmarkers');
	Route::get('/docs/mapmarkers/infobox/{id?}', 'Ajtarragona\WebComponents\Controllers\DocsController@markerInfobox')->name('webcomponents.markerinfobox');
	Route::get('/marker', 'Ajtarragona\WebComponents\Controllers\DocsController@markerImage')->name('webcomponents.markerimage');
	
	Route::post('/docs/showrequest', 'Ajtarragona\WebComponents\Controllers\DocsController@docsShowRequest')->name('webcomponents.docs.showrequest');
	Route::get('/docs/combo/users', 'Ajtarragona\WebComponents\Controllers\DocsController@userscombo')->name('webcomponents.docs.userscombo');
	Route::get('/docs/combo/tags', 'Ajtarragona\WebComponents\Controllers\DocsController@tagscombo')->name('webcomponents.docs.tagscombo');

	Route::get('/docs/{page?}', 'Ajtarragona\WebComponents\Controllers\DocsController@docs')->name('webcomponents.docs');
	Route::post('/docs/{page?}', 'Ajtarragona\WebComponents\Controllers\DocsController@docsHandle')->name('webcomponents.docs.handle');
	
	
	

	//rutas de Demo
	Route::group(['prefix' => 'demo','middleware' => ['language']], function () {
		Route::get('/', 'Ajtarragona\WebComponents\Controllers\DemoController@demo')->name('webcomponents.demo');
	});

	
	Route::group(['prefix' => 'demo','middleware' => ['auth','language']], function () {
		
		//items 
		Route::group(['prefix' => 'items'], function () {

			Route::get('/', 'Ajtarragona\WebComponents\Controllers\ItemsController@index')->name('webcomponents.demo.items.index');
			Route::get('/create', 'Ajtarragona\WebComponents\Controllers\ItemsController@create')->name('webcomponents.demo.items.create');
			
			Route::get('/modal/create', 'Ajtarragona\WebComponents\Controllers\ItemsController@itemmodal')->name('webcomponents.demo.items.modal.create');

			Route::get('/modal/{item_id}', 'Ajtarragona\WebComponents\Controllers\ItemsController@itemmodal')->name('webcomponents.demo.items.modal');

			Route::post('/filter', 'Ajtarragona\WebComponents\Controllers\ItemsController@filter')->name('webcomponents.demo.items.filter');

			Route::post('/', 'Ajtarragona\WebComponents\Controllers\ItemsController@store')->name('webcomponents.demo.items.store');
			
			Route::get('/{item}', 'Ajtarragona\WebComponents\Controllers\ItemsController@show')->name('webcomponents.demo.items.show');
			Route::get('/{item}/edit', 'Ajtarragona\WebComponents\Controllers\ItemsController@edit')->name('webcomponents.demo.items.edit');
			Route::put('/{item}', 'Ajtarragona\WebComponents\Controllers\ItemsController@update')->name('webcomponents.demo.items.update');
			Route::delete('/{item}', 'Ajtarragona\WebComponents\Controllers\ItemsController@destroy')->name('webcomponents.demo.items.destroy');
		});


		//types 
		Route::group(['prefix' => 'types'], function () {

			Route::get('/', 'Ajtarragona\WebComponents\Controllers\TypesController@index')->name('webcomponents.demo.types.index');
			Route::get('/create', 'Ajtarragona\WebComponents\Controllers\TypesController@create')->name('webcomponents.demo.types.create');
			
			Route::get('/modal/create', 'Ajtarragona\WebComponents\Controllers\TypesController@typemodal')->name('webcomponents.demo.types.modal.create');

			Route::get('/modal/{type_id}', 'Ajtarragona\WebComponents\Controllers\TypesController@typemodal')->name('webcomponents.demo.types.modal');

			Route::post('/filter', 'Ajtarragona\WebComponents\Controllers\TypesController@filter')->name('webcomponents.demo.types.filter');

			Route::post('/', 'Ajtarragona\WebComponents\Controllers\TypesController@store')->name('webcomponents.demo.types.store');
			
			Route::get('/{type}', 'Ajtarragona\WebComponents\Controllers\TypesController@show')->name('webcomponents.demo.types.show');
			Route::get('/{type}/edit', 'Ajtarragona\WebComponents\Controllers\TypesController@edit')->name('webcomponents.demo.types.edit');
			Route::put('/{type}', 'Ajtarragona\WebComponents\Controllers\TypesController@update')->name('webcomponents.demo.types.update');
			Route::delete('/{type}', 'Ajtarragona\WebComponents\Controllers\TypesController@destroy')->name('webcomponents.demo.types.destroy');
		});
	    
	});

	//Route::post('/demo', 'Ajtarragona\WebComponents\Controllers\DemoController@demoHandle')->name('webcomponents.demo.handle');
	


	// rutas de session settings
	Route::get('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@getSetting')->name('webcomponents.setting.get');
	Route::put('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@setSetting')->name('webcomponents.setting.set');

	
	//rutas de  form ajax validation
	Route::post('validation','Ajtarragona\WebComponents\Controllers\ValidationController@validate')->name('webcomponents.formvalidator');


});
