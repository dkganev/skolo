<?php
/**
 * AUTHENTICATION
 */

Route::get('/', 'AuthController@index');

Route::post('/', 'AuthController@postLogin')->middleware('guest');

Route::get('/logout', 'AuthController@logout')->middleware('auth');
// This will be the route that checks expiration!
Route::post('session/ajaxCheck','AuthController@ajaxCheck')->middleware('auth');
/**
 * AUTH MIDDLEWARE
 */
Route::group(['middleware' => ['web', 'resetLastActive' , 'auth']], function () {
//Route::group(array('middleware' => 'auth'), function(){

    /**
     * LOCALIZATION
     */
    Route::post('/localize', 'LocalizationController@index');
    Route::post('ajax_casino', 'Casino\AjaxCasinoController@ajax_casino');
    //Route::post('/test123', 'Settings\PBS@test1235'); 
    //Route::get('/test123', 'Settings\PBS@test123'); 

    /**
     * CASINO / PREVIEW
    **/
    Route::get('/casino', 'Casino\CasinoController@index');
    Route::post('/ajax_casinoBox', 'Casino\AjaxCasinoController@casinoBox'); 
    Route::post('/ajax_NewGame', 'Casino\AjaxCasinoController@NewGame');
    Route::get('/casino/casino', 'Casino\CasinoController@getCasino');
    Route::get('/casino/events', 'Casino\CasinoController@getEvents'); // CASINO EVENTS
    Route::get('/export2excelEvents', 'Casino\CasinoController@export2excelEvents')->name('export2excelEvents');

    /**
     * CASINO / BINGO PLAYLIST
    **/
    Route::get('/casino/playlist', 'Casino\BingoPlaylistController@index_playlist');
    Route::post('/casino/playlist/load', 'Casino\BingoPlaylistController@load_template');


    Route::post('/casino/playlist/store', 'Casino\BingoPlaylistController@playlist_store');
    Route::post('/casino/playlist/destroy', 'Casino\BingoPlaylistController@playlist_destroy');
    Route::post('/casino/playlist/top', 'Casino\BingoPlaylistController@playlist_top');
    Route::post('/casino/playlist/up', 'Casino\BingoPlaylistController@playlist_up');
    Route::post('/casino/playlist/down', 'Casino\BingoPlaylistController@playlist_down');

    Route::get('/casino/templates', 'Casino\BingoPlaylistController@index_templates');
    Route::post('/casino/templates/store', 'Casino\BingoPlaylistController@template_store');
    Route::post('/casino/templates/destroy', 'Casino\BingoPlaylistController@template_game_destroy');
    Route::post('/casino/templates/destroyRow', 'Casino\BingoPlaylistController@template_destroyRow');
    Route::post('/casino/templates/top', 'Casino\BingoPlaylistController@template_top');
    Route::post('/casino/templates/up', 'Casino\BingoPlaylistController@template_up');
    Route::post('/casino/templates/down', 'Casino\BingoPlaylistController@template_down');
    Route::post('/casino/template/game/store', 'Casino\BingoPlaylistController@template_game_store');

    /**
     * SETTINGS / TERMINALS
     */
    Route::get('/settings', 'Settings\TerminalsController@settings')->name('settings');
    Route::get('/settings/terminals', 'Settings\TerminalsController@terminals');
    Route::post('/terminal/store', 'Settings\TerminalsController@addTerminal');
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
    Route::get('/settings/category/export', 'Settings\GameServersController@exportCategories');

    /**
     * SETTINGS / CASINO
     */
    Route::get('/settings/casinos', 'Settings\CasinosController@getCasinos')->name('casinos');
    Route::post('/settings/casino/store', 'Settings\CasinosController@addCasino');
    Route::post('/settings/casino/update', 'Settings\CasinosController@updateCasino');
    Route::get('/settings/exportCasinos', 'Settings\CasinosController@exportCasinos')->name('export.casinos');

    /**
     * SETTINGS / USERS
     */
    Route::get('/settings/users', 'Settings\UserController@index');
    Route::post('/settings/users/store', 'Settings\UserController@store');
    Route::post('/settings/users/edit', 'Settings\UserController@edit');
    Route::post('/settings/users/destroy', 'Settings\UserController@destroy');
    Route::get('/settings/users/export', 'Settings\UserController@export_users');

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
    Route::post('settings/updateLang', 'Settings\LangsController@updateLanguage')->name('update.language');
    Route::post('/settings/languages/destroy', 'Settings\LangsController@destroy');
    Route::get('/settings/exportLanguages', 'Settings\LangsController@exportLangs')->name('export.languages');

    /**
     * SETTINGS ERRORS
     */
    Route::get('/settings/errors', 'Settings\ErrorsController@getErrors')->name('errors');
    Route::get('/settings/errors-list-export', 'Settings\ErrorsController@export_errors_list');
    Route::get('/settings/error-levels-export', 'Settings\ErrorsController@export_errors_level');
    Route::get('/settings/errors', 'Settings\ErrorsController@getErrors')->name('errors');
    Route::post('/settings/addErrorLvl', 'Settings\ErrorsController@addErrorLevel');
    Route::post('/settings/addErrorList', 'Settings\ErrorsController@addErrorList');

    /**
     * SETTINGS / BINGO
     */
    Route::get('/settings/bingo/mainconfig', 'Settings\BingoController@main_config');
    Route::post('/settings/bingo/mainconfig/edit', 'Settings\BingoController@main_config_edit');
    Route::get('/settings/bingo/main-config-export', 'Settings\BingoController@export_main_config');
    Route::post('/settings/bingo/mainconfig/cancel-game', 'Settings\BingoController@cancel_game');


    Route::get('/settings/bingo/mybonus', 'Settings\BingoController@my_bonus');
    Route::post('/settings/bingo/mybonus/edit', 'Settings\BingoController@my_bonus_edit');
    Route::get('/settings/bingo/mybonus-export', 'Settings\BingoController@my_bonus_export');

    Route::get('/settings/bingo/maxballs', 'Settings\BingoController@max_balls_index');
    Route::post('/settings/bingo/maxballs/store', 'Settings\BingoController@max_balls_store');
    Route::post('/settings/bingo/maxballs/edit', 'Settings\BingoController@max_balls_edit');
    Route::post('/settings/bingo/maxballs/destroy', 'Settings\BingoController@max_balls_destroy');
    Route::get('/settings/bingo/maxballs/export', 'Settings\BingoController@max_balls_export');



    Route::get('/settings/bingo/sphereconfig', 'Settings\BingoController@sphere_config_index');
    Route::post('/settings/bingo/sphereconfig/edit', 'Settings\BingoController@sphere_config_edit');

    Route::get('/settings/bingo/accconfig', 'Settings\BingoController@acc_config_index');
    Route::post('/settings/bingo/accconfig/edit', 'Settings\BingoController@acc_config_edit');

    /**
     * SETTINGS / BLACKJACK
     */
    Route::get('/settings/blackjack/mainconfig', 'Settings\BlackjackController@main_config_index');
    Route::get('/settings/blackjack/tables', 'Settings\BlackjackController@tables_index');
    Route::get('/settings/blackjack/mainconfig/export', 'Settings\BlackjackController@main_config_export');

    Route::post('/settings/blackjack/mainconfig/edit', 'Settings\BlackjackController@main_config_edit');
    Route::post('/settings/blackjack/table/edit', 'Settings\BlackjackController@table_edit');
    Route::post('/settings/blackjack/table/enabled', 'Settings\BlackjackController@enabled_tables');
    Route::get('/settings/blackjack/table/export', 'Settings\BlackjackController@tables_export');
    
    Route::get('/settings/blackjack/psconfig', 'Settings\BlackjackController@ps_config_index');
    Route::post('/settings/blackjack/psconfig/edit', 'Settings\BlackjackController@ps_config_edit');
    
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
     * SETTINGS / SLOTS
     */
    Route::get('/settings/slots/psconfig', 'Settings\SlotsController@psconfig_index');
    Route::post('/SlotsChaneGame', 'Settings\SlotsController@SlotsChaneGame');
    Route::post('/statistics/psconfUpdate', 'Settings\SlotsController@psconfUpdate');

    

    /**
     * SETTINGS / PBS
     */
    Route::get('/settings/PBS/BonusPoints2Money', 'Settings\PBS@BonusPoints2Money');
    Route::post('/ajax_BonusPoints2Money', 'Settings\PBS@ajax_BonusPoints2Money');
    Route::get('/export2excelBonusPoints2Money', 'Settings\PBS@export2excelBonusPoints2Money')->name('export2excelBonusPoints2Money');

    Route::get('/settings/PBS/Bet2BonusPoints', 'Settings\PBS@Bet2BonusPoints');
    Route::post('/ajax_EditBet2BonusPoints', 'Settings\PBS@EditBet2BonusPoints');
    Route::post('/ajax_RemoveBet2BonusPoints', 'Settings\PBS@RemoveBet2BonusPoints');
    Route::post('/ajax_SaveAddBet2BonusPoints', 'Settings\PBS@SaveAddBet2BonusPoints');
    Route::get('/export2excelBet2BonusPoints', 'Settings\PBS@export2excelBet2BonusPoints')->name('export2excelBet2BonusPoints');

    Route::get('/settings/PBS/CardTypeBonusPeriod', 'Settings\PBS@CardTypeBonusPeriod'); 
    Route::post('/ajax_CardTypeBonusPeriod', 'Settings\PBS@ajax_CardTypeBonusPeriod');
    
    /**
     * SETTINGS / System
     */
    Route::get('/settings/System', 'Settings\System@system');


    /**
     * STATISTICS / GAME-MACHINE 
     */

    Route::get('/statistics/game-machine-blackjack', 'Statistics\GameMachineStatisticsController@index_blackjack');
    Route::get('/statistics/game-machine-blackjack/export', 'Statistics\GameMachineStatisticsController@export_gm_bj')->name('export2excelGameBJ');

    Route::get('/statistics/game-machine-bingo', 'Statistics\GameMachineStatisticsController@index_bingo');
    Route::get('/statistics/game-machine-bingo/export', 'Statistics\GameMachineStatisticsController@export_gm_bingo')->name('export2excelGameBingo');

    Route::get('/statistics/game-machine-rl1', 'Statistics\GameMachineStatisticsController@index_rlt1');
    Route::get('/statistics/game-machine-rl1/export', 'Statistics\GameMachineStatisticsController@export_gm_rlt1')->name('export2excelGameR1');

    Route::get('/statistics/game-machine-rl2', 'Statistics\GameMachineStatisticsController@index_rlt2');
    Route::get('/statistics/game-machine-rl2/export', 'Statistics\GameMachineStatisticsController@export_gm_rlt2')->name('export2excelGameR2');

    /**
     * STATISTICS
     */
    Route::get('statistics', 'StatisticsController@index');

    Route::get('statistics/terminals', 'StatisticsController@terminals_statistics');
    Route::post('statistics/terminals', 'StatisticsController@terminals_statistics');
    Route::get('export2excelTerminalsStatistics', 'StatisticsController@export2excelTerminalsStatistics')->name('export2excelTerminalsStatistics');

    Route::get('statistics/games', 'StatisticsController@games_statistics');
    Route::get('export2excelGamesStatistics', 'StatisticsController@export2excelGamesStatistics')->name('export2excelGamesStatistics');

    Route::get('statistics/history', 'StatisticsController@history_statistics');
    Route::post('/ajax_statBingoHistory', 'StatisticsController@ajax_statBingoHistory');
    Route::post('/ajax_statBingoHistoryTickets', 'StatisticsController@ajax_statBingoHistoryTickets');
    Route::get('/export2excelBingo', 'StatisticsController@export2excelBingo')->name('export2excelBingo');

    Route::get('statistics/historyRoulette', 'StatisticsController@historyRoulette_statistics');
    Route::post('/ajax_statRouletteHistory', 'StatisticsController@ajax_statRouletteHistory');
    Route::post('/ajax_nextPrevRouletteHistory', 'StatisticsController@ajax_nextPrevRouletteHistory');
    Route::post('/ajax_sortRouletteHistory', 'StatisticsController@ajax_sortRouletteHistory');
    Route::get('/export2excelR', 'StatisticsController@export2excelR')->name('export2excelR');
    Route::get('statistics/winRTL1', 'StatisticsController@winRTL1');
    

    Route::get('statistics/historyRoulette2', 'StatisticsController@historyRoulette2_statistics');
    Route::post('/ajax_statRoulette2History', 'StatisticsController@ajax_statRoulette2History');
    Route::post('/ajax_nextPrevRoulette2History', 'StatisticsController@ajax_nextPrevRoulette2History');
    Route::get('/export2excelR2', 'StatisticsController@export2excelR2')->name('export2excelR2');
    Route::get('statistics/winRTL2', 'StatisticsController@winRTL2');
    

    Route::get('statistics/historyBlackjack', 'StatisticsController@historyBlackjack');
    Route::post('/ajax_statBJHistory', 'StatisticsController@ajax_statBJHistory');
    Route::post('/ajax_nextPrevBJHistory', 'StatisticsController@ajax_nextPrevBJHistory');
    Route::post('/ajax_sortBJHistory', 'StatisticsController@ajax_sortBJHistory');
    Route::get('/export2excelBJ', 'StatisticsController@export2excelBJ')->name('export2excelBJ');

    Route::get('statistics/user-logs', 'Statistics\UserLogsController@index');
    Route::get('/export2excelAll', 'Statistics\UserLogsController@export2excelAll')->name('export2excelAll');
    Route::get('statistics/user-logs-system', 'Statistics\UserLogsController@system');
    Route::get('/export2excelSystem', 'Statistics\UserLogsController@export2excelSystem')->name('export2excelSystem');
    Route::get('statistics/user-logs-settings', 'Statistics\UserLogsController@settings');
    Route::get('/export2excelSettings', 'Statistics\UserLogsController@export2excelSettings')->name('export2excelSettings');

  
    /**
     * Players  
     */

    Route::get('players', 'Players\PlayersController@index')->name('players') ;
    Route::get('players/cards', 'Players\PlayersController@cards');
    Route::post('/ajax_ReadNewCard', 'Players\PlayersController@ajax_ReadNewCard');
    Route::post('/ajax_SaveAddCard', 'Players\PlayersController@ajax_SaveAddCard');
    Route::get('/export2excelCards', 'Players\PlayersController@export2excelCards')->name('export2excelCards');
    Route::post('/ajax_SaveEditCart', 'Players\PlayersController@ajax_SaveEditCart');
    Route::post('/ajax_AddBankCreditCard', 'Players\PlayersController@ajax_AddBankCreditCard');
    Route::post('/ajax_TransactionsCard', 'Players\PlayersController@ajax_TransactionsCard');
//});
});
