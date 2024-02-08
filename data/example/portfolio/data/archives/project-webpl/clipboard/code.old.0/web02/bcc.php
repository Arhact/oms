<?php ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веб-плеер: обратная связь</title>
    <!-- подключенные файлы, шрифты -->
    <?php include 'service/fpv.php'; ?>
	<link rel="stylesheet" type="text/css" href="service/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/ussrstencil.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
</head>
<!-- тело сайта -->
<body style="overflow: hidden;">
    <?php fpvhtml() ?>
    <!-- шапка -->
    <header>
        <div class="logo">
            <a href="http://webplayer"><img src="images\logo.png" alt="arhact"></a>
        </div>
        <nav>
    		<a href="http://webplayer">на главную</a>
    		<a href="about.php">о нас</a>
    		<a href="">обратная связь</a>
        </nav>
        <div class="search_field">
            <form method="post" action="/mp3list.php">
                <input type="text" id="search" placeholder="скачать" name="search" value="">
                <input type="submit" value="вперёд">
            </form>
        </div>
    </header>
    <!-- end шапка -->
    <div class="container bcc-cont">
        <form action = "service/formreq.php" method="POST" class = 'backconnect'>
            <label>Логин</label><br>

            <input required type="text" name="login" placeholder="никнейм" value="<?
            if (isset($_POST['sub'])){
                echo($_POST['login']); 
            } 
            if(empty($_POST['login'])) {
                echo ""; 
            } ?>"><br>

            <label>Ваше сообщение</label><br>

            <textarea required name="formtext" placeholder="текст" value="<?
            if (isset($_POST['sub'])){
                echo($_POST['formtext']); 
            } 
            if(empty($_POST['formtext'])) {
                echo ""; 
            } ?>"></textarea><br>

            <label>Адрес mail</label><br>

            <input required type="email" name="email" placeholder="address@mail.ru" value="<?
            if (isset($_POST['sub'])){
                echo($_POST['email']); 
            } 
            if(empty($_POST['email'])) {
                echo ""; 
            } ?>"><br>
            <input type="submit" name="sub" value="Отправить">
        </form>
    </div>
    <div class="container"><? $cnt=0;while($cnt<=3){echo'<br>';$cnt++;} ?></div>
    <!-- подвал -->
    <footer></footer>
    <!-- end подвал -->
</body>
<!-- end тело сайта -->
</html>