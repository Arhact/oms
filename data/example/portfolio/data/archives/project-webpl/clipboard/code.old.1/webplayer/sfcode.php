<?php //include 'sfcode.php'; ?>

<?php
// service functions code

// отмена отображения ошибок
function noerrdisplay() {
    // ini_set('display_errors', 0);
    // ini_set('display_startup_errors', 0);
    // error_reporting(E_ALL);
}

// подключение файлов
function allimports() {
    noerrdisplay();
    echo '<!DOCTYPE html>'
    .'<html lang="ru">';
    echo '<meta charset="UTF-8">'
    .'<meta http-equiv="X-UA-Compatible" content="IE=edge">'
    .'<meta name="viewport" content="width=device-width, initial-scale=1.0">'
    .'<meta name="description" content="Веб-плеер. Проект студента Бурдин В.Д. группы ИСр21-1.">';
    echo '<link rel="stylesheet" type="text/css" href="style.css">'
    .'<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">'
    .'<link rel="shortcut icon" type="image/x-icon" href="files/favicon.ico">';
}

// header - тех. страницы, ветвь 1
function headcode() {
    echo '<header>
    <div class="logo">
        <a id="00a" onclick="document.cookie = \'pagecd=\'+this.id;" href="http://webplayer"><img src="files/logo.png" alt="logo"></a>
    </div>
    <nav>
        <a id="00a" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">на главную</a>
        <a id="01b" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">о нас</a>
        <a id="02b" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">обратная связь</a>
    </nav>

    <div class="search_field">
        <form method="post" action="/">
            <input type="text" id="search" placeholder="скачать" name="search" value="">
            <input type="submit" id="00f" onclick="document.cookie = \'pagecd=\'+this.id;" value="вперёд">
        </form>
    </div>
    </header>';
}

// список файлов, первый файл
function filelist($choice) {
    $dir = '/files/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir);
    $mp3cnter = 0;
    $mp3list = [];
    if($choice==1){
        foreach($f as $file) {
            if(preg_match('/\.(mp3)/', $file)) {
                $mp3list[] = $dir.$file;
            }
        }
        if(!isset($mp3list[0])) {
            return 'ERR';
        }
        else{
            return $mp3list[0];
        }
    }
    elseif($choice==2) {
        foreach($f as $file) {
            if(preg_match('/\.(mp3)/', $file)) {
                echo '<button class="mprname" id="mp3key'.$mp3cnter.'" value="'.$dir.$file.'"><p>- '.$file.'</p></button><br>';
                $mp3list[] = $dir.$file;
                $mp3cnter++;
            }
        }
        echo '<input type="hidden" id="listcnt" value="'.$mp3cnter.'">';
    }
    
}

// очистка файлов
function fileclear() {
    $dir = 'files/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$dir);
    foreach ($f as $file){
        if(preg_match('/\.(mp3)/', $file)){
            unlink($dir.$file);
        }
    }
}

// данные для первого трека в плеере
function nlck($resst) {
    $nltxt = filelist(1);

    if(filelist(1)=='ERR'){
        echo '_ROOT: DIRECTORY EMPTY';
    }
    else {
        // $nltxt = '/files/Ezio\'s Family - Cover by Dryante & Acarielle.mp3';

        if($resst == 0) {
            $nltxt1 = str_replace('/files/', '', $_COOKIE['mp3l']);
        }
        if($resst == 1) {
            $nltxt1 = '"'.$_COOKIE['mp3l'].'"';
        }
        echo $nltxt1; 
    }
}
function nlnock($resst) {
    $nltxt = filelist(1);

    if(filelist(1)=='ERR'){
        echo '_ROOT: DIRECTORY EMPTY';
    }
    else {
        // $nltxt = '/files/Ezio\'s Family - Cover by Dryante & Acarielle.mp3';

        if($resst == 0) {
            $nltxt1 = str_replace('/files/', '', $nltxt);
        }
        if($resst == 1) {
            $nltxt1 = '"'.$nltxt.'"';
        }
        echo $nltxt1; 
    }
}

