<div id="main">
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#"><?php use yii\helpers\Url;

                        echo $article->title; ?></a></h2>
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
                <?php foreach ($tags as $tag) : ?>
                    <li><a href="#">#<?php echo $tag; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </footer>
    </article>
</div>
<?php

echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);
