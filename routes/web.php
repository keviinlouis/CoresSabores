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

Route::get('/', 'HomeController@index');

Route::group(['prefix'=> 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')->name('adminHome');

//Header
    //Mostrar Header
    Route::get('headers', 'HeaderController@index')->name('headerHome');
    //Mostrar Headers Ajax
    Route::get('headersAjax', 'HeaderController@ajaxHeaders')->name('ajaxHeaders');

    //Pagina para Criacao de Header
    Route::get('header/new', 'HeaderController@create')->name('newHeader');
    //Storage Header
    Route::post('header/storage', 'HeaderController@storage')->name('storageHeader');

    //Edit Header
    Route::post('header/edit/{header}', 'HeaderController@edit')->name('editHeader');

    //Update Header
    Route::post('header/update', 'HeaderController@update')->name('updateHeader');

    //Delete Header
    Route::delete('header/delete/{header}', 'HeaderController@destroy')->name('deleteHeader');

    //Ativar Header
    Route::get('header/active/{header}', 'HeaderController@active')->name('activeHeader');
});
