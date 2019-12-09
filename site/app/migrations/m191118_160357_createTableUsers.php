<?php

use yii\db\Migration;

/**
 * Class m191118_160357_createTableUsers
 */
class m191118_160357_createTableUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users',[
            'id'=>$this->primaryKey()->notNull(),
            'userName'=>$this->string(100)->notNull(),
            'login'=>$this->string(100)->notNull(),
            'email'=>$this->string(200),
            'passwordHash'=>$this->string(200),
            'authKey'=>$this->string(200),
            'token'=>$this->string(200),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
        $this->createIndex('UnIndexLogin','users','login','true');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UnIndexLogin','users');
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_160357_createTableUsers cannot be reverted.\n";

        return false;
    }
    */
}
