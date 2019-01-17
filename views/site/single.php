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

        <article class="post">
            <h1>Comments</h1>
            <form action="">
                <textarea rows="4" name="comment"></textarea>
            </form>
        </article>
    </div>
</div>
<?php

echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);
