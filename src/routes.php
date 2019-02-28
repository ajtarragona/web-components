<?php

Route::group(['prefix' => 'ajtarragona/webcomponents','middleware' => ['web']], function () {
	
	//rutas de demo
	Route::get('/', 'Ajtarragona\WebComponents\Controllers\TestController@kitchen')->name('webcomponents.kitchen');
	Route::post('/', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenHandle')->name('webcomponents.kitchen.handle');
	Route::get('/modal', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenModal')->name('webcomponents.kitchen.modal');

	

	// rutas de session settings
	Route::get('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@getSetting')->name('webcomponents.setting.get');
	Route::put('setting/{name}', 'Ajtarragona\WebComponents\Controllers\SettingsController@setSetting')->name('webcomponents.setting.set');

	
	//rutas de  form ajax validation
	Route::post('validation','Ajtarragona\WebComponents\Controllers\ValidationController@validate')->name('webcomponents.formvalidator');


});
