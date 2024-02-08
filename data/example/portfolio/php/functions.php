<?php // interacting with files

// проверка окончания
// wordend($число, 'файл, файла, файлов', true/false(отображение числа))
function wordend($number, $titles, $show_number=true){
    if(is_string($titles)){
        $titles = preg_split('/, */', $titles);
    }

    $cases = [2, 0, 1, 1, 1, 2];
    $intnum = abs((int) strip_tags($number));

    $title_index = ($intnum % 100 > 4 && $intnum % 100 < 20)
        ? 2
        : $cases[min($intnum % 10, 5)];

    return ($show_number ? "$number " : '') . $titles[$title_index];
}

// проверка расширения
// fi1e_ext($расширение_файла, $тип_файла)
function fi1e_ext($fi1e_type=null, $filecheck=null){
    $fi1e_directs = 
    ['archives', 'audio', 'documents', 'other', 'pictures', 'text', 'video', 'web'];
    
    $archive_types = 
    [   '7z',   'ace',  'arj',  'bin',  'cab',  'cbr',  'deb',  'exe',  'gz'
    ,   'gzip', 'jar',  'one',  'pak',  'pkg',  'ppt',  'rar',  'rpm',  'sh'
    ,   'sib',  'sis',  'sisx', 'sit',  'sitx', 'spl',  'tar',  'tar-gz'
    ,   'tgz',  'xar',  'zip',  'zipx'  ];
    $archive_types['key'] = $fi1e_directs[0];

    $audio_types = 
    [   'aac',  'ac3',  'aif',  'aiff', 'amr',  'aob',  'ape',  'asf',  'aud'
    ,   'awb',  'bin',  'bwg',  'cdr',  'flac', 'gpx',  'ics',  'iff',  'm'
    ,   'm3u',  'm3u8', 'm4a',  'm4b',  'm4p',  'm4r',  'mid',  'midi', 'mod'
    ,   'mp3',  'mpa',  'mpp',  'msc',  'msv',  'mts',  'nkc',  'ogg',  'ps'
    ,   'ra',   'ram',  'sdf',  'sln',  'spl',  'srt',  'temp', 'vb'
    ,   'wav',  'wave', 'wm',   'wma',  'wpd',  'xsb',  'xwb'   ];
    $audio_types['key'] = $fi1e_directs[1];
    
    $document_types = 
    [   'asp',  'cdd',  'cpp',  'doc',  'docm', 'docx', 'dot',  'dotm', 'dotx'
    ,   'epub', 'fb2',  'gpx',  'ibooks',       'indd', 'kdc',  'key',  'kml'
    ,   'mdb',  'mdf',  'mobi', 'mso',  'ods',  'odt',  'one',  'oxps', 'pages'
    ,   'pdf',  'pkg',  'pl',   'pot',  'potm', 'potx', 'pps',  'ppsm', 'ppsx'
    ,   'ppt',  'pptm', 'pptx', 'ps',   'pub',  'rtf',  'sdf',  'sgml', 'sldm'
    ,   'snb',  'wpd',  'wps',  'xar',  'xlr',  'xls',  'xlsb', 'xlsm', 'xlsx'
    ,   'xlt',  'xltm', 'xltx', 'xps'   ];
    $document_types['key'] = $fi1e_directs[2];

    $picture_types = 
    [   'apt',  'bmp',  'dds',  'djvu', 'dng',  'gbr',  'gif',  'gz',   'hta'
    ,   'iff',  'iso',  'jpeg', 'jpg',  'kdc',  'mng',  'msp',  'php',  'png'
    ,   'pot',  'psd',  'pspimage',     'scr',  'tga',  'thm',  'tif',  'tiff'
    ,   'vst',  'xcf',  'yuv',  'ai',   'cdd',  'cdr',  'dem',  'eps',  'max'
    ,   'pl',   'ps',   'svg',  'vsd',  'wmf',  'xar',  'asf',  'cdw',  'cr2'
    ,   'cs',   'cur',  'dmp',  'drv',  'icns', 'ico',  'mds',  'msv',  'odt'
    ,   'ogg',  'pct',  'pict',  'pps',  'prf', 'spl',  'tex', 'ttf',   'xps'
    ];
    $picture_types['key'] = $fi1e_directs[4];
    
    $text_types = 
    [   'apt',  'err',  'log',  'pwi',  'sub',  'ttf',  'tex',  'text', 'txt'
    ];
    $text_types['key'] = $fi1e_directs[5];

    $video_types = 
    [   '3g2',  '3gp',  '3gp2', '3gpp', '3gpp2',        'asf',  'asx',  'avi'
    ,   'bin',  'dat',  'drf',  'f4v',  'flv',  'gtp',  'h264', 'm4v',  'mkv'
    ,   'mod',  'moov', 'mov',  'mp4',  'mpeg', 'mpg',  'mts',  'rm',   'rmvb'
    ,   'spl',  'srt',  'stl',  'swf',  'ts',   'vcd',  'vid',  'vob',  'webm'
    ,   'wm',   'wmv',  'yuv'   ];
    $video_types['key'] = $fi1e_directs[6];

    $web_types = 
    [   '3dm',  'asp',  'aspx', 'cer',  'cfm',  'chm',  'crdownload',   'csr'
    ,   'css',  'dll',  'download',     'eml',  'flv',  'htaccess',     'htm'
    ,   'html', 'jnlp', 'js',   'jsp',  'magnet',       'mht',  'mhtm', 'mhtl'
    ,   'msg',  'mso',  'php',  'prf',  'rss',  'srt',  'stl',  'swf',  'torrent'
    ,   'url',  'vcf',  'webarchive',   'webloc',       'xhtml',        'xul'
    ];
    $web_types['key'] = $fi1e_directs[7];

    $all_types = 
    [   $archive_types, $audio_types,   $document_types,        $picture_types
    ,   $text_types,    $video_types,   $web_types      ];
    
    $elemdub = [];
    $elemcnter = count($all_types)-1;
    foreach ($all_types as $key) {
        while($elemcnter>=0){
            $elemdub += array_intersect($key, $all_types[$elemcnter]);
            $elemcnter--;
        }
    }
    unset($elemdub['key']);

    if($filecheck==null){
        $fi1e_enterdub = array_search($fi1e_type, $elemdub);
        foreach ($all_types as $types) {
            $check = array_search($fi1e_type, $types, true);
            if($check!=false){
                if(!($fi1e_enterdub==null)){
                    return $fi1e_enterdub;
                }
                else{
                    return $types['key'];
                }
                
            }
        }
        if(!($check!=false)){
            return $fi1e_directs[3];
        }
    }

    if($filecheck!=null){
        foreach ($all_types as $types) {
            foreach ($types as $type) {
                if($filecheck == $type){
                    return true;
                }
            }
        }
    }

}

