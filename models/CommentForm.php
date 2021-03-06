<?php

namespace app\models;


use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3, 250]]
        ];
    }

    public function saveComment($article_id)
    {
        $tags = [
            '[B]' => '<b>',
            '[/B]' => '</b>',
            '[I]' => '<i>',
            '[/I]' => '</i>',
            '[U]' => '<u>',
            '[/U]' => '</u>',
            '[S]' => '<s>',
            '[/S]' => '</s>',
            '[CODE]' => '<pre>',
            '[/CODE]' => '</pre>'
        ];
        $comment = new Comment();
        $comment->text = strtr($this->comment, $tags);
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save();
    }
}