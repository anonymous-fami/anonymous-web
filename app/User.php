<?php namespace App;
//bukin test commit
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract {

	use Authenticatable;

	protected $table = 'users';
	protected $fillable = ['email', 'password'];
	protected $hidden = ['password', 'remember_token'];
	

}
