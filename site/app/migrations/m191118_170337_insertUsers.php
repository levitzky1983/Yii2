<?php

use yii\db\Migration;

/**
 * Class m191118_170337_insertUsers
 */
class m191118_170337_insertUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id'=>1,
            'userName'=>'111',
            'login'=>'111',
            'email'=>'test1@test.ru',
            'passwordHash'=>'111'
        ]);
        $this->insert('users',[
            'id'=>2,
            'userName'=>'222',
            'login'=>'222',
            'email'=>'test2@test.ru',
            'passwordHash'=>'222'
        ]);
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
        echo "m191118_170337_insertUsers cannot be reverted.\n";

        return false;
    }
    */
}
