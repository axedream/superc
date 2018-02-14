<?php

use yii\db\Migration;
use app\models\User;
class m180214_120319_addColumFromUser extends Migration
{

    /**
     * Добавляем колонку для авторизации, после логаута сбрасывается
     * @return bool|void
     */
    public function up()
    {
        $this->addColumn(User::tableName(),'isAuth',$this->boolean()->defaultValue(0));
    }

    /**
     * Удаляем колонку авторизации
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn(User::tableName(),'isAuth');
    }
}
