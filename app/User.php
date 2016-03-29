<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Auth;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract {

	use Authenticatable;

	protected $table = 'users';
	protected $hidden = ['password', 'remember_token'];
	public static $unguarded = true;


	/** Авторизация пользователя **/
	public static function login($data) {
		if (Auth::attempt(['login' => $data['login'], 'password' => $data['password']])) {
			return Auth::user();
		}
		else return false;
	}

	/** Регистрация пользователя **/
	public static function registration($data) {
		$user = User::create([ //создаем пользователя
			'login' => $data['login'],
			'password' => Hash::make($data['password']),
			'name' => $data['name']
		]);
		return $user; // возвращаем пользователя
	}

}

