<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!empty($comments)) : ?>
    
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Author</td>
                    <td>Text</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment) : ?>
                    <tr>
                        <td><?php echo $comment->id; ?></td>
                        <td><?php echo $comment->user->name; ?></td>
                        <td><?php echo $comment->text; ?></td>
                        <td>
                            <?php var_dump($comment->isAllowed()); ?>
                            <?php if ($comment->isAllowed()) : ?>
                                <a href="<?php echo Url::toRoute(['comment/disallow', 'id' => $comment->id]); ?>" class="btn btn-warning">Disallow</span></a>
                            <?php else: ?>
                                <a href="<?php echo Url::toRoute(['comment/allow', 'id' => $comment->id]); ?>" class="btn btn-success">Allow</a>
                            <?php endif; ?>
                            <a href="<?php echo Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h4>Комментариев нет!</h4>
    <?php endif; ?>
    
</div>
