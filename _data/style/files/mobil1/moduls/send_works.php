<!doctype html>
   <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <meta charset="utf-8">
    <meta name = "robots" content = "noindex,nofollow">
    <meta http-equiv="Cache-Control" content="no-cache">

</head>
    

<?php

    $mysqli = new mysqli("localhost", "u0299871_records", "qweqweas2@", "u0299871_records");
    if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

    if (isset($_POST['marka'])) {
        $marka = $_POST['marka'];
        $marka = strip_tags($marka);
        $marka = htmlentities($marka, ENT_QUOTES, "UTF-8");
        $marka = htmlspecialchars($marka, ENT_QUOTES);
    }
    if (isset($_POST['model'])) {
        $model = $_POST['model'];
        $model = strip_tags($model);
        $model = htmlentities($model, ENT_QUOTES, "UTF-8");
        $model = htmlspecialchars($model, ENT_QUOTES);
    }
    if (isset($_POST['marka2'])) {
        $marka2 = $_POST['marka2'];
        $marka2 = strip_tags($marka2);
        $marka2 = htmlentities($marka2, ENT_QUOTES, "UTF-8");
        $marka2 = htmlspecialchars($marka2, ENT_QUOTES);
    }
    if (isset($_POST['model2'])) {
        $model2 = $_POST['model2'];
        $model2 = strip_tags($model2);
        $model2 = htmlentities($model2, ENT_QUOTES, "UTF-8");
        $model2 = htmlspecialchars($model2, ENT_QUOTES);
    }
    if (isset($_POST['phone'])) {
        echo $phone;
        $phone = $_POST['phone'];
        $phone = strip_tags($phone);
        $phone = htmlentities($phone, ENT_QUOTES, "UTF-8");
        $phone = htmlspecialchars($phone, ENT_QUOTES);
    }
    if (isset($_POST['out_works'])) {
        $works = $_POST['out_works'];
        $works = strip_tags($works);

        $works = htmlspecialchars($works, ENT_QUOTES);
    }
    else {
        $works = " ";
    }
    if (isset($_POST['year_w'])) {
        $year_w = $_POST['year_w'];
        $year_w = strip_tags($year_w);
        $year_w = htmlentities($year_w, ENT_QUOTES, "UTF-8");
        $year_w = htmlspecialchars($year_w, ENT_QUOTES);
    }
if ($marka == "xz") {
    $marka = $marka2;
    $model = $model2;
}



$auto = $marka .' '. $model . ' ' . $year_w; 
    $date_create= date("Y-m-d H:i:s");
    $mysqli->query( "SET CHARSET utf8" ); 
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    if (!$mysqli->query("INSERT INTO `orders` (name, phone, auto, price, date_create, date_order, time, description, status) VALUES ('', '$phone', '$auto', '', '$date_create', '', '', '$works','alert')")) {
    echo "Не удалось добавить заказ!";
        }
    else {
            echo "<span style='color:green; text-align:center; font-size:20px; display:block; font-weight:700;margin:50px 10px;'>Заказ добавлен!</span>";
        }
                    
?>
