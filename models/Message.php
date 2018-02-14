<?php

namespace app\models;

use yii\base\Model;


/**
 * @property array message
 */
class Message extends Model {

    /**
     * Перечень сообщений
     * @var array
     */
    private $message = [
        'site' =>
      [
          'index' =>
          [
              '1' => 'Ключ успешно сгенирирован и отправлен на почту',
              '2' => 'Вы успешно разлогинелись',
              '3' => 'Авторизация проведена успешно',
              '4' => 'Неудачная попытка авторизации',
          ],

      ],
    ];

    /**
     * Генерирует сообщения для уведомления
     * @return array
     */
    public function getMessage($input=false)
    {
        $input = explode("/",$input);
        return $input ? $this->message[$input[0]][$input[1]][$input[2]] : $this->message;
    }
}