<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class File extends Model{

    protected $table = 'files';
    public static $unguarded = true;

    /** Получение сгруппированных файлов по сессиям **/
    public static function getFiles($userId) {
        $files = File::join('sessions', 'files.id_session', '=', 'sessions.id')
            ->where('sessions.id_user',$userId)
            ->select(
                'files.id_session',
                'files.file_path',
                'files.type',
                'sessions.created_at as date'
            )->get();
        return $files;
    }

    /** Получение всех файлов для сессии **/
    public static function getAllFilesForSession($sessionId) {
        $files = File::where('id_session',$sessionId)->get();
        return $files;
    }

    /** Создание файла **/
    public static function createFile($data) {
        $file = File::create($data);
        return $file;
    }

    /** Удаление файлов всей сессии **/
    public static function deleteAllFilesForSession($sessionId) {
        File::where('id_session',$sessionId)->delete();
    }

}