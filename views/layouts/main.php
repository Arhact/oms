<?php

/** @var yii\web\View $this */
/** @var string $content */


use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

use yii\helpers\Url;
use app\models\Good;
/** @var app\models\GoodSearch $searchModel */

// use yii\helpers\ArrayHelper;
// use backend\models\Standard;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    
    // Html::activeDropDownList(
    //     $category,
    //     'categories',
    //     ArrayHelper::map(
    //         Categories::find()->all(), 'id', 'name'
    //     ));
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    $items = [
                '<div class="nav-full"><div class="navbar-nav nav-el">',
                ['label' => 'На главную', 'url' => ['/site/index']],

                ['label' => '☰ Каталог товаров', 'url' => ['/site/about/?s=Каталог товаров']],
                ['label' => '🖂 Контакты', 'url' => ['/site/contact']],
                ['label' => 'Новости и акции', 'url' => ['/site/about/?s=Новости и акции']],
                ['label' => 'Оплата и доставка', 'url' => ['/site/about/?s=Оплата и доставка']],
                '</div><div class="navbar-nav nav-el">',
                ['label' => '8 (4012) 915-208', 'url' => ['#']],
            ];
    if (Yii::$app->user->isGuest) {
        $items[] = ['label'=>'Авторизация', 'url'=>['/site/login']];
        $items[] = ['label'=>'Регистрация', 'url'=>['/user/create']];
    }
    else {
        $items[] = ['label'=>'Личный кабинет', 'url'=>['/lk']];
        $items[] = '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        '' . Yii::$app->user->identity->login . ' - выход',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
        $items[] = '</div></div>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left text-md-start">
                <h2>OMS</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Placeat adipisci corrupti quos quam? Voluptates, facere quas. 
                    Accusantium reiciendis illum, eveniet dignissimos sequi deleniti 
                    minus dolorum? Doloribus quam omnis reiciendis quis!</p>
                <div class="payment">
                    <?
                    payment('61px', '20', '5px', 'visa.svg');
                    payment('41px', '33', '5px', 'mastercard.svg');
                    payment('81px', '37', '5px', 'mir.svg');
                    ?>
                </div>
            </div>

            <div class="col-md-6 text-right text-md-end vk">
                <h2><b>г. Калининград, ул. Третьяковская, 4В</b></h2>
                <p class="num"> 91-52-08</p>
                <p>E-mail: <b>info@kdmobil.ru</b></p>
                <h2><b><a class="popd" href="https://kdmobil.ru/politika-obrabotki-personalnyx-dannyx/">🗎 Политика обработки персональных данных</a></b></h2>
            </div>
        </div>
        <div class="row text-muted">
            <div class="col-md-10 text-center text-md-start copy">&copy; <?= date('Y') ?> <a href="https://kdmobil.ru">kdmobil.ru</a>. Информация на сайте не является публичной офертой.</div>
        </div>
    </div>
</footer>
<?
function payment($w, $h, $p, $i) {
    print('<img style="width:'.$w.'; height:'.$h.'; padding:'.$p.';" alt="'.$i.'" src="/web/img/'.$i.'">');
}
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
