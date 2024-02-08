<?php ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL); ?>
<!-- html код -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- немного SEO-оптимизации -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Веб-плеер. Проект студента Бурдин В.Д. группы ИСр21-1.">
    <title>Веб-плеер</title>
    <!-- подключенные файлы, шрифты -->
    <?php include 'service/fpv.php'; ?>
	<link rel="stylesheet" type="text/css" href="service/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/ussrstencil.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
function filelist($choice) {
    $dir = '/files/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir);

    $mp3cnter = 0;
    $mp3list = [];
    if($choice==1){
        foreach ($f as $file){
            if(preg_match('/\.(mp3)/', $file)){
                $mp3list[] = $dir.$file;
            }
        }
        return $mp3list[0];
    }
    elseif ($choice==2) {
        foreach ($f as $file){
            if(preg_match('/\.(mp3)/', $file)){
                echo '<button class="mprname" id="mp3key'.$mp3cnter.'" value="'.$dir.$file.'"><p>- '.$file.'</p></button><br>';

                $mp3list[] = $dir.$file;
                $mp3cnter++;
            }
        }
        echo '<input type="hidden" id="listcnt" value="'.$mp3cnter.'">';
    }
    
}
// линк&текст
function nl($resst) {
    $nltxt = filelist(1);

    if ($resst == 0) {
        $nltxt1 = '- '.str_replace('/files/', '', $nltxt);
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
            <img src="images\logo.png" alt="arhact">
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
                <h1 class="section_trackslist">Список треков:</h1>
                <div class="sct_clb1">
                    <?php filelist(2) ?>
                </div>
            </section>
            <!-- end секция N21 -->
        </div>
        <!-- end контент -->
    </div>
    <!-- подвал -->
    <footer>
        <p id='mp3name'><?php nl(0); ?></p>
        <audio controls id="myaudio" volume="-5000">
            <source id='mp3src' src=<?php nl(1) ?> type="audio/mpeg">
            функция не поддерживается браузером
        </audio>
    </footer>
    <!-- end подвал -->
    <!-- script -->
    <script src="service/mp3script.js?v=1"></script>
</body>
<!-- end тело сайта -->

</html>