<div id="main">
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#"><?php echo $article->title; ?></a></h2>
                <p><?php echo $article->description; ?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->getDate(); ?></time>
                <a href="#" class="author"><span class="name">Jane Doe</span><img src="/public/images/avatar.jpg" alt="" /></a>
            </div>
        </header>
        <span class="image featured"><img src="<?php echo $article->getImage(); ?>" alt="" /></span>
        <?php echo $article->content; ?>
        <footer>
            <ul class="stats">
                <li><a href="#" class="icon fa-eye"><?php echo (int)$article->viewed; ?></a></li>
            </ul>
        </footer>
        <?php if (!empty($tags)) : ?>
            <div class="tags">
                <?php
                    $array_tags = [];
                    foreach ($tags as $key => $tag) {
                        $array_tags[] = '<a href="' . $key . '">' . $tag . '</a>';
                    }
                ?>
                Теги: <?php echo implode(', ', $array_tags); ?>
            </div>
        <?php endif; ?>
    </article>
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
</div>
<?php

echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);
