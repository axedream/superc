<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\models\User;

/**
 * Класс отвечает за логин и логаут
 * Class AuthController
 * @package app\controllers
 */
class AuthController extends Controller
{

    /**
     * Функция автоизации пользователя по ссылке
     * @param bool $key
     * @return \yii\web\Response
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionLogin($key=false)
    {
        if ($key) {
            $user = User::findOne(['key'=>$key,'isAuth'=>0]);
            if ($user) {
                if (Yii::$app->user->login($user)) {
                    $user->isAuth = 1;
                    $user->update(false);
                }
            }
        }
        if (!Yii::$app->user->isGuest) return $this->redirect(Url::to(['/site/index/3']));
        return $this->redirect(Url::to(['/site/index/4']));
    }

    /**
     * Функция логаута пользователя
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Url::to(['/site/index/2']));
    }
}