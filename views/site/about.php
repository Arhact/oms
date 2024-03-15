<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$key = $_GET['s'];
$this->title = $key.' - в разработке';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>открыта страница из файла: <code><?= __FILE__ ?></code></p>
    
</div>
