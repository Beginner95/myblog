<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
                    $categories = [];
                    foreach ($data->categories as $category) {
                        $categories[] = $category->title;
                    }
                    return implode(', ', $categories);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'value' => function ($data) {
                    return ($data->isAllowed()) ? '<a href="' . Url::toRoute(['article/disallow', 'id' => $data->id]) . '" class="label label-warning">Disallow</span></a>' : '<a href="' . Url::toRoute(['article/allow', 'id' => $data->id]) . '" class="label label-success">Allow</a>';
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
