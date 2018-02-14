<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.02.2018
 * Time: 18:13
 */


namespace app\models;

use Yii;
use yii\base\Model;

class Auth extends Model
{

    /**
     * Проверяет ключ пользователя
     * @return bool
     */
    public function getUrlKey() {
        return true;
    }

    /**
     * Авторизируем пользователя
     * @return void
     */
    public function loginUser()
    {
        if($this->getUrlKey()) {

        }
    }
}