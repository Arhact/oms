<!DOCTYPE html>
<html lang="ru" id="indexhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио: Бурдин Василий</title>

    <!-- подключение css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php include 'php/functions.php'; ?>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

</head>

<body>

<header>
    <a id="logo_1ink" href="/"><img src="img/logo.png" alt="logo"></a>

    <nav>
        <a id="element01" href="/">element 1</a>
        <a id="element02" href="/">element 2</a>
        <a id="element03" href="/">element 3</a>
    </nav>
    
    <form action="/" method="POST" id="fi1e_find">
        <input type="text" id="search" name="fi1e_data" value="" placeholder="имя файла" autocomplete="off" required>
        <input name="fi1e_find_check" value="true" hidden />
        <input type="submit" id="search_butt0n" value="вперёд">
    </form>
</header>

<div id="page">
    <div id="left-column">
        test left container text
    </div>

    <div id="center-column">
        <center>набор модулей</center>

        <section>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['fi1e_find_check'])){
                fi1e_1ist($_POST['fi1e_data'], null, false, true);
            }else{
                fi1e_1ist(null, 'mp3', false, true);
            }
             ?>
        </section>

        <section>
            <form action="/" method="POST" id="fi1e_de1">
                <input type="hidden" name="fi1e_de1_direct" value="" />
                <div id="form_group">
                    <input name="fi1e_1ink" type="text" placeholder="перетащите файл сюда" autocomplete="off">
                    <input name="fi1e_de1_check" value="true" hidden />
                    <label id="submit_button">
                        <input type="submit" hidden />
                        <span>УДАЛИТЬ&nbsp;ФАЙЛ</span>
                    </label>
                </div>
            </form>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['fi1e_de1_check'])){
                    fi1e_del($_POST['fi1e_1ink']);
                }
            ?>
        </section>
        
        <section>
            <form enctype="multipart/form-data" action="functions.php" method="POST" id="file_upload">
                <input type="hidden" name="upload_max_filesize" value="96000" />
                <input type="hidden" name="post_max_size" value="96000" />
                <input type="hidden" name="max_execution_time" value="96000" />
                <div id="form_load_group">
                    <label id="labl1">
                        <input name="userfile" type="file" hidden>
                        <span>Добавить файл</span>
                    </label>
                    <input name="fileload" value="true" hidden />
                    <label id="labl2">
                        <input type="submit" hidden />
                        <span>Загрузить на сервер</span>
                    </label>
                </div>
            </form>
        </section>

        <section>
            <div id="carusel_block">
                <div id="left_block"><div id="left_arrow"></div></div>
                <div id="center_block"><?php carusel('img\slider'); ?></div>
                <div id="right_block"><div id="right_arrow"></div></div>
            </div>
        </section>

        <? $mmm=20; while($mmm>=0){echo '<br>';$mmm--;}?>
    </div>
    
    <div id="right-column">
        test right container text
    </div>
</div>

<footer>
    test footer text
</footer>

</body>

<canvas>
</canvas>
<!-- подключение js -->
<!-- <script src="data\archives\Animatsia_chastits_Hexagonal_Motion\hexagonal motion — v 1\script.js"></script> -->
<script type="text/javascript" src="js/script.js"></script>
<!-- выбор фона: стиль&цвет 'xx, xx, xx' -->

<!-- серый: rgb(105, 105, 105);     -->
<!-- черный: rgb(37, 37, 38);       -->
<!-- зеленый: rgb(106, 153, 85);    -->
<!-- красный: rgb(139, 0, 0);       -->

<script>background(1, '106, 153, 85');</script>

</html>
<?php // шаблоны подключения

// <link rel="stylesheet" type="text/css" href="css/fi1e-sty1e.css">    --шаблон подключения внешних модулей css
// <?php include 'php/fi1e.php'; ?\>                                    --шаблон подключения внешних модулей php
// <script type="text/javascript" src="js/fi1e.js"></script>            --шаблон подключения внешних модулей js
?>