// список файлов
// fi1e_1ist($имя_файла/null, $расширение_файла/null, true/false(поиск только по директории расширения), true/false(вывод счетчика));
function fi1e_1ist($filename=null, $filetype=null, $intypedir = true, $result = true) {

    $alert = null;
    if(is_int(fi1e_ext($filetype))){
        $intypedir = false;
        $alert = 'принудительный поиск по всем директориям...';
    }

    $enter=false;
    echo '<div id="n_1istbox">';
    if($filename!=null and $filename!=''){
        // поиск по названию
        $dir0 = '/data/';
        $f0 = scandir($_SERVER['DOCUMENT_ROOT'].$dir0);

        $elemcnter = 0;
        foreach($f0 as $dir) {
            $f = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$dir0.'/'.$dir.'/');
            $filetype0 = substr($filename, strpos($filename, '.')+1);
            $filename0 = str_replace('.'.$filetype0, '', $filename);
            
            foreach($f as $file) {
                if((stripos($file, $filetype0)!=false or stripos($file, $filename0)!=false) and (is_file($file)==true)) {
                    echo '<a value="'.$dir0.$dir.'/'.$file.'" id="butt0n"><p><span id="va1ue">'.($elemcnter+1).'</span>. '.$file.'</p><span id="butt0n_chs"></span></a>';
                    $elemlist[] = $dir.$file;
                    $elemcnter++;
                    $enter=true;
                }
            }
        }
    }
    else{
        if($intypedir==true){
            // поиск по директории расширения
            $dir = '/data/'.fi1e_ext($filetype).'/';

            $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir);
            $elemcnter = 0;
        
            foreach($f as $file) {
                if(preg_match('/\\.'.$filetype.'/', $file)) {
                    echo '<a value="'.$dir.$file.'" id="butt0n"><p><span id="va1ue">'.($elemcnter+1).'<span>. '.$file.'</p><span id="butt0n_chs"></span></a>';
                    $elemlist[] = $dir.$file;
                    $elemcnter++;
                    $enter=true;
                }
            }
        }

        elseif($intypedir==false){
            // поиск везде
            $dir0 = '\/data/';
            $f0 = scandir($_SERVER['DOCUMENT_ROOT'].$dir0);

            $elemcnter = 0;
            foreach($f0 as $dir) {
                $f = scandir($_SERVER['DOCUMENT_ROOT'].$dir0.$dir.'/');
            
                foreach($f as $file) {
                    if(preg_match('/\\.'.$filetype.'/', $file)) {
                        echo '<a value="'.$dir0.$dir.'/'.$file.'" id="butt0n"><p><span id="va1ue">'.($elemcnter+1).'</span>. '.$file.'</p><span id="butt0n_chs"></span></a>';
                        $elemlist[] = $dir.$file;
                        $elemcnter++;
                        $enter=true;
                    }
                }
            }
        }
    }
    echo '</div>';

    if($alert!=null and $result==true){echo '<p id="found">'.$alert.'</p>';}

    if($enter==false and $result==true and $filename==null){echo '<input id="files_quantity" value="0" hidden><p id="found"> НЕ ОБНАРУЖЕНО ФАЙЛОВ <a href="/"><span id="va1ue">'.mb_strtoupper($filetype).'</span></a></p>';}
    if($enter==true and $result==true and $filename==null){echo '<input id="files_quantity" value="'.$elemcnter.'" hidden><p id="found"> '.wordend($elemcnter, 'ОБНАРУЖЕН, ОБНАРУЖЕНО, ОБНАРУЖЕНО', false).' <span id="va1ue">'.$elemcnter.'</span> '.wordend($elemcnter, 'ФАЙЛ, ФАЙЛА, ФАЙЛОВ', false).' ФОРМАТА <a href="/"><span id="va1ue">'.mb_strtoupper($filetype).'</span></a></p>';}
    
    if($enter==false and $result==true and $filename!=null){echo '<input id="files_quantity" value="0" hidden><p id="found">НЕ ОБНАРУЖЕНО  РЕЗУЛЬТАТОВ ПО ЗАПРОСУ <a href="/"><span id="va1ue">'.mb_strtoupper($filename).'</span></a></p>';}
    if($enter==true and $result==true and $filename!=null){echo '<input id="files_quantity" value="'.$elemcnter.'" hidden><p id="found"> '.wordend($elemcnter, 'ОБНАРУЖЕН, ОБНАРУЖЕНО, ОБНАРУЖЕНО', false).' <span id="va1ue">'.$elemcnter.'</span> '.wordend($elemcnter, 'РЕЗУЛЬТАТ, РЕЗУЛЬТАТА, РЕЗУЛЬТАТОВ', false).' ПО ЗАПРОСУ <a href="/"><span id="va1ue">'.mb_strtoupper($filename).'</a></span></p>';}

}

