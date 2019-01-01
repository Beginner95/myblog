<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div id="main">
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
            <a href="single.html" class="image featured"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
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
</div>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="/" class="logo"><img src="/public/images/logo.jpg" alt="" /></a>
        <header>
            <h2>Web Vaha</h2>
            <p>FREE PROGRAMMAN BLOG</p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">
            <?php foreach ($popular as $article) : ?>
                <article class="mini-post">
                    <header>
                        <h3><a href="single.html"><?php echo $article->title; ?></a></h3>
                        <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->date; ?></time>
                        <a href="#" class="author"><img src="/public/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
            <?php foreach ($recent as $article) : ?>
                <li>
                    <article>
                        <header>
                            <h3><a href="single.html"><?php echo $article->title; ?></a></h3>
                            <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->date; ?></time>
                        </header>
                        <a href="single.html" class="image"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>My name is Vaharsolta Nesirhaev; I'am a lifelong programmer web developer.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="https://twitter.com/Beginner95" class="fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/vakharsolt.nesirkhaev" class="fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/webvaha/" class="fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="https://vk.com/beginner95" class="fa-vk"><span class="label">RSS</span></a></li>
        </ul>
        <p class="copyright">&copy; MyBlog <a href="#">Blog.WebVaha</a>. MySite: <a href="#">WebVaha</a>.</p>
    </section>
</section>
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



