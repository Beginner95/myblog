<?php

namespace app\modules\admin\controllers;


use app\models\Comment;
use app\models\CommentSearch;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        if ($comment->disallow()) {
            return $this->redirect(['index']);
        }
    }

    public function actionAllow($id)
    {
        $comment = Comment::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['index']);
        }
    }
}