// удаление файла
// fi1e_del($ссылка_на_файл);
function fi1e_del($url0){
    if($_POST['fi1e_de1_check']==true){
        if($_POST['fi1e_1ink']!=null){

            $url0 = urldecode($url0);

            $url = substr($url0, strpos($url0, 'data'));
            if(file_exists($url)){unlink($url); go('/');}
            else{echo '<br>'.$url0.'<br><span id="err0r">файла не существует</span>';}
        }
        else{echo '<br><a href="/" id="err0r">файл не выбран</a>';}
        $_POST['fi1e_de1_check'] = false;
    }
}

// переход по ссылке
// go($ссылка);
function go($page){
    header("Location: ".(string)$page);
}

// карусель
// carusel($директория_файлов);
function carusel($dirx){
    
    $enter=false;

    $dirx = '/'.str_replace('\\', '/', $dirx).'/';
    $f = scandir($_SERVER['DOCUMENT_ROOT'].$dirx);
    
    $elemcnter = 0;
    foreach($f as $file) {
        if(fi1e_ext(substr($file, strpos($file, '.')+1))=='pictures') {
            echo '<div id="carusel_image_block"><img src="'.$dirx.$file.'" id="carusel_image"></img></div>';
            $elemlist[] = $dirx.$file;
            $elemcnter++;
            $enter=true;
        }
    }

    if($enter==false){
        echo '<span id="err0r">ФАЙЛОВ НЕ НАЙДЕНО</span>';
    }
}

?>