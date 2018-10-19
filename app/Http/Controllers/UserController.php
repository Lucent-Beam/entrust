<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;

class UserController extends Controller {
	public function get_users_view(UsersDataTable $dataTable) {
		return $dataTable->render('users');
	}

}
