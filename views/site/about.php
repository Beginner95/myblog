<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="main">
    <article class="post">
        <header>
            <div class="title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
        </header>
            <section>
                <p>My name is Vaharsolta Nesirkhayev; I do web programming. This blog is created for yourself. I will publish a record of solving problems in the field of programming they will serve as a sharper in the first place for me</p>
                <p>My skills:</p>
                <ul class="links">
                    <li>
                        <h3>HTML</h3>
                        <p>Average level (IDE Sublime Text + emmet)</p>
                    </li>
                    <li>
                        <h3>CSS</h3>
                        <p>Bootstrap (IDE Sublime Text)</p>
                    </li>
                    <li>
                        <h3>JavaScript</h3>
                        <p>Vue, React (IDE Sublime Text)</p>
                    </li>
                    <li>
                        <h3>PHP</h3>
                        <p>Yii2, Laravel (IDE PhpStorm)</p>
                    </li>
                    <li>
                        <h3>MySQL</h3>
                        <p>(IDE PhpMyAdmin and Workbench)</p>
                    </li>
                </ul>
                <p>In my free time I like electronics, 3D design. I also have a great interest in thermodynamics.</p>
            </section>

    </article>
</div>
<?php
echo $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories
]);