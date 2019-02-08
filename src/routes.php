<?php

Route::group(['prefix' => 'ajtarragona/webcomponents','middleware' => ['web']], function () {
	Route::get('/', 'Ajtarragona\WebComponents\Controllers\TestController@kitchen')->name('webcomponents.kitchen');
	Route::post('/', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenHandle')->name('webcomponents.kitchen.handle');
	Route::get('/modal', 'Ajtarragona\WebComponents\Controllers\TestController@kitchenModal')->name('webcomponents.kitchen.modal');
});
