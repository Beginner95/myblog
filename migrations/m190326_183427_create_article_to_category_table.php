<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_to_category}}`.
 */
class m190326_183427_create_article_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_to_category}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'tab_article_to_category',
            'article_to_category',
            'article_id'
        );

        $this->addForeignKey(
            'tab_article_to_category',
            'article_to_category',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx_category_id',
            'article_to_category',
            'category_id'
        );

        $this->addForeignKey(
            'fk-category_id',
            'article_to_category',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_to_category}}');
    }
}
