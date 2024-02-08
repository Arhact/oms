<!-- 1280×720 -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <?php include '../functions.php'; ?>
    <title>RHAX DATA</title>

</head>
<body>

<section>
    <div class="player">
        <video id="video" width="800" height="600" controls loop preload="auto" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            <source src="" type="">
        </video>
    </div>
</section>
<section>
    <h3 id="content_aact0">_ROOT: ВИДЕО</h3>
    <div id="content0">
        <? loadlist('mp4'); ?>
    </div>
    
    <h3 id="content_del">_ROOT: УДАЛЕНИЕ ФАЙЛОВ</h3>
    <div id="del">
        <form method="POST" id="del_load">
            <input name="del_enter_field" id="del_enter_field" type="text"/>
            <input name="filedel" value="true" hidden />
            <label>
                <input type="submit" hidden />
                <a id="del_enter">УДАЛИТЬ</a>
            </label>
        </form>

        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['filedel'])){
                $filename = $_POST['del_enter_field'];

                if (file_exists($filename)) {
                    unlink($filename);
                    go('');
                } else {
                    echo '<p>ошибка удаления файла<p>';
                }
            }
        ?>
    </div>

    <h3 id="content_load">_ROOT: ПОИСК ПО НАЗВАНИЮ</h3>
    <div id="link_load">
        <input id="link_enter_field" type="text"/>
        <a id="link_enter" value="https://rule34video.com/search/">ПЕРЕЙТИ</a>
    </div>
        
</section>
<a href="/"><p>_ROOT: НА ГЛАВНУЮ<p></a>

</body>
<script type="text/javascript" src="../script.js"></script>
</html>