<?php namespace App\Http\Controllers;
/**
 * Контроллер личного кабинета
 * Created by PhpStorm.
 * User: aleksey
 */

class IndexController extends  Controller {

    public function home() {
        return view('home');
    }
}
