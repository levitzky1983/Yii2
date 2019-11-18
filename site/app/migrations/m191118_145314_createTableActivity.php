<?php

use yii\db\Migration;

/**
 * Class m191118_145314_createTableActivity
 */
class m191118_145314_createTableActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
            'id'=>$this->primaryKey()->notNull(),
            'id_author'=>$this->integer()->notNull(),
            'title'=>$this->string(150)->notNull(),
            'description'=>$this->text()->notNull(),
            'date'=>$this->date()->notNull(),
            'timeBegin'=>$this->time()->notNull(),
            'timeEnd'=>$this->time()->notNull(),
            'isBlocked'=>$this->boolean()->notNull()->defaultValue(0),
            'isRepeat'=>$this->boolean()->notNull()->defaultValue(0),
            'repeatType'=>$this->string(20),
            'email'=>$this->string(100)->defaultValue(''),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_145314_createTableActivity cannot be reverted.\n";

        return false;
    }
    */
}
