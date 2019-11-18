<?php

use yii\db\Migration;

/**
 * Class m191118_154649_createTableFiles
 */
class m191118_154649_createTableFiles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files',[
            'id'=>$this->primaryKey()->notNull(),
            'id_activity'=>$this->integer()->notNull(),
            'title_file'=>$this->string(150)
        ]);
        $this->createIndex('Index_files','files','title_file','true');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('Index_files','files');
        $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_154649_createTableFiles cannot be reverted.\n";

        return false;
    }
    */
}
