<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Price $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_good')->textInput() ?>

    <?= $form->field($model, 'retail')->textInput() ?>

    <?= $form->field($model, 'wholesale')->textInput() ?>

    <?= $form->field($model, 'qt')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
