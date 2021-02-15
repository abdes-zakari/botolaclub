<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model
{

	protected $fillable = ['username',

		                   'email',

		                   'password',

		                   'user_ip'];



}
