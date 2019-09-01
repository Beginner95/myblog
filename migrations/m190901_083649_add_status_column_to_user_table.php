<?php

use yii\db\Migration;

/**
 * Handles adding status to table `{{%user}}`.
 */
class m190901_083649_add_status_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'status', $this->char(1)->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'status');
    }
}
