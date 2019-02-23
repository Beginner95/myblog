<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
nezhelskoy\highlight\HighlightAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?=Html::a('Set Category', ['set-category', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?=Html::a('Set Tags', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'content:html',
            'date',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width'=> 300]);
                }
            ],
            'viewed',
            [
                'label' => 'User',
                'value' => function ($data) {
                    return $data->author->name;
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
                'label' => 'Category',
                'value' => function ($data) {
                    return $data->category->title;
                }
            ]
        ],
    ]) ?>

</div>
