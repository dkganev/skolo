<?php

# Auth Routes

Route::get('/', 'AuthController@index');

Route::post('/', 'AuthController@postLogin')->middleware('guest');

Route::get('/logout', 'AuthController@logout')->middleware('auth');

# Auth Protected Routes
Route::group(['middleware' => 'auth'], function () {

Route::get('/casino', 'CasinoController@casino')->name('casino');
Route::post('/ajax_lang', 'AjaxLangController@index');
Route::post('/ajax_casino', 'AjaxCasinoController@index'); 
Route::post('/ajax_casinoBox', 'AjaxCasinoController@casinoBox'); 
Route::post('/ajax_NewGame', 'AjaxCasinoController@NewGame');

Route::get('/settings', 'TerminalsController@settings')->name('settings');

/**
 * Casino.Events
**/
Route::get('/casino/casino', 'CasinoController@getCasino');

Route::get('/casino/events', 'CasinoController@getEvents');

/**
 * Settings.Terminals Routes
**/

Route::get('/settings/terminals', 'TerminalsController@terminals');

Route::post('/machine/add', [
	'uses' => 'TerminalsController@addTerminal',
	'as'   => 'add.machine'
]);

Route::post('machine/update', 'TerminalsController@updateMachine');

Route::get('/exportTerminals', [
	'uses' => 'TerminalsController@exportTerminals',
	'as'   => 'export.terminals'
]);

Route::get('/resetps', 'TerminalsController@reset_ps');

# Settings.Game Server Routes
Route::get('/settings/gameservers', 'GameServersController@getGameServers')->name('gameservers');

Route::post('/settings/addgameclient', 'GameServersController@addGameClient')->name('add.gameclient');

Route::post('/settings/updategameclient', 'GameServersController@updateGameClient')->name('update.gameclient');

Route::post('/settings/addgame','GameServersController@addGame')->name('add.game');

Route::post('/settings/updategame', 'GameServersController@updateGame')->name('update.game');

Route::get('/settings/exportClients', 'GameServersController@exportClientGames')->name('export.clients');

Route::get('/settings/exportGames', 'GameServersController@exportGames')->name('export.games');

Route::post('/settings/addCategory', 'GameServersController@addCategory')->name('add.category');

Route::post('/settings/updateCategory', 'GameServersController@updateCategory')->name('update.category');

// Settings Casino Routes
Route::get('/settings/casinos', 'CasinosController@getCasinos')->name('casinos');

Route::post('settings/addcasino', 'CasinosController@addCasino')->name('add.casino');

Route::post('settings/updatecasino', 'CasinosController@updateCasino')->name('update.casino');

Route::get('/settings/exportCasinos', 'CasinosController@exportCasinos')->name('export.casinos');

# Settings Bill Types Routes
Route::get('/settings/billtypes', 'BillTypesController@getBillTypes')->name('billtypes');

Route::post('settings/addBill', 'BillTypesController@addBillType')->name('add.billtype');

Route::post('settings/updateBill', 'BillTypesController@updateBillType')->name('update.billtype');

Route::get('/settings/exportBillTypes', 'BillTypesController@exportBillTypes')->name('export.billtypes');

# Settings Languages Routes
Route::get('/settings/langs', 'LangsController@getLangs')->name('langs');

Route::post('settings/addLang', 'LangsController@addLanguage')->name('add.language');

Route::post('settings/updatelang', 'LangsController@updateLanguage')->name('update.language');

Route::get('/settings/exportLanguages', 'LangsController@exportLangs')->name('export.languages');

# Settings Errors Routes
Route::get('/settings/errors', 'ErrorsController@getErrors')->name('errors');

Route::post('/settings/addErrorLvl', 'ErrorsController@addErrorLevel');

Route::post('/settings/addErrorList', 'ErrorsController@addErrorList');


#Statistics

Route::get('/statistics', 'StatisticsController@index');

});