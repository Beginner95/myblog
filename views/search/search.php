<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div id="main">
<?php if (!empty($articles)) : ?>
    <article class="post">
        <div class="title">
            <h2>По вашему запросу <u><?php echo $query; ?></u> найдено: <?php echo count($articles); ?> </h2>
        </div>
    </article>
    <?php foreach ($articles as $article) : ?>
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?php echo $article->title; ?></a></h2>
                    <p><?php echo $article->description; ?></p>
                </div>
                <div class="meta">
                    <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->getDate(); ?></time>
                    <a href="#" class="author"><span class="name"><?php echo $article->author->name; ?></span><img src="<?php echo $article->author->getImage(); ?>" alt="" /></a>
                </div>
            </header>
            <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="image featured"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
            <p><?php echo $article->content; ?></p>
            <footer>
                <ul class="actions">
                    <li><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="button large">Continue Reading</a></li>
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
<?php else: ?>
    <article class="post">
            <div class="title">
                <h2>По вашему запросу <u><?php echo $query; ?></u> Ничего не найдено...</h2>
            </div>
    </article>
<?php endif; ?>
</div>
<?php
echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);