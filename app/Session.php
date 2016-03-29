<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Session extends Model{

    protected $table = 'sessions';
    public static $unguarded = true;

    /** Создание файла **/
    public static function createSession($data) {
        $session = Session::create($data);
        return $session;
    }

    /** Удаление файлов всей сессии **/
    public static function deleteAllFilesForSession($sessionId) {
        Session::where('id',$sessionId)->delete();
    }

}