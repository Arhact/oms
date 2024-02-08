<?php ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL); // костыль. прячет вывод ошибок ?>

<!DOCTYPE html>
<style> ::-webkit-scrollbar-thumb{ border-left: 20px solid #578044 !important; } </style>
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
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<!-- php код -->
<?php

// скелет нажималок
function m_link(string $name, string $link){
    $res = '<br><form method="post" action="service/download.php" target="_self" rel="nofollow" download="'.$name.'.mp3"><input name="linkurl" value="'.$link.'" hidden><input name="filename" value="'.$name.'" hidden><button class="link">'.$name.'</button></form>';
    echo $res;
}

function mp3list($fword){
    $html = file_get_contents('https://muzofond.fm/search/'.$fword);
    $hrefs = explode('<li class="item"', $html);

    // отрезаем пустой элемент + рекомендации с сайта
    $cnter = 0;
    while ($cnter <= 10) {
        unset($hrefs[$cnter]);
        $cnter++;
    }

    $check = false;
    foreach($hrefs as $hrfelem){
        $arhref0 = explode('data-url="', $hrfelem);
        $arhref0 = explode('"', $arhref0[1]);
        if($arhref0[0]==NULL){break;} // в комплексе с первым костылем режет нижние рекомендации
        $arhref1 = explode('class="artist">', $hrfelem);
        $arhref1 = explode('</', $arhref1[1]);
        $arhref2 = explode('class="track">', $hrfelem);
        $arhref2 = explode('</', $arhref2[1]);

        $res = m_link($arhref1[0].' - '.$arhref2[0], $arhref0[0]);
        echo $res;
        $check = true;
    }
    if ($check == false){echo 'ошибка: трек и/или автор не найден';}
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
    		<a href="service/clear.php">очистка хранилища</a>
        </nav>
        <div class="search_field">
            <form method="post" action="mp3list.php">
                <input type="text" id="search" placeholder="скачать" name="search" value="">
                <input type="submit" value="вперёд">
            </form>
        </div>
    </header>
    <!-- end шапка -->
    <div class="container">
        <div class="main" style="max-width: 100%;">
            <?php
                if (!empty($_POST['search'])){
                    mp3list($_POST['search']);
                }else{
                    echo 'ошибка: введите название и/или автора трека';
                }
            ?>
        </div>
    </div>

    <footer></footer>
    <!-- end подвал -->
</body>
<!-- end тело сайта -->
</html>