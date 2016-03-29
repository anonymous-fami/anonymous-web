<?php namespace App\Http\Controllers;

use App\ApiKey;
use App\File;
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

    /** Страница доступа к API **/
    public function apiAccessPage() {
        $keys = ApiKey::getAllUserKey(Auth::user()->id);
        return view('apiAccess', compact('keys'));
    }

    /** Страница хранилища результатов **/
    public function storeResultsPage() {
        $files = File::getFiles(Auth::user()->id);
        $results = array();
        foreach($files as $file) {
            $results[$file->id_session]['date'] = $file->date;
            if($file->type == 'input')
                $results[$file->id_session]['input'] = $file->file_path;
            else
                $results[$file->id_session]['output'] = $file->file_path;
        }
        return view('storeResults', compact('results'));
    }
}