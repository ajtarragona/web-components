<?php

Route::group(['prefix' => 'ajtarragona/webcomponents'], function () {
	Route::get('/', 'Ajtarragona\WebComponents\Controllers\TestController@kitchen')->name('webcomponents.kitchen');
});
