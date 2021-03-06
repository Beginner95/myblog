<div class="comments">
    <?php if (!empty($comments)) : ?>
        <article class="post">
            <?php foreach($comments as $comment) : ?>
                <div class="comment">
                    <a href="#" class="author">
                        <img src="<?php echo $comment->user->getImage(); ?>" alt="" />
                        <span class="name"><?php echo $comment->user->name; ?></span>
                    </a>
                    <time class="published" datetime="<?php echo $comment->date; ?>"><?php echo $comment->getDate(); ?></time>
                <div class="comment-text">
                    <?php echo $comment->text; ?>
                </div>
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
            <div class="blocks_btn">
                <span class="btn" id="btn_bold"><b>B</b></span>
                <span class="btn" id="btn_italic"><i>I</i></span>
                <span class="btn" id="btn_underline"><u>U</u></span>
                <span class="btn" id="btn_strike"><s>S</s></span>
                <span class="btn" id="btn_code"><b>CODE</b><span>
            </div>
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