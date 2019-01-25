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

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if ($comment->delete()) {
            return $this->redirect(['index']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = Comment::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['index']);
        }
    }

}