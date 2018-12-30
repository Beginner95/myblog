<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

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
            <a href="single.html" class="image featured"><img src="/uploads/<?php echo $article->image; ?>" alt="" /></a>
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
<?php
echo LinkPager::widget([
    'pagination' => $pagination,
    //Css option for container
    'options' => ['class' => 'actions pagination'],
    //First option value
//    'firstPageLabel' => 'first',
    //Last option value
//    'lastPageLabel' => 'last',
    //Previous option value
    'prevPageLabel' => 'PREVIOUS PAGE',
    //Next option value
    'nextPageLabel' => 'Next Page',
    //Current Active option value
    'activePageCssClass' => 'active',
    //Max count of allowed options
//    'maxButtonCount' => 8,
    // Css for each options. Links
    'linkOptions' => ['class' => 'button '],
//    'disabledPageCssClass' => '',
    // Customzing CSS class for navigating link
//    'prevPageCssClass' => '',
//    'nextPageCssClass' => '',
//    'firstPageCssClass' => 'p-first',
//    'lastPageCssClass' => 'p-last',
]);
?>


