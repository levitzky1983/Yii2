<?php

use yii\db\Migration;

/**
 * Class m191118_161351_ActivityUsersFK
 */
class m191118_161351_ActivityUsersFK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('ActivityUsersFK','activity','id_author','users','id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ActivityUsersFK','activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_161351_ActivityUsersFK cannot be reverted.\n";

        return false;
    }
    */
}
