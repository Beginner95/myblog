<div class="comments">
    <?php if (!empty($comments)) : ?>
        <article class="post">
            <?php foreach($comments as $comment) : ?>
                <div class="comment">
                    <a href="#" class="author">
                        <img src="<?php echo $comment->user['image']; ?>" alt="" />
                        <span class="name"><?php echo $comment->user['name']; ?></span>
                    </a>
                    <time class="published" datetime="<?php echo $comment->date; ?>"><?php echo $comment->getDate(); ?></time>
                    <?php echo $comment->text; ?>
                </div>
            <?php endforeach; ?>
        </article>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']])
        ?>
        <article class="post">
            <h1>Leave your comment</h1>
            <?php if(Yii::$app->session->getFlash('comment')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo Yii::$app->session->getFlash('comment'); ?>
                </div>
            <?php endif; ?>
            <?php
            echo $form->field($commentForm, 'comment')
                ->textarea(['class'=>'form-control', 'placeholder'=>'Write Massage'])
                ->label(false);
            ?>
            <button type="submit" class="button large">Add my comment</button>
        </article>
        <?php \yii\widgets\ActiveForm::end(); ?>
    <?php endif; ?>
</div>