<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class LoginRequest extends Request {
    public function authorize(){
        return true;
    }
    public function rules()
    {
        return [
            'login' => 'required|min:4', //обязательное поле, мин. 4 символа
            'password' => 'required|min:6'//обязательное поле, мин. 6 символов
        ];
    }
}