// функции: плейлисты&группы --заглушка
function listt($nert) {
    $plist = array_fill(0, 30, 'test playlist'); // заглушка
    $ulist = array_fill(0, 6, 'test autor'); // заглушка
    $pcnter = 0; // тем более заглушка (=
    if($nert == 0) {
        foreach ($plist as $pval) {
            echo '<a>'.$pval.' '.$pcnter.'</a><br>';
            $pcnter++;
        }
    }
    if($nert == 1) {
        foreach ($ulist as $uval) {
            echo '<a>'.$uval.' '.$pcnter.'</a><br>';
            $pcnter++;
        }
    }
}

// frequency pseudo-visualization, или частотная псевдовизуализация
?>
<style>
    .qtback{
        position: fixed;
        height: 100%;
    }
    .columns0{
        width: 100%;
    }
    .muscolstyle{
        opacity: .4;
        font-size: 26px;
        overflow: hidden;
        color: #D4D4D4;
        /* color: #252526; */
    }
    .muscolstyle span{
        font-size: 26px;
        color: red;
    }
    .muscolstyle a{
        font-size: 26px;
        color: #363C49;
    }
    <?php
        // style для ленивых
        $cor = 0;
        while($cor<=17){
            $kfr = 2; /*шаг*/ $kfstart = 0 + $kfr; $kfend = 100 - $kfr;
            echo '.column'.$cor.'{ width: 80%; animation: mb'.$cor.' '.mt_rand(5,15) /* скорость */.'s ease-in-out infinite; }'.'@keyframes mb'.$cor.'{ 0% { width: 0%; }';
            while($kfstart<=$kfend){ echo $kfstart.'% { width: '.mt_rand(1,100).'%; }'; $kfstart += $kfr; }
            echo '100% { width: 0%; } }';
            $cor++;
        }
    ?>
</style>
<?php
function freqpvanimation(){
    echo '<div class="qtback"><div class="columns0">';
    $colcnt = 0; while($colcnt<=17){ echo '<div class="column'.$colcnt.' muscolstyle"><a>|</a>|||||||||<span>|||</span></div>'; $colcnt++; };
    echo '</div></div>';
}

// список рекомендуемых платформ
function rlinklist() {
    $linklist = ['https://music.youtube.com/', 'https://muzofond.fm/', 'http://listen6.myradio24.com:9000/1124', 'https://coveradio.net/rock', 'https://music.yandex.ru/', 'https://www.spotify.com/'];
    $namelist = ['youtube music', 'muzofond.fm (рекоменуется взаимодействие через <a href="https://vk.com/id596690690" style="color: #D4D4D4; margin-left: 0;">arhtools</a>)', 'myradio24 - рок', 'coveradio - каверы', 'яндекс музыка', 'spotify (не рекомендуется - блокировка граждан РФ)'];
    $llist = 0;
    while ($llist < count($linklist)) {
        echo '<div class="li_name"><p>- '.$namelist[$llist].'</p><br><a href="'.$linklist[$llist].'">'.$linklist[$llist].'</a></div><br>';
        $llist++;
    }
}

// скелет нажималок
function m_link(string $name, string $link){
    $res = '<br><form method="post" action="/" target="_self" rel="nofollow" download="'.$name.'.mp3"><input name="linkurl" value="'.$link.'" hidden><input name="filename" value="'.$name.'" hidden><button id="01f" onclick="document.cookie = \'pagecd=\'+this.id;" class="link">'.$name.'</button></form>';
    echo $res;
}

// список файлов&ссылок
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

// очистка запроса от данных сайта & загрузка файла
function curl_download($url, $file){
    $dest_file = @fopen($file, "w");
    $resource = curl_init();
    curl_setopt($resource, CURLOPT_URL, $url);
    curl_setopt($resource, CURLOPT_FILE, $dest_file);
    curl_setopt($resource, CURLOPT_HEADER, 0);
    curl_exec($resource);
    curl_close($resource);
    fclose($dest_file);
}

function btn(){
    curl_download($_POST['linkurl'], 'files/'.$_POST['filename'].'.mp3');
    echo '<a class="mp3download" href="files/'.$_POST['filename'].'.mp3" rel="nofollow" download>Скачать "'.$_POST['filename'].'"</a>';
}

?>