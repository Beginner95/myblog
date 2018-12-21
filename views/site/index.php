<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <?php foreach ($articles as $article) : ?>
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="single.html"><?php echo $article->title; ?></a></h2>
                    <p><?php echo $article->description; ?></p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01"><?php echo $article->date; ?></time>
                    <a href="#" class="author"><span class="name">Jane Doe</span><img src="/public/images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            <a href="single.html" class="image featured"><img src="/public/images/pic01.jpg" alt="" /></a>
            <p><?php echo $article->content; ?></p>
            <footer>
                <ul class="actions">
                    <li><a href="single.html" class="button large">Continue Reading</a></li>
                </ul>
                <ul class="stats">
                    <li><a href="#" class="icon fa-eye"><?php echo (int)$article->viewed; ?></a></li>
                </ul>
            </footer>
        </article>
    <?php endforeach; ?>

    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="" class="disabled button large previous">Previous Page</a></li>
        <li><a href="#" class="button large next">Next Page</a></li>
    </ul>


