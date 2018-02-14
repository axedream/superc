<?php

namespace app\models;

use yii\base\Model;
use yii\db\StaleObjectException;


/**
 * Class Login
 * Осуществляет генерацию пользователей и ключей
 * @package app\models
 */
class Login extends Model
{
    public $email;
    /**
     * Набор символов для генерации логина
     * @var string
     */
    private $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';

    /**
     * Количество символов в имени логина
     * @var int
     */
    public $length = 5;

    /**
     * Валидация модели для авторизации по e-mail
     * @return array
     */
    public function rules()
    {
        return [
            [['email'],'required'],
            ['email','email']
        ];
    }

    /**
     * Генерация случайного ключа для авторизации
     * @return string
     */
    public function generateAuthKey()
    {
        return md5((new \DateTime())->format('Y-m-d H:i:s').rand(0,10000));
    }

    /**
     * Генерация логина
     * @return string
     */
    public function generateUserName()
    {
        $this->chars;
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $this->length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    /**
     * Функция логина пользователя
     * @return void
     */
    public function login(){
        $old_user = User::findOne(['email'=>$this->email]);
        if (!$old_user) {
            $user = new User();
            $user->isAuth=0;
            $user->name = $this->generateUserName();
            $user->email = $this->email;
            $user->key = $this->generateAuthKey();
            $user->save();
        } else {
            $old_user->isAuth=0;
            $old_user->key = $this->generateAuthKey();
            try {
                $old_user->update(false);
            } catch (StaleObjectException $e) {
            } catch (\Exception $e) {
                echo 'Ошибка! '.$e->getMessage();
            }
        }
    }
}