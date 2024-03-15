<?php
    $link = mysqli_connect("localhost", "u0299871_mobil1", "qweqweasmobil1", "u0299871_kdmobil_new"); 
	$marka = $_POST['marka'];
    if (!$link) {
       printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
       exit;
    }

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* change character set to utf8 */
if (mysqli_set_charset($link, "utf8")) {
}


if ($result = mysqli_query($link, "SELECT * FROM `mb_avto` WHERE `marka`='$marka'")) {


    /* Выборка результатов запроса */
    while( $row = mysqli_fetch_assoc($result) ){
         $models = $row['model'];
         $model_arr = explode("&", $models);
         echo '<span class="article_tabs">Выберите модель '.$marka.':</span>';
              for ($i = 0; $i <= count($model_arr); $i++) 
                  {
                     echo "<input type='radio' name='model' id='".$model_arr[$i]."' value='".$model_arr[$i]."'><label class='marka_name_sm' onclick='tabs_list(2)' for='".$model_arr[$i]."'><span class='marka_name'>".$model_arr[$i]."</span></label>";
                  }
    }

    /* Освобождаем используемую память */
    mysqli_free_result($result);
}



?>
