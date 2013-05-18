<?php
//HELPER FUNCTIONS
function object_to_array($obj) {
    if(is_object($obj)) $obj = (array) $obj;
    if(is_array($obj)) {
        $new = array();
        foreach($obj as $key => $val) {
            $new[$key] = object_to_array($val);
        }
    }
    else $new = $obj;
    return $new;       
}
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', array('uses' => 'home@index'));
Route::get('/coupon', array('as'=>'coupon', 'uses' => 'home@coupon'));
Route::get('/confirm', array('as'=>'confirm_account', 'uses' => 'home@confirm'));
Route::get('/(:any)', array('uses' => 'home@tab', 'before' => 'auth'));
Route::post('/session/(:any)', array('uses' => 'session@session'));

// API Routes
	// Budget
	Route::get('API/budget/(:any)', array('uses' => 'api@budget'));
	Route::post('API/budget', array('uses' => 'api@budget'));
	Route::get('API/budget/(:any)/wardrobe', array('uses' => 'api@wardrobe'));
	Route::put('API/budget/(:any)/wardrobe', array('uses' => 'api@wardrobe'));
	Route::get('API/json/(:any)', array('uses' => 'api@json'));
	Route::put('API/json/(:any)', array('uses' => 'api@json'));
	//Popup
	Route::get('API/popup/(:any)', array('uses' => 'api_popup@popup', 'before' => 'auth'));
	Route::get('API/popup/view/(:any)', array('uses' => 'api_popup@view'));

	// ASIDES
	Route::get('API/asides/(:any)', array('uses' => 'asides@aside'));
	
	// Session Control Routes
	Route::post('/API/session/(:any)/(:any)', array('uses' => 'session@set'));
	Route::get('/API/session/flush', array('uses' => 'session@flush'));

// User login

Route::post('/account', array('as'=>'account', 'uses' => 'user@account'));
Route::get('/register', array('as'=>'register', 'uses' => 'user@register'));
Route::post('/login', array('as'=>'login', 'uses' => 'user@login','before'=>'csrf'));
Route::get('/logout', array('uses' => 'user@logout', 'before' => 'auth'));
Route::get('/check', array('uses' => 'user@check'));

// Content routes
Route::get('/content/module/(:any)', array('uses' => 'content@module'));
Route::get('/content/door', array('uses' => 'content@door'));
Route::get('/content/materialsource/(:any)', array('uses' => 'content@materialsource'));
Route::get('/content/materials/(:any)', array('uses' => 'content@materials'));

//Debuggin routes
Route::get('/debugger/wardrobe', array('uses' => 'debugger@wardrobe'));
Route::get('/debugger/module', array('uses' => 'debugger@module'));
Route::get('/debugger/savemodule', array('uses' => 'debugger@savemodule'));
Route::get('/debugger/save', array('uses' => 'debugger@save'));





/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('/');
});