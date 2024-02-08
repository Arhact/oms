<?php
function filelist() {
    $dir = 'clipboard/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].'/service/'.$dir);
    foreach ($f as $file){
        if(preg_match('/\.(mp3)/', $file)){
            unlink($dir.$file);
        }
    }
}
filelist();
header("Location:http://webplayer");
?>