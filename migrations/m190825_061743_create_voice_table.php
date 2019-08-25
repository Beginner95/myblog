<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%voice}}`.
 */
class m190825_061743_create_voice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%voice}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
            'like' => $this->integer(),
            'dislike' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%voice}}');
    }
}
