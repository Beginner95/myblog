<?php

use yii\db\Migration;

/**
 * Handles adding url to table `{{%article}}`.
 */
class m190731_085441_add_url_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'url', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('article', 'url');
    }
}
