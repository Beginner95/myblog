<?php
use yii\helpers\Url;
?>
<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="/" class="logo"><img src="/public/images/logo.png" alt="" /></a>
        <header>
            <h2>Web Vaha</h2>
            <p>Programmer's blog</p>
        </header>
    </section>

    <!-- Mini Posts -->
    <h2>Popular Posts</h2>
    <section>
        <div class="mini-posts">
            <?php foreach ($popular as $article) : ?>
                <article class="mini-post">
                    <header>
                        <h3><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?php echo $article->title; ?></a></h3>
                        <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->getDate(); ?></time>
                        <a href="#" class="author"><img src="/public/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="image"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Posts List -->
    <h2>Recent posts</h2>
    <section>
        <ul class="posts">
            <?php foreach ($recent as $article) : ?>
                <li>
                    <article>
                        <header>
                            <h3><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?php echo $article->title; ?></a></h3>
                            <time class="published" datetime="<?php echo $article->date; ?>"><?php echo $article->getDate(); ?></time>
                        </header>
                        <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="image"><img src="<?php echo $article->getImage(); ?>" alt="" /></a>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <h2>Categories</h2>
    <section>
        <ul class="categories">
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="<?php echo Url::toRoute(['site/category', 'id' => $category->id]); ?>"><?php echo $category->title; ?></a>
                    <span>(<?php echo $category->getArticlesCount(); ?>)</span>
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