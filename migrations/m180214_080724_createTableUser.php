<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m180214_080724_createTableUser
 */
class m180214_080724_createTableUser extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'key' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

}
