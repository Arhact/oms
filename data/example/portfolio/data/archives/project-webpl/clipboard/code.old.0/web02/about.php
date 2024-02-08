<?php ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="ru" style="overflow: hidden;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веб-плеер: о нас</title>
    <!-- подключенные файлы, шрифты -->
    <?php include 'service/fpv.php'; ?>
	<link rel="stylesheet" type="text/css" href="service/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/ussrstencil.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
</head>
<!-- css код -->
<style>
    .container{
        height: auto;
    }
</style>
<!-- php код -->
<?php
function li($liadress) {
    if ($liadress == 'vk') {
        $txtadress = 'https://vk.com/id434647357';
    }
    if ($liadress == 'kitis') {
        $txtadress = 'http://kitis.ru';
    }
    if ($liadress == 'mail') {
        $txtadress = 'https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvlqWGsQghMXdlnlVtSFpSNdgkJQLxjRvXrfjGtKsbZFsNFKdWsFZRZjlrKWdkdVbCNNGq';
    }
    print '"'.$txtadress.'"';
}
?>
<!-- тело сайта -->
<body>
    <?php fpvhtml() ?>
    <!-- шапка -->
    <header>
        <div class="logo">
            <a href="http://webplayer"><img src="images\logo.png" alt="arhact"></a>
        </div>
        <nav>
    		<a href="http://webplayer">на главную</a>
    		<a href="about.php">о нас</a>
    		<a href="bcc.php">обратная связь</a>
        </nav>
        <div class="search_field">
            <form method="post" action="/mp3list.php">
                <input type="text" id="search" placeholder="скачать" name="search" value="">
                <input type="submit" value="вперёд">
            </form>
        </div>
    </header>
    <!-- end шапка -->
    <div class="container about-cont">
        <p>Проект: <span>веб-плеер</span></p>
        <p>Администратор: <span>Бурдин В. Д.</span></p><br>
        <p>Наш ВК: <a href=<? li('vk') ?>>vk.com</a></p>
        <p>Учебное заведение: <a href=<? li('kitis') ?>>kitis.ru</a></p>
        <p>С вопросами обращаться на почту: <a href=<? li('mail') ?>>mail.google.com</a></p>
        <br>
        <p class="about-text">Добро пожаловать, разумный, читающий это. Данный проект позиционируется как готовый, но абсолютно пустой от треков плеер. Для использования берется любой бесплатный хостинг, и уже туда загружается и сайт, и все необходимые файлы. Это сделано во избежание проблем с <a href="https://rkn.gov.ru/p582/p850/p864/">авторскими правами</a>. Мы же не <a href="https://demonoid.is/">пираты</a>, верно? Так что, весь загруженный контент целиком и полностью - проблемы <a href="https://rkn.gov.ru/it/control/">совести</a> пользователя.</p>
        <p class="about-gl">Удачи!</p>
    </div>
    <!-- подвал -->
    <footer></footer>
    <!-- end подвал -->
</body>
<!-- end тело сайта -->
</html>