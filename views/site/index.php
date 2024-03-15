<?php

/** @var yii\web\View $this */

$this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-1 mb-3 search-in">
        <form role="search" method="get" class="product-search display-4" action="#">
                <input type="search" id="product-search-field" class="search-field" placeholder="Поиск по товарам…" value="" name="s">
                <input type="submit" value="Найти">
            </form>
        <!-- <p class="lead">You have successfully created your Yii-powered application.</p> -->
        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>
    <div class="row search-in">
    </div>
    
    <div class="divider"></div>
    
    <div class="body-content">

        <div class="shop">
            <?= cards(); ?>
        </div>

    </div>

<?
function devpic($n) {
    switch ($n) {
        case 1:
            $pic = '/web/404-image.png';
            break;
        case 2:
            $pic = '/web/img/cart.png';
            break;
        
        default:
            # code...
            break;
    }
    return $pic;
}
function cards() {
    $a = 1;
    while ($a <= 10) {
        print('
            <div class="card">
                <div><img class="good" src="'.devpic(2).'" alt=""></div>
                <h2><a class="cart" href="../">&raquo;</a><span>900 RUB</span></h2>
                <p>5W30 ZIC X9 SM/CF 1л</p>
                <p class="ratings">★★★☆☆</p>
                <div class="promo-info"></div>
            </div>
        ');
        $a++;
    }
}
?>
<!-- 
    <div class="body-content">

        <style>
            .col-lg-3{
                border-radius: 5px;
                box-shadow: 0 -3px 0 #077FFF, 0 0 5px #0A141E52;
            }
        </style>

        <div class="row">
            <div class="col-lg-3 mb-3 card">
                <h2>Название карты</h2>

                <p>Небольшой пример текста, который будет основываться на названии карточки и составлять основную часть ее содержимого.</p>

                <p>
                    <a class="btn btn-primary" href="../">Ссылка карты &raquo;</a>
                    <a class="btn btn-outline-secondary" href="../">Другое &raquo;</a>
                </p>
            </div>
            <div class="col-lg-3 mb-3 card">
                <h2>Название карты</h2>

                <p>Небольшой пример текста, который будет основываться на названии карточки и составлять основную часть ее содержимого.</p>

                <p>
                    <a class="btn btn-primary" href="../">Ссылка карты &raquo;</a>
                    <a class="btn btn-outline-secondary" href="../">Другое &raquo;</a>
                </p>
            </div>
            <div class="col-lg-3 mb-3 card">
                <h2>Рекомендуемые</h2>

                <p>Особый заголовок<br>С вспомогательным текстом ниже - естественным переходом к дополнительному контенту.</p>

                <p><a class="btn btn-primary" href="../">Подробнее &raquo;</a></p>
            </div>
            <div class="col-lg-3 mb-3 card">
                <h2>Рекомендуемые</h2>

                <p>Особый заголовок<br>С вспомогательным текстом ниже - естественным переходом к дополнительному контенту.</p>

                <p><a class="btn btn-primary" href="../">Подробнее &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>
