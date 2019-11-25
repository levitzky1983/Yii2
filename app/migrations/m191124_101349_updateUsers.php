<?php

use yii\db\Migration;

/**
 * Class m191124_101349_updateUsers
 */
class m191124_101349_updateUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('users',['userName'=>'test@test1.ru','login'=>'test@test1.ru','passwordHash'=>Yii::$app->security->generatePasswordHash('123456')],['id'=>1]);
        $this->update('users',['userName'=>'test@test2.ru','login'=>'test@test2.ru','passwordHash'=>Yii::$app->security->generatePasswordHash('123456')],['id'=>2]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191124_101349_updateUsers cannot be reverted.\n";

        return false;
    }
    */
}
