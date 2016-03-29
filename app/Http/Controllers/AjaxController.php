<?php namespace App\Http\Controllers;

use App\ApiKey;
use Auth;
use Illuminate\Http\Request;

class AjaxController extends  Controller {
    public function __construct(){
        $this->middleware('check_auth');
    }

    /** Генерация ключа API **/
    public function generateKey(Request $request) {
        $error = 0;
        if($request->ajax()) {
            $data = $request->all();
            $key = ApiKey::createKey(Auth::user());
        }
        else
            abort(403);
        return response()->json([
            'error' => $error,
        ]);
    }

    /** Удаление ключа API **/
    public function deleteKey(Request $request) {
        $error = 0;
        if($request->ajax()) {
            $data = $request->all();
            ApiKey::deleteKey($data['key_id']);
        }
        else
            abort(403);
        return response()->json([
            'error' => $error,
        ]);
    }

}