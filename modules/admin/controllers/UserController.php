<?php

namespace app\modules\admin\controllers;

use app\models\UserSearch;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}