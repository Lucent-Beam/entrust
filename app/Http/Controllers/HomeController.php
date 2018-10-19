<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Auth;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function create_roles() {
		$owner = new Role();
		$owner->name = 'owner';
		$owner->display_name = 'Project Owner'; // optional
		$owner->description = 'User is the owner of a given project'; // optional
		$owner->save();

		$admin = new Role();
		$admin->name = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description = 'User is allowed to manage and edit other users'; // optional
		$admin->save();

		Auth::user()->attachRole($admin);

		return;
	}

	public function create_permissions() {
		$createPost = new Permission();
		$createPost->name = 'create-post';
		$createPost->display_name = 'Create Posts'; // optional
		// Allow a user to...
		$createPost->description = 'create new blog posts'; // optional
		$createPost->save();

		$editUser = new Permission();
		$editUser->name = 'edit-user';
		$editUser->display_name = 'Edit Users'; // optional
		// Allow a user to...
		$editUser->description = 'edit existing users'; // optional
		$editUser->save();

		Role::where('name', 'admin')->first()->attachPermission($createPost);
		return;
	}

	public function attach_roles() {

	}

	public function attach_permissions() {

	}

	public function checking_for_role($role_id) {

		$role_name = Role::find($role_id)->name;

		$status = Auth::user()->hasRole($role_name);

		return response()->json($status);

	}

	public function roles_permissions_view() {
		return view('roles_permissions');
	}

	public function only_owners() {
		return "You are authorized as an owner!";
	}

	public function only_admins() {
		return "You are authorized as an admin!";
	}

	public function list_roles() {
		$user = User::with(['roles' => function ($query) {
			$query->select(['id', 'name']);
		}])
			->find(Auth::user()->id);

		return $user->roles;
	}

	public function print_this_view() {
		return view('print_this');
	}

}
