<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            'date',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=> 100]);
                }
            ],
            'viewed',
            [
                'label' => 'Category',
                'value' => function ($data) {
                    return ($data->category->title) ? $data->category->title : 'No category';
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'value' => function ($data) {
                    return empty($data->status) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => [
                    'width' => '60',
                ],
                'template' => '{view} {update} {delete}{link}',
            ],

        ],
    ]); ?>
</div>
