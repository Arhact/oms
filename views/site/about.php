<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        г. Калининград, ул. Третьяковская, 4В<br>
        Сервис: 91-34-44<br>
        Магазин: 91-52-08<br>
        Детейлинг: 38-51-40<br>
        E-mail: info@kdmobil.ru<br>
    </p>
    
    <!-- <code></?= __FILE__ ?></code> -->
</div>
