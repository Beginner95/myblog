<?php

namespace app\models;



class ArticleCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'article_to_category';
    }

    public function rules()
    {
        return [
            [['article_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']]

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'category_id' => 'Category ID'
        ];
    }
}