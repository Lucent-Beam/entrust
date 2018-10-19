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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth.basic'], function () {

	#Views
	Route::get('users', 'UserController@get_users_view');

	Route::get('create-roles', 'HomeController@create_roles');
	Route::get('create-permissions', 'HomeController@create_permissions');
	Route::get('checking-role/{role_id}', 'HomeController@checking_for_role');

	Route::get('list-roles', 'HomeController@list_roles');

	Route::get('roles-permissions-example', 'HomeController@roles_permissions_view');

	//Route::get('attach-roles', 'HomeController@attach_roles');
	Route::group(['middleware' => ['role:seller']], function () {
		Route::get('/admin-place', 'HomeController@only_admins');
	});

	Route::get('print-this-view', 'HomeController@print_this_view');

	#Filtering routes!

	#Other way

	//Route::when('admin/vip*', 'owner');

	Route::group(['prefix' => 'vip'], function () {
		Route::get('/', function () {
			return "You have the correct role assigned!!";
		});
	});

	#First way!
	// Route::filter('owner_role', function () {
	// 	// check the current user
	// 	if (!\Zizaco\Entrust\Entrust::hasRole('owner')) {
	// 		//App::abort(403);
	// 		return view('authorization_error');
	// 	} else {
	// 		return "You have the correct role!";
	// 	}
	// });

	#Second way!
	Route::group(['middleware' => ['role:owner']], function () {
		Route::get('owner-place', 'HomeController@only_owners');
		//Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
	});

});
