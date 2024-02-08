<?php

function num_decline( $number, $titles, $show_number = true ){
	if( is_string( $titles ) ){
		$titles = preg_split( '/, */', $titles );
	}

	$cases = [ 2, 0, 1, 1, 1, 2 ];
	$intnum = abs( (int) strip_tags( $number ) );

	$title_index = ( $intnum % 100 > 4 && $intnum % 100 < 20 )
		? 2
		: $cases[ min( $intnum % 10, 5 ) ];

	return ( $show_number ? "$number " : '' ) . $titles[ $title_index ];
}

function filelist($filetype) {
    $dir = '/'.$filetype.'/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir);
    $elemcnter = 0;
    $elemlist = [];

    foreach($f as $file) {
        if(preg_match('/\.'.$filetype.'/', $file)) {
            echo '<a href="'.$dir.$file.'"><p>'.$file.'</p></a>';
            $elemlist[] = $dir.$file;
            $elemcnter++;
        }
    }
    
    echo '<input id="content_quantity" value="'.$elemcnter.'" hidden><p id="found"> _ROOT: ОБНАРУЖЕНО '.num_decline( $elemcnter, 'ФАЙЛ, ФАЙЛА, ФАЙЛОВ' ).' ФОРМАТА '.mb_strtoupper($filetype).'</p>';
}

function loadlist($filetype) {
    $dir = '/'.$filetype.'/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir);
    $elemcnter = 0;
    $elemlist = [];
    
    foreach($f as $file) {
        if(preg_match('/\.'.$filetype.'/', $file)) {
            echo '<button id="content_choose'.$elemcnter.'" value="'.$dir.$file.'">'.$file.'</button>';
            $elemlist[] = $dir.$file;
            $elemcnter++;
        }
    }
    
    echo '<input id="content_quantity" value="'.$elemcnter.'" hidden><p id="found"> _ROOT: ОБНАРУЖЕНО '.num_decline( $elemcnter, 'ФАЙЛ, ФАЙЛА, ФАЙЛОВ' ).' ФОРМАТА '.mb_strtoupper($filetype).'</p>';
}

function go($page){
    header("Location: ".(string)$page);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['fileload'])){
    echo '<link rel="stylesheet" type="text/css" href="style.css">';

    if(preg_match('/\\.mp4/', $_FILES['userfile']['name'])){
        $uploaddir = 'mp4/';
    }
    else if(preg_match('/\\.mp3/', $_FILES['userfile']['name'])){
        $uploaddir = 'mp3/';
    }
    else{
        $uploaddir = 'files/';
    }

    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre class="load-data">';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Передача данных прошла успешно\n";
        echo 'Информация о файле: ';
    
        foreach ($_FILES as $val) {
            echo $val['name'].' ('.$val['type'].') - ';
            
            if(isset($val['size'])){
                if(((int)$val['size']/(1024**2))<1){
                    echo bcdiv(((int)$val['size']/(1024)), 1, 2).'Кб';
                }
                else if(((int)$val['size']/(1024**2))>501){
                    echo bcdiv(((int)$val['size']/(1024**3)), 1, 2).' Гб';
                }
                else{
                    echo bcdiv(((int)$val['size']/(1024**2)), 1, 2).' Мб';
                }
            }
        }
        echo '<br><br><a href="/"><p>_ROOT: НА ГЛАВНУЮ<p></a>';
    } else {
        echo "Ошибка передачи данных\n";
        echo '<br><br><a href="/"><p>_ROOT: НА ГЛАВНУЮ<p></a>';
    }

    print "</pre>";
}
?>