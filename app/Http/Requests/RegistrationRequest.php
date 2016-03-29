<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class RegistrationRequest extends Request {
    public function authorize(){
        return true;
    }
    public function rules()
    {
        return [
            'login' => 'required|min:4|unique:users', //обязательное поле, мин. 4 символа
            'name' => 'required|min:2',
            'password' => 'required|min:6|same:re_password',//обязательное поле, мин. 6 символов
            're_password' => 'required'
        ];
    }
}