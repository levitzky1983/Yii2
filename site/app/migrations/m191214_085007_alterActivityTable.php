<?php

use yii\db\Migration;

/**
 * Class m191214_085007_alterActivityTable
 */
class m191214_085007_alterActivityTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','notification',$this->boolean()->notNull()->defaultValue(false)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','notification');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191214_085007_alterActivityTable cannot be reverted.\n";

        return false;
    }
    */
}
