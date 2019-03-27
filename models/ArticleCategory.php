<?php

namespace app\models;



class ArticleCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'article_to_category';
    }
}