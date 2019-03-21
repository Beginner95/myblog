<?php

use kartik\date\DatePicker;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
        echo $form->field($model, 'content')->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
        ]);
    ?>

    <?php

        if ($model->isAllowed()) {
            $status = [
                '' => 'Allow',
                1 => 'Disallow'
            ];
        } else {
            $status = [
                1 => 'Disallow',
                '' => 'Allow'
            ];
        }
        echo $form->field($model, 'status')->dropDownList($status);
    ?>
    <?php
        echo DatePicker::widget([
            'name' => 'Article[date]',
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'value' => !empty($model->date) ? $model->date : date('Y-m-d'),
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
