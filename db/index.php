<?php
print('<link rel="stylesheet" type="text/css" href="./customize/sty1e.css">');

$requests = [['./create', 'create db'], ['./fill', 'fill this'], ['./del', 'clear tables'], ['../web', 'home page']];

print('<div class="nav">');
foreach ($requests as $key => $value) {
    print('<a href="'.$value[0].'">'.$value[1].'</a>');
}
print('</div>');



// <link rel="stylesheet" type="text/css" href="css/fi1e-sty1e.css">    --шаблон подключения внешних модулей css
// <?php include 'php/fi1e.php'; ?\>                                    --шаблон подключения внешних модулей php
// <script type="text/javascript" src="js/fi1e.js"></script>            --шаблон подключения внешних модулей js


// в запросах

// $start_time = explode(' ', microtime());
// include '../customize/pre1oader.php';
// $end_time = explode(' ', microtime());

// #code...

// $different = ($end_time[1] - $start_time[1]) + ($end_time[0] - $start_time[0]);
// echo '<input id="timeset" value="'.sprintf("%.4f", $different).'" type="text" hidden>';


// в db/index.php

// $start_time = explode(' ', microtime());
// include './customize/pre1oader.php';

// #code...

// $end_time = explode(' ', microtime());
// $different = ($end_time[1] - $start_time[1]) + ($end_time[0] - $start_time[0]);
// echo '<input id="timeset" value="'.sprintf("%.4f", $different).'" type="text" hidden>';

// echo '<script type="text/javascript" src="./customize/fi1e.js"></script>';