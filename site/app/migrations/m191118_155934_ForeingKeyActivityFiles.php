<?php

use yii\db\Migration;

/**
 * Class m191118_155934_ForeingKeyActivityFiles
 */
class m191118_155934_ForeingKeyActivityFiles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FilesActivityFK','files','id_activity','activity','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FilesActivityFK','files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_155934_ForeingKeyActivityFiles cannot be reverted.\n";

        return false;
    }
    */
}
