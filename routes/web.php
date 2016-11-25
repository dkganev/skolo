<?php
/**
 * AUTHENTICATION
 */
Route::get('/', 'AuthController@index');

Route::post('/', 'AuthController@postLogin')->middleware('guest');

Route::get('/logout', 'AuthController@logout')->middleware('auth');
// This will be the route that checks expiration!
Route::post('session/ajaxCheck','AuthController@ajaxCheck');
/**
 * AUTH MIDDLEWARE
 */
Route::group(['middleware' => ['web', 'resetLastActive']], function () {

/**
 * CASINO / PREVIEW
**/
Route::get('/casino', 'Casino\CasinoController@index');
Route::post('/ajax_casino', 'Casino\AjaxCasinoController@index'); 
Route::post('/ajax_casinoBox', 'Casino\AjaxCasinoController@casinoBox'); 
Route::post('/ajax_NewGame', 'Casino\AjaxCasinoController@NewGame');
Route::get('/casino/casino', 'Casino\CasinoController@getCasino');
Route::get('/casino/events', 'Casino\CasinoController@getEvents'); // CASINO EVENTS
Route::get('/api/casino/events', 'Casino\CasinoController@events_index');
Route::get('/export2excelEvents', 'Casino\CasinoController@export2excelEvents')->name('export2excelEvents');

/**
 * CASINO / BINGO PLAYLIST
**/
Route::get('/casino/playlist', 'Casino\BingoPlaylistController@index_playlist');

Route::get('/casino/templates', 'Casino\BingoPlaylistController@index_templates');
Route::post('/casino/playlist/store', 'Casino\BingoPlaylistController@playlist_store');
Route::post('/casino/playlist/load', 'Casino\BingoPlaylistController@load_template');

Route::post('/casino/templates/store', 'Casino\BingoPlaylistController@template_store');
Route::post('/casino/templates/destroy', 'Casino\BingoPlaylistController@template_destroy');

Route::post('/casino/template/game/store', 'Casino\BingoPlaylistController@template_game_store');

/**
 * SETTINGS / TERMINALS
 */
Route::get('/settings', 'Settings\TerminalsController@settings')->name('settings');
Route::get('/settings/terminals', 'Settings\TerminalsController@terminals');
Route::post('/machine/add', 'Settings\TerminalsController@addTerminal')->name('add.machine');
Route::post('machine/update', 'Settings\TerminalsController@updateMachine');
Route::get('/exportTerminals', 'Settings\TerminalsController@exportTerminals')->name('export.terminals');
Route::get('/resetps', 'Settings\TerminalsController@reset_ps');

Route::post('/terminal/destroy', 'Settings\TerminalsController@destroy_ps');

/**
 * SETTINGS / GAME SERVERS
 */
Route::get('/settings/gameservers', 'Settings\GameServersController@getGameServers')->name('gameservers');
Route::post('/settings/addgameclient', 'Settings\GameServersController@addGameClient')->name('add.gameclient');
Route::post('/settings/updategameclient', 'Settings\GameServersController@updateGameClient')->name('update.gameclient');
Route::post('/settings/addgame','Settings\GameServersController@addGame')->name('add.game');
Route::post('/settings/updategame', 'Settings\GameServersController@updateGame')->name('update.game');
Route::get('/settings/exportClients', 'Settings\GameServersController@exportClientGames')->name('export.clients');
Route::get('/settings/exportGames', 'Settings\GameServersController@exportGames')->name('export.games');
Route::post('/settings/addCategory', 'Settings\GameServersController@addCategory')->name('add.category');
Route::post('/settings/updateCategory', 'Settings\GameServersController@updateCategory')->name('update.category');

/**
 * SETTINGS / CASINO
 */
Route::get('/settings/casinos', 'Settings\CasinosController@getCasinos')->name('casinos');
Route::post('settings/addcasino', 'Settings\CasinosController@addCasino')->name('add.casino');
Route::post('settings/updatecasino', 'Settings\CasinosController@updateCasino')->name('update.casino');
Route::get('/settings/exportCasinos', 'Settings\CasinosController@exportCasinos')->name('export.casinos');

/**
 * SETTINGS / USERS
 */
Route::get('/settings/users', 'Settings\UserController@index');
Route::post('/settings/users/store', 'Settings\UserController@store');
Route::post('/settings/users/edit', 'Settings\UserController@edit');


/**
 * SETTINGS / BILL TYPES
 */
Route::get('/settings/billtypes', 'Settings\BillTypesController@getBillTypes')->name('billtypes');
Route::post('settings/addBill', 'Settings\BillTypesController@addBillType')->name('add.billtype');
Route::post('settings/updateBill', 'Settings\BillTypesController@updateBillType')->name('update.billtype');
Route::get('/settings/exportBillTypes', 'Settings\BillTypesController@exportBillTypes')->name('export.billtypes');

/**
 * SETTINGS / LANGUAGES
 */
Route::get('/settings/langs', 'Settings\LangsController@getLangs')->name('langs');
Route::post('settings/addLang', 'Settings\LangsController@addLanguage')->name('add.language');
Route::post('settings/updatelang', 'Settings\LangsController@updateLanguage')->name('update.language');
Route::get('/settings/exportLanguages', 'Settings\LangsController@exportLangs')->name('export.languages');

/**
 * SETTINGS ERRORS
 */
Route::get('/settings/errors', 'Settings\ErrorsController@getErrors')->name('errors');
Route::post('/settings/addErrorLvl', 'Settings\ErrorsController@addErrorLevel');
Route::post('/settings/addErrorList', 'Settings\ErrorsController@addErrorList');

/**
 * SETTINGS / BINGO
 */
Route::get('/settings/bingo/mainconfig', 'Settings\BingoController@main_config');
Route::post('/settings/bingo/mainconfig/edit', 'Settings\BingoController@main_config_edit');

Route::get('/settings/bingo/mybonus', 'Settings\BingoController@my_bonus');
Route::post('/settings/bingo/mybonus/edit', 'Settings\BingoController@my_bonus_edit');

Route::get('/settings/bingo/maxballs', 'Settings\BingoController@max_balls_index');
Route::post('/settings/bingo/maxballs/store', 'Settings\BingoController@max_balls_store');
Route::post('/settings/bingo/maxballs/edit', 'Settings\BingoController@max_balls_edit');
Route::post('/settings/bingo/maxballs/destroy', 'Settings\BingoController@max_balls_destroy');

Route::get('/settings/bingo/sphereconfig', 'Settings\BingoController@sphere_config_index');
Route::post('/settings/bingo/sphereconfig/edit', 'Settings\BingoController@sphere_config_edit');

Route::get('/settings/bingo/accconfig', 'Settings\BingoController@acc_config_index');
Route::post('/settings/bingo/accconfig/edit', 'Settings\BingoController@acc_config_edit');

/**
 * SETTINGS / BLACKJACK
 */
Route::get('/settings/blackjack/mainconfig', 'Settings\BlackjackController@main_config_index');
Route::get('/settings/blackjack/tables', 'Settings\BlackjackController@tables_index');

Route::post('/settings/blackjack/mainconfig/edit', 'Settings\BlackjackController@main_config_edit');
Route::post('/settings/blackjack/table/edit', 'Settings\BlackjackController@table_edit');

Route::get('/settings/blackjack/accconfig', 'Settings\BlackjackController@acc_config_index');
Route::post('/settings/blackjack/accconfig/edit', 'Settings\BlackjackController@acc_config_edit');

/**
 * SETTINGS / ROULETTE
 */
Route::get('/settings/roulette1/wheelsettings', 'Settings\RouletteController@wheel_settings_index');
Route::post('/settings/roulette1/wheelsettings/edit', 'Settings\RouletteController@wheel_settings_edit');
Route::get('/settings/roulette1/wheelconfig', 'Settings\RouletteController@wheel_config_index');
Route::post('/settings/roulette1/wheelconfig/edit', 'Settings\RouletteController@wheel_config_edit');

Route::get('/settings/roulette1/psconfig', 'Settings\RouletteController@ps_config_index');
Route::post('/settings/roulette1/psconfig/edit', 'Settings\RouletteController@ps_config_edit');

Route::get('/settings/roulette1/accconfig', 'Settings\RouletteController@acc_config_index');
Route::post('/settings/roulette1/accconfig/edit', 'Settings\RouletteController@acc_config_edit');

Route::get('/settings/roulette2/wheelsettings', 'Settings\RouletteTwoController@wheel_settings_index');
Route::post('/settings/roulette2/wheelsettings/edit', 'Settings\RouletteTwoController@wheel_settings_edit');
Route::get('/settings/roulette2/wheelconfig', 'Settings\RouletteTwoController@wheel_config_index');
Route::post('/settings/roulette2/wheelconfig/edit', 'Settings\RouletteTwoController@wheel_config_edit');

Route::get('/settings/roulette2/psconfig', 'Settings\RouletteTwoController@ps_config_index');
Route::post('/settings/roulette2/psconfig/edit', 'Settings\RouletteTwoController@ps_config_edit');

Route::get('/settings/roulette2/accconfig', 'Settings\RouletteTwoController@acc_config_index');
Route::post('/settings/roulette2/accconfig/edit', 'Settings\RouletteTwoController@acc_config_edit');

/**
 * LOCALIZATION
 */
Route::post('/localize', 'LocalizationController@index');

/**
 * STATISTICS
 */
Route::get('statistics', 'StatisticsController@index');

Route::get('statistics/terminals', 'StatisticsController@terminals_statistics');
Route::get('export2excelTerminalsStatistics', 'StatisticsController@export2excelTerminalsStatistics')->name('export2excelTerminalsStatistics');

Route::get('statistics/games', 'StatisticsController@games_statistics');
Route::get('export2excelGamesStatistics', 'StatisticsController@export2excelGamesStatistics')->name('export2excelGamesStatistics');

//Route::get('statistics/{id}', 'StatisticsController@navbar');  

Route::get('statistics/history', 'StatisticsController@history_statistics');
Route::post('/ajax_statBingoHistory', 'StatisticsController@ajax_statBingoHistory');
Route::post('/ajax_statBingoHistoryTickets', 'StatisticsController@ajax_statBingoHistoryTickets');
Route::get('/export2excelBingo', 'StatisticsController@export2excelBingo')->name('export2excelBingo');

Route::get('statistics/historyRoulette', 'StatisticsController@historyRoulette_statistics');
Route::post('/ajax_statRouletteHistory', 'StatisticsController@ajax_statRouletteHistory');
Route::post('/ajax_nextPrevRouletteHistory', 'StatisticsController@ajax_nextPrevRouletteHistory');
Route::post('/ajax_sortRouletteHistory', 'StatisticsController@ajax_sortRouletteHistory');
Route::get('/export2excelR', 'StatisticsController@export2excelR')->name('export2excelR');


Route::get('statistics/historyBlackjack', 'StatisticsController@historyBlackjack');
Route::post('/ajax_statBJHistory', 'StatisticsController@ajax_statBJHistory');
Route::post('/ajax_nextPrevBJHistory', 'StatisticsController@ajax_nextPrevBJHistory');
Route::post('/ajax_sortBJHistory', 'StatisticsController@ajax_sortBJHistory');
Route::get('/export2excelBJ', 'StatisticsController@export2excelBJ')->name('export2excelBJ');

});