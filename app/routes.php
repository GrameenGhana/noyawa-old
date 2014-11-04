
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/**
 * Catch A 404 On Docs...
 */
App::missing(function($e)
{
	if (Request::is('docs/*'))
	{
		return Redirect::to('docs');
	}
});

/**
 * Main Route...
 */
Route::get('/noyawa', function()
{
	return View::make('index');
});


Route::resource('clients', 'ClientController');

/**
 * Route to create a new client
 */
Route::post('noyawa/postClient', 'ClientController@postClient');

/**
 * Register Route...
 */
Route::get('/unsubscribe',function()
{
 return View::make('unsubscribe');
});

Route::get('/register', function()
{
	return View::make('register');
});

Route::get('/viewuploads', function()
{
	return View::make('viewuploads');
});

Route::get('/viewclients', function()
{
	return View::make('viewclients');
});

 Route::get('/getuploads', array('as'=>'getuploads', 'uses'=>'UploadController@getData'));
 Route::get('/getclients', array('as'=>'getclients', 'uses'=>'ClientController@getData'));

/**
 * Register Route...
 */
Route::get('/excelupload', function()
{
	return View::make('excelupload');
});

/**
 * Route to upload excel
 */
Route::post('noyawa/postexcel', 'UploadController@uploadExcel');
Route::controller('/users','UserController');
