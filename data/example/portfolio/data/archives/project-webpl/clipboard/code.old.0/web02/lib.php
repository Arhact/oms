<?php ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL); ?>
<!-- html код -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веб-плеер</title>
    <!-- подключенные файлы, шрифты -->
    <?php include 'service/fpv.php'; ?>
	<link rel="stylesheet" type="text/css" href="service/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/ussrstencil.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
</head>

<!-- php код -->
<?php
// функции: плейлисты&группы
function listt($nert) {
    $plist = array_fill(0, 30, 'test playlist'); //заглушка
    $ulist = array_fill(0, 6, 'test autor'); //заглушка
    $pcnter = 0; //тем более заглушка (=

    if ($nert == 0) {
        foreach ($plist as $pval) {
            echo '<a>'.$pval.' '.$pcnter.'</a><br>';
            $pcnter++;
        }
    }
    if ($nert == 1) {
        foreach ($ulist as $uval) {
            echo '<a>'.$uval.' '.$pcnter.'</a><br>';
            $pcnter++;
        }
    }
}
// функции: список треков
function filelist() {
    $linklist = ['https://music.youtube.com/', 'https://muzofond.fm/', 'http://listen6.myradio24.com:9000/1124', 'https://coveradio.net/rock', 'https://music.yandex.ru/', 'https://www.spotify.com/'];
    $namelist = ['youtube music', 'muzofond.fm (рекоменуется взаимодействие через <a href="https://vk.com/id596690690" style="color: #D4D4D4; margin-left: 0;">arhtools</a>)', 'myradio24 - рок', 'coveradio - каверы', 'яндекс музыка', 'spotify (не рекомендуется - блокировка граждан РФ)'];
    $llist = 0;
    while ($llist < count($linklist)) {
        echo '<div class="li_name"><p>- '.$namelist[$llist].'</p><br><a href="'.$linklist[$llist].'">'.$linklist[$llist].'</a></div><br>';
        $llist++;
    }
}

// линк&текст
function nl($resst) {
    $nltxt = 'files/Павел Пламенев - За седьмым перевалом!.mp3'; //заглушка

    if ($resst == 0) {
        $nltxt1 = str_replace('files/', '', $nltxt);
    }
    if ($resst == 1) {
        $nltxt1 = '"'.$nltxt.'"';
    }
    echo $nltxt1;
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

    <div class="container">
        <!-- сайдбар -->
        <div class="sidebar">
            <!-- секция N1 -->
            <section class="lib">
                <a class="section_library" href="lib.php"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
            </section>
            <!-- end секция N1 -->
            <!-- секция N2 -->
            <section class="playlists">
                <h1 class="section_name">Плейлисты:</h1>
                <div class="sct_cla1">
                    <?php listt(0) ?>
                </div>
            </section>
            <!-- end секция N2 -->
            <!-- секция N3 -->
            <section class="userslist">
                <h1 class="section_name">Авторы&группы:</h1>
                <div class="sct_cla2">
                    <?php listt(1) ?>
                </div>
            </section>
            <!-- end секция N3 -->
        </div>
        <!-- end сайдбар -->

        <!-- контент -->
        <div class="main">
            <!-- секция N21 -->
            <section>
                <h1 class="section_trackslist">Библиотека</h1>
                <div class="sct_clb1">
                    <?php filelist() ?>
                </div>
            </section>
            <!-- end секция N21 -->
        </div>
        <!-- end контент -->
    </div>

    <!-- подвал -->
    <footer>
        <p><?php nl(0); ?></p>
        <audio controls preload="metadata" id="my-audio">
            <source src=<?php nl(1) ?> type="audio/mpeg">
            функция не поддерживается браузером
        </audio>
    </footer>
    <!-- end подвал -->
</body>
<!-- end тело сайта -->

</html>