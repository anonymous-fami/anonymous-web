<?php namespace App\Http\Controllers;

use App\ApiKey;
use App\File as FileTable;
use App\Session;
use Auth;
use File;
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

    /** Удаление данные сессии **/
    public static function deleteSessionData(Request $request) {
       $error = 0;
        if($request->ajax()) {
            $data = $request->all();
            $files = FileTable::getAllFilesForSession($data['session_id']);
            foreach($files as $file) {
                File::delete(public_path().$file->file_path);
            }
            FileTable::deleteAllFilesForSession($data['session_id']);
            Session::deleteSession($data['session_id']);
        }
        else
            abort(403);
        return response()->json([
            'error' => $error,
        ]);
    }

}