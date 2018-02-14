<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.02.2018
 * Time: 20:20
 */
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Класс для отправки сообщений
 * Class Sender
 * @package app\models
 *
 */
class Sender extends Model
{
    private $message='';
    private $email;

    /**
     * Метод для обработки сообщений
     * @param $message
     */
    public function setMessage($message) {
        $this->message = 'Для авторизации необходимо пройти по ссылке:'. Yii::$app->params['basic_url']."/auth/login/".$message;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Метод для отпарвки сообщений / заглушка
     */
    public function sendMessage(){
        /*
        Yii::$app->mailer->compose()
            ->setFrom('test@test.local')
            ->setTo($this->email)
            ->setSubject('Ссылка для авторизации')
            ->setHtmlBody($this->message)
            ->send();
        */
        file_put_contents(__DIR__.'/../../test.message', 'e-mail:'.$this->email."\n".'message:'.$this->message."\n", FILE_APPEND | LOCK_EX);
    }
}