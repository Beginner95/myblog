<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Article;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'text:ntext',
            'date',
            [
                'attribute' => 'user_id',
                'label' => 'User',
                'value' => function ($data) {
                    return $data->user->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(User::find()->all(), 'id', 'name'), ['prompt' => '', 'class' => 'form-control form-control-sm']),
            ],
            [
                'attribute' => 'article_id',
                'label' => 'Article',
                'value' => function ($data) {
                    return $data->article->title;
                },
                'filter' => Html::activeDropDownList($searchModel, 'article_id', ArrayHelper::map(Article::find()->all(), 'id', 'title'), ['prompt' => '', 'class' => 'form-control form-control-sm']),
            ],

            [
                'format' => 'html',
                'label' => 'Action',
                'value' => function ($data) {
                    return ($data->isAllowed()) ? '<a href="' . Url::toRoute(['comment/disallow', 'id' => $data->id]) . '" class="btn btn-warning">Disallow</span></a>' : '<a href="' . Url::toRoute(['comment/allow', 'id' => $data->id]) . '" class="btn btn-success">Allow</a>';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{link}',
            ],
        ],
    ]); ?>
</div>
