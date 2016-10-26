<?php
// BINGO


# Auth Routes

Route::get('/', 'AuthController@index');

Route::post('/', 'AuthController@postLogin')->middleware('guest');

Route::get('/logout', 'AuthController@logout')->middleware('auth');

# Auth Protected Routes
Route::group(['middleware' => 'auth'], function () {

Route::get('/casino', 'CasinoController@index');


Route::post('/ajax_casino', 'Casino\AjaxCasinoController@index'); 
Route::post('/ajax_casinoBox', 'Casino\AjaxCasinoController@casinoBox'); 
Route::post('/ajax_NewGame', 'Casino\AjaxCasinoController@NewGame');

Route::get('/settings', 'Settings\TerminalsController@settings')->name('settings');

/**
 * Casino.Events
**/
Route::get('/casino/casino', 'CasinoController@getCasino');

Route::get('/casino/events', 'CasinoController@getEvents');

/**
 * Settings.Terminals Routes
**/

Route::get('/settings/terminals', 'Settings\TerminalsController@terminals');

Route::post('/machine/add', 'Settings\TerminalsController@addTerminal')->name('add.machine');

Route::post('machine/update', 'Settings\TerminalsController@updateMachine');

Route::get('/exportTerminals', 'Settings\TerminalsController@exportTerminals')->name('export.terminals');

Route::get('/resetps', 'Settings\TerminalsController@reset_ps');

# Settings.Game Server Routes
Route::get('/settings/gameservers', 'Settings\GameServersController@getGameServers')->name('gameservers');

Route::post('/settings/addgameclient', 'Settings\GameServersController@addGameClient')->name('add.gameclient');

Route::post('/settings/updategameclient', 'Settings\GameServersController@updateGameClient')->name('update.gameclient');

Route::post('/settings/addgame','Settings\GameServersController@addGame')->name('add.game');

Route::post('/settings/updategame', 'Settings\GameServersController@updateGame')->name('update.game');

Route::get('/settings/exportClients', 'Settings\GameServersController@exportClientGames')->name('export.clients');

Route::get('/settings/exportGames', 'Settings\GameServersController@exportGames')->name('export.games');

Route::post('/settings/addCategory', 'Settings\GameServersController@addCategory')->name('add.category');

Route::post('/settings/updateCategory', 'Settings\GameServersController@updateCategory')->name('update.category');

// Settings Casino Routes
Route::get('/settings/casinos', 'Settings\CasinosController@getCasinos')->name('casinos');

Route::post('settings/addcasino', 'Settings\CasinosController@addCasino')->name('add.casino');

Route::post('settings/updatecasino', 'Settings\CasinosController@updateCasino')->name('update.casino');

Route::get('/settings/exportCasinos', 'Settings\CasinosController@exportCasinos')->name('export.casinos');

# Settings Bill Types Routes
Route::get('/settings/billtypes', 'Settings\BillTypesController@getBillTypes')->name('billtypes');

Route::post('settings/addBill', 'Settings\BillTypesController@addBillType')->name('add.billtype');

Route::post('settings/updateBill', 'Settings\BillTypesController@updateBillType')->name('update.billtype');

Route::get('/settings/exportBillTypes', 'Settings\BillTypesController@exportBillTypes')->name('export.billtypes');

# Settings Languages Routes
Route::get('/settings/langs', 'Settings\LangsController@getLangs')->name('langs');

Route::post('settings/addLang', 'Settings\LangsController@addLanguage')->name('add.language');

Route::post('settings/updatelang', 'Settings\LangsController@updateLanguage')->name('update.language');

Route::get('/settings/exportLanguages', 'Settings\LangsController@exportLangs')->name('export.languages');

# Localization Routes

Route::post('/localize', 'LocalizationController@index');

# Settings Errors Routes
Route::get('/settings/errors', 'Settings\ErrorsController@getErrors')->name('errors');

Route::post('/settings/addErrorLvl', 'Settings\ErrorsController@addErrorLevel');

Route::post('/settings/addErrorList', 'Settings\ErrorsController@addErrorList');

# Settings Bingo Routes

Route::get('/settings/bingo/mainconfig', 'Settings\BingoController@main_config');
Route::post('/settings/bingo/mainconfig/edit', 'Settings\BingoController@main_config_edit');

Route::get('/settings/bingo/mybonus', 'Settings\BingoController@my_bonus');
Route::post('/settings/bingo/mybonus/edit', 'Settings\BingoController@my_bonus_edit');

Route::get('/settings/bingo/maxballs', 'Settings\BingoController@max_balls');
Route::post('/settings/bingo/maxballs/store', 'Settings\BingoController@max_balls_store');
Route::post('/settings/bingo/maxballs/destroy', 'Settings\BingoController@max_balls_destroy');

#Statistics

Route::get('statistics', 'StatisticsController@index');

Route::get('statistics/terminals', 'StatisticsController@terminals_statistics');

Route::get('statistics/games', 'StatisticsController@games_statistics');
Route::get('statistics/history', 'StatisticsController@history_statistics');
//Route::get('statistics/{id}', 'StatisticsController@navbar');  ajax_statBingoHistory 
Route::post('/ajax_statBingoHistory', 'StatisticsController@ajax_statBingoHistory');

Route::post('/ajax_statBingoHistoryTickets', 'StatisticsController@ajax_statBingoHistoryTickets');

});