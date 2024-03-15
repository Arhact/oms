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
    function randkey($len){
        // OF000000004
        $key = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ00000';
        return substr(str_shuffle($key), 0, $len);
    }
    function randname($len){
        $key = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ00000      ';
        return substr(str_shuffle($key), 0, $len);
    }
    
    function clear($link) {
        // clean
        $tables = ['Good', 'Organization', 'User', 'Price', 'Order'];
        for ($tb=0; $tb < count($tables); $tb++) { 
            $query_clear = "DELETE FROM `oms`.`".$tables[$tb]."`";
            mysqli_query($link, $query_clear);
        }
    }
    clear($link);

    function insert($link, $query_insert, $cnt=10) {
        while ($cnt > 0) {
            mysqli_query($link, $query_insert);
            $cnt -= 1;
        }
    }
    
    $query_insert = "INSERT INTO `Good` (`id`, `code`, `name`) VALUES (NULL, '".randkey(11)."', '".randname(100)."');";
    insert($link, $query_insert);
    // --
    $query_insert = "INSERT INTO `Organization` (`id`, `name`) VALUES (NULL, '".randname(45)."');";
    insert($link, $query_insert);
    // --
    $query_org_list = "SELECT `id` FROM `Organization` LIMIT 1;";
    $res = mysqli_query($link, $query_org_list);
    $id_org = mysqli_fetch_assoc($res)['id'];

    $query_insert = "INSERT INTO `User` (`id`, `id_organization`, `login`, `password`, `name`, `phone`, `squad`, `status`, `email`) 
    VALUES (NULL, '".$id_org."', '".randkey(20)."', '".randkey(25)."', '".randname(35)."', '".randkey(11)."', '".randname(10)."', '0', '".randname(35)."');";
    insert($link, $query_insert);
    // null user
    $query_insert = "INSERT INTO `User` (`id`, `id_organization`, `login`, `password`, `name`, `phone`, `squad`, `status`, `email`) 
    VALUES ('-1', '".$id_org."', 'admin', 'admin', 'ivanov ivan ivanovich', '89223334444', 'administrators', '1', 'thebestemail@gmail.com');";
    insert($link, $query_insert, 1);
    // --
    $query_good_list = "SELECT `id` FROM `Good` LIMIT 1;";
    $res = mysqli_query($link, $query_good_list);
    $id_good = mysqli_fetch_assoc($res)['id'];
    
    $retail = rand(2000, 20000);
    $wholesale = $retail - ($retail/100*10);
    $now = date("Y-m-d H:i:s");

    $query_insert = "INSERT INTO `Price` (`id`, `id_good`, `retail`, `wholesale`, `qt`, `datetime`) 
    VALUES (NULL, '".$id_good."', '".$retail."', '".$wholesale."', '".rand(1, 100)."', '".$now."');";
    insert($link, $query_insert);
    // --
    $query_user_list = "SELECT `id` FROM `User` WHERE `id`!=-1 LIMIT 1;";
    $res = mysqli_query($link, $query_user_list);
    $id_user = mysqli_fetch_assoc($res)['id'];

    $query_price_list = "SELECT * FROM `Price` LIMIT 1;";
    $res = mysqli_query($link, $query_price_list);
    $data_price = mysqli_fetch_assoc($res);
    
    $qt = rand(2, 50);
    $price = $data_price['wholesale']*$qt;
    $now = date("Y-m-d H:i:s");

    $query_insert = "INSERT INTO `Order` (`id`, `id_user`, `id_good`, `datetime`, `price`, `qt`, `status`) 
    VALUES (NULL, '".$id_user."', '".$data_price['id_good']."', '".$now."', '".$price."', '".$qt."', '0');";
    insert($link, $query_insert);
    // null order
    function insert_r($link, $data_price, $cnt=10) {
        while ($cnt > 0) {

            $qt = rand(2, 50);
            $price = $data_price['wholesale']*$qt;
            $now = date("Y-m-d H:i:s");

            $query_insert = "INSERT INTO `Order` (`id`, `id_user`, `id_good`, `datetime`, `price`, `qt`, `status`) 
            VALUES (null, '-1', '".$data_price['id_good']."', '".$now."', '".$price."', '".$qt."', '1');";

            mysqli_query($link, $query_insert);
            $cnt -= 1;
        }
    }
    
    insert_r($link, $data_price, 110);
    // --

    // output-----------------------------
    function output($link) {
        $tables = ['Good', 'Organization', 'User', 'Price', 'Order'];

        for ($tb=0; $tb < count($tables); $tb++) { 
            $query_org_list = "SELECT * FROM `".$tables[$tb]."`;";
            $dbdata = mysqli_query($link, $query_org_list);
            
            for ($data = []; $row = mysqli_fetch_assoc($dbdata); $data[] = $row);

            echo '<br><h1 class="kheadhelper">'.$tables[$tb].'</h1><table class="ktablehelper">';
            foreach ($data[0] as $kv => $value) {
                echo '<th>'.$kv.'</th>';
            }
            foreach ($data as $kr => $row) {
                echo '<tr>';
                foreach ($row as $kv => $value) {
                    echo '<td>'.$value.'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

        }
    }
    output($link);
    
    echo '<br>Its work? i think...';
} catch (\Throwable $th) {

    echo '<br>Nope. Request error, here we go again<br><br>'.$th;
}