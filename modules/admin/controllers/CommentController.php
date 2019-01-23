<?php

namespace app\modules\admin\controllers;


use app\models\Comment;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::getAll();
        return $this->render('index', [
            'comments' => $comments
        ]);
    }

}