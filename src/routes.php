<?php

Route::group(['prefix' => 'ajtarragona/webcomponents','middleware' => ['web']], function () {
	
	//rutas de demo
	Route::get('/', 'Ajtarragona\WebComponents\Controllers\TestController@home')->name('webcomponents.home');
	
	Route::get('/kitchen', 'Ajtarragona\WebComponents\Controllers\TestController@kitchen')->name('webcomponents.kitchen');
	Route::post('/kitchen', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenHandle')->name('webcomponents.kitchen.handle');
	Route::get('/modal', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenModal')->name('webcomponents.kitchen.modal');
	
	
	Route::get('/docs/testcombo', 'Ajtarragona\WebComponents\Controllers\DocsController@testCombo')->name('webcomponents.combo');
	Route::get('/docs/{page?}', 'Ajtarragona\WebComponents\Controllers\DocsController@docs')->name('webcomponents.docs');
	Route::post('/docs/{page?}', 'Ajtarragona\WebComponents\Controllers\DocsController@docsHandle')->name('webcomponents.docs.handle');

	

	// rutas de session settings
	Route::get('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@getSetting')->name('webcomponents.setting.get');
	Route::put('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@setSetting')->name('webcomponents.setting.set');

	
	//rutas de  form ajax validation
	Route::post('validation','Ajtarragona\WebComponents\Controllers\ValidationController@validate')->name('webcomponents.formvalidator');


});
