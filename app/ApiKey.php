<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ApiKey extends Model {

    protected $table = 'api_keys';
    public static $unguarded = true;


    public static function getAllUserKey($userId) {
        $keys = ApiKey::where('id_user',$userId) -> get();
        return $keys;
    }

    /** Создание нового ключа **/
    public static function createKey($user) {
        $key = ApiKey::create([
            'id_user' => $user->id,
            'key' => md5(date('Y-m-d H:i:s').$user->login)
        ]);
        return $key;
    }

    /** Удаление ключа **/
    public static function deleteKey($id) {
        ApiKey::where('id',$id)->delete();
    }

}