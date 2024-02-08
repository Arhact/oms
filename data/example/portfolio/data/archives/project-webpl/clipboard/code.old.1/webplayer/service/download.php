<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веб-плеер: о нас</title>
    <!-- подключенные файлы, шрифты -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fonts/ussrstencil.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
</head>
<html>
    <body>
        <div class="forml">
            <a href="http://webplayer" class="backdnl">на главную...</a><br><br>
            <? btn(); ?>
        </div>
    </body>
</html>

<?php
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
    curl_download($_POST['linkurl'], 'clipboard/'.$_POST['filename'].'.mp3');
    echo '<a class="mp3download" href="clipboard/'.$_POST['filename'].'.mp3" rel="nofollow" download>Скачать "'.$_POST['filename'].'"</a>';
}
?>