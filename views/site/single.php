<?php
    use yii\helpers\Url;
    $this->title = $article->title;
    nezhelskoy\highlight\HighlightAsset::register($this);
?>
<div id="main">
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#"><?php echo $article->title; ?></a></h2>
                <p><?php echo $article->description; ?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->getDate(); ?></time>
                <a href="#" class="author"><span class="name"><?php echo $article->author->name; ?></span><img src="<?php echo $article->author->getImage(); ?>" alt="<?php echo $article->author->name; ?>" /></a>
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
                        $array_tags[] = '<a href="' . Url::toRoute(['site/tag', 'id' => $key]) . '">' . $tag . '</a>';
                    }
                ?>
                Теги: <?php echo implode(', ', $array_tags); ?>
            </div>
        <?php endif; ?>
    </article>
    <?php
        echo $this->render('/partials/comment', [
            'article' => $article,
            'comments' => $comments,
            'commentForm' => $commentForm
        ]);
    ?>
</div>
<?php

echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);
