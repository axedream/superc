<?php

namespace app\controllers;

use app\models\Sender;
use Yii;
use yii\web\Controller;
use app\models\Login;
use yii\helpers\Url;
use app\models\Message;
use app\models\User;
class SiteController extends Controller
{
    public function actionIndex($id = false) {

        $message = '';
        if ($id && is_numeric($id)) {
            $message = (new Message)->getMessage("site/index/$id");
        }
        return $this->render('index',['message'=>$message]);
    }

    public function actionLogin() {
        $model = new Login;
        if(isset($_POST['Login']))
        {
            $model->attributes = Yii::$app->request->post('Login');
            if ($model->validate()){
                $sender = new Sender();
                $user = User::findOne(['key'=>$model->login()]);
                $sender->setMessage($user->key);
                $sender->setEmail($user->email);
                $sender->sendMessage();

                return $this->redirect(Url::to(['/site/index/1']));
            }
        }
        return $this->render('login',['model'=>$model]);

    }
}
