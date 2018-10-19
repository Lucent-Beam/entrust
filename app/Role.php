<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {
	use SoftDeletes;

	public function users() {
		return $this->belongsToMany('App\User');
	}
}
