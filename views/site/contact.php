<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4606.3570852202665!2d20.475245680466607!3d54.741662783592155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e33e6cd68dc56b%3A0xdc051ba3b5644577!2z0JDQstGC0L7RgdC10YDQstC40YEgTW9iaWwgMSDQptC10L3RgtGAINCi0YDQtdGC0YzRj9C60L7QstGB0LrQuNC5!5e0!3m2!1sru!2sru!4v1710506062083!5m2!1sru!2sru" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?//php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<!-- 
        <div class="alert alert-success">
            done
        </div>
        
        <div class="divider"></div>

        <p>
            <?//php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?//php endif; ?>
        </p> -->

    <?//php else: ?>

        <h2>
            Контактные данные
        </h2>
        
        <div class="divider"></div>

        <div class="container general_cont">  
        <!----------------------------home------------------------------------->
            <h2><strong>График работы:</strong></h2>
            <p><strong>ПН-ПТ</strong> с 9:00 до 20:00 (<strong>приём-выдача автомобилей до 19:30</strong>).</p>
            <p><strong>СБ</strong> с 9:00 до 16:00.</p>
            <p><strong>ВС</strong> с 9:00 до 14:00.</p>
            
            <h2><strong>Контактные телефоны:</strong></h2>
            <p><strong>913-444</strong> — Приёмка (консультация, статус ремонта, запись).</p>
            <p><strong>915-208 </strong>— Магазин (запчасти, масла, расходники).</p>
            <p><strong>385-140</strong> — Детейлинг (Тонировка, полировка, броня, керамика/жидкое стекло — консультация, статус работы, запись).</p>
            <p><strong>385-140</strong> — Антикоррозийная обработка (Консультация, статус работы, запись).</p>
            <p><strong>8(911)481-61-11</strong> — Автоэлектрики.</p>
            <p><strong>8(952)796-00-57</strong> — Мотористы.</p>

            <h2><strong>Социальные сети</strong></h2>
            <p><strong>«ВКонтакте»</strong> —&nbsp; <a href="http://vk.com/mobil1kd">vk.com/mobil1kd</a></p>
            <p><strong>«Инстаграм»</strong> — <a href="http://instagram.com/mobil1kd/">instagram.com/mobil1kd</a></p>
            <p><strong>«Одноклассники» </strong>— <a href="https://ok.ru/kdmobil">ok.ru/kdmobil</a></p>

            <h2>Мессенджеры</h2>
            <p><strong>WhatsApp / Viber</strong> — 8(952)-058-49-99 / 8(906)-238-51-40.</p>

            <h2>Почтовый ящик</h2>
            <p><a href="https://vk.com/write?email=info@kdmobil.ru" target="_blank" rel="noreferrer noopener">sales@kdmobil.ru</a></p>
            <h2>г. Калининград, ул. Третьяковская, 4в.</h2>
            <p><strong>Mobil 1 Центр «Третьяковский».</strong></p>
        </div>

        <br><br>
        <h2>
            Форма обратной связи
        </h2>
        
        <div class="divider"></div>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?//php endif; ?>
</div>
