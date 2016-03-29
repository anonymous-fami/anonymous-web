<?php namespace App\Http\Controllers;

use Auth;

class CabinetController extends  Controller {
    public function __construct(){
        $this->middleware('check_auth');
    }

    /** Стартовая страница личного кабинета **/
    public function indexPage() {
        return view('home');
    }

    /** Выход из личного кабинета **/
    public function logout() {
        if(Auth::check()) Auth::logout();
        return redirect('/login');
    }
}