<?php namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\User;
use Auth;

/**
 * Контроллер личного кабинета
 * Created by PhpStorm.
 * User: aleksey
 */

class IndexController extends  Controller {

    /** Страница авторизации пользователя **/
    public function loginPage() {
        if(Auth::check()) return redirect('/');
        return view('login');
    }

    /** Авторизация пользователя **/
    public function login(LoginRequest $request) {
        $data = $request->all();//получаем отфильтрованные данные
        $user = User::login($data);
        if($user instanceof  User)
            return redirect('/');
        else
            return redirect('/login')->withErrors(['Неверный пароль, попробуйте заново']);
    }

    /** Страница регистрации нового аккаунта **/
    public function registrationPage() {
        if(Auth::check()) return redirect('/');
        return view('registration');
    }

    /** Регистрация нового пользователя **/
    public function registration(RegistrationRequest $request) {
        $data = $request->all();
        $user = User::registration($data);//регистрируем пользователя
        if($user instanceof User) {
            return redirect('/login')->with('success','Вы успешно зарегистрировались и теперь можете войти в личный кабинет используя свой логин и пароль.');
        }
        else
            return redirect('/registration') -> withErrors('Ошибка регистрации, попробуйте заново.');//Сообщаем об ошибкe
    }

}
