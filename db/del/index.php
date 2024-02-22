<?php
print('<link rel="stylesheet" type="text/css" href="../customize/sty1e.css">');
print('<div class="nav"><a href="../">back</a></div>');

$db = [
    'host'=>'localhost',
    'user'=>'root',
    'password'=>'',
    'name'=>'oms',
];

try {
    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);
    function clear($link) {
        // clean
        $tables = ['Good', 'Organization', 'User', 'Price', 'Order'];
        for ($tb=0; $tb < count($tables); $tb++) { 
            $query_clear = "DELETE FROM `oms`.`".$tables[$tb]."`";
            mysqli_query($link, $query_clear);
        }
    }
    clear($link);

    echo '<br>Its clear? i think...';
    
} catch (\Throwable $th) {

    echo '<br>Nope. Request error, here we go again';
}

echo '<script type="text/javascript" src="../customize/fi1e.js"></script>';
