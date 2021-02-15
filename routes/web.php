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

// Route::get('/', function () {
//     // return view('welcome');
// });


Route::namespace('Frontend')->group(function () {

     Route::get('/lang/en','LanguageController@toEN'); 
     Route::get('/lang/fr','LanguageController@toFR'); 

	Route::get('/', 'AccountController@index')->name('Home');
	Route::get('/account', 'AccountController@login');

	
	Route::get('/account/confirm', 'AccountController@confirmEmail')->name('confirmEmail');
	Route::post('/account/register', 'AccountController@register')->name('register');
	Route::post('/account/check', 'AccountController@checkLogin');
	// Route::match(['get', 'post'],'/account/reset', 'AccountController@resetPassword')->name('reset_password');
	Route::get('/account/login', 'AccountController@login')->name('login_frontend');
	Route::get('/account/reset', 'AccountController@resetPassword')->name('reset_password');
    Route::post('/account/reset/push', 'AccountController@resetPasswordPush');
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact/send', 'ContactController@send');

	Route::group(['middleware' => 'checkAuthFrontend'], function () {
    	
        Route::post('/account/join', 'AccountUserController@joinCompetition');
        Route::get('/account/home', 'AccountUserController@homeCompetition')->name('Homegame');
        Route::get('/account/game', 'AccountGameController@index'); // old  ->name('Homegame')
        Route::post('/account/game/save', 'AccountGameController@saveGameUser');
        Route::get('/account/game/next', 'AccountGameController@nextDay');
        Route::get('/account/game/prev', 'AccountGameController@prevDay');
        Route::get('/account/game/stats', 'AccountGameController@getStats');
        Route::get('/account/standing', 'AccountStandingController@index');
        Route::get('/profile/{id}/view', 'AccountUserController@getProfile');
        Route::get('/profile/edit', 'AccountUserController@editProfile');
        Route::any('/profile/edit/save', 'AccountUserController@saveProfile');
        Route::get('/account/logout','AccountController@logout');  // Logout action

        // Route::get('/profile/edit/save', function () {
        //   die('no');
        // });
        
    });

    
});



Route::namespace('Backend')->group(function () {

	Route::get('/admin/login', 'LoginController@index')->name('loginAdmin');
	Route::post('/admin/login/check', 'LoginController@checkLogin');

    // Route::group(['middleware' => 'checkAuthBackend'], function () {
    	
        Route::get('/admin', 'AdminController@index');
        Route::get('hash', 'LoginController@hashStringOrPassword');
        Route::get('/admin/logout','LoginController@logout');  // Logout action

        Route::get('/admin/team', 'TeamController@index');
        Route::post('/admin/team/save', 'TeamController@addTeam');

        Route::get('/admin/group', 'GroupController@index');
        Route::post('/admin/group/save', 'GroupController@addGroup');

        Route::get('/admin/competition', 'CompetitionController@index');
        Route::post('/admin/competition/save', 'CompetitionController@addCompetition');
        Route::get('/admin/competition/delete/{id}', 'CompetitionController@deleteCompetition');

        Route::get('/admin/stage', 'StageController@index');
        Route::post('/admin/stage/save', 'StageController@addStage');

        Route::get('/admin/users', 'UserController@index');
        Route::get('/admin/emails', 'ContactController@index');

        Route::get('/admin/game', 'GameController@index');
        Route::post('/admin/game/save', 'GameController@addGame');
        Route::get('/admin/game/edit/{id}', 'GameController@getEditGame');
        Route::post('/admin/game/edit/{id}/save', 'GameController@saveEditGame');

        Route::post('/admin/game/save_score', 'GameController@saveScores');
        Route::get('/admin/game/delete/{id}', 'GameController@deleteGame');
        
    // });
});

                //Admin is the folder where the functions of the AdminController are located.
// Route::namespace('Backend')->group(function () {
   
//    Route::get('/admin/login', 'LoginController@index')->name('login');
//    Route::get('/admin', 'AdminController@index');
//    Route::post('/admin/login/check', 'LoginController@checkLogin');
//    Route::get('hash', 'LoginController@hashStringOrPassword');
// 	// source: https://laravel.com/docs/5.6/routing#route-groups
//     // Controllers Within The "App\Http\Controllers\Admin" Namespace
// });


