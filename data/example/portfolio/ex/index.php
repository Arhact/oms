<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <?php include 'functions.php'; ?>
    <title>RHAX DATA</title>

</head>
<body>
<section>
    <h3 id="content_aact0">_ROOT: СПИСОК СОХРАНЕННЫХ ВИДЕО</h3>
    <div id="content0">
        <? filelist('mp4'); ?>
    </div>
    <a href="mp4/player.php" style="text-align: left;"><h3 id="content_aact01">_ROOT: ПЛЕЕР</h3></a>
</section>
<section>
    <h3 id="content_aact1">_ROOT: АУДИО</h3>
    <div id="content1">
        <a href="/mp3"><p>LINK'S</p></a>
    </div>
</section>
<section>
    <h3 id="content_aact2">_ROOT: ССЫЛКИ</h3>
    <div id="content2">
        <a href="http://portfolio/"><p>CODING</p></a>
        <a href="https://www.youtube.com/@gruzchik"><p>YOUTUBE: Gruzchik Tashit</p></a>
        <a href="https://rule34video.com/videos/3095170/murahachiro-yarichin-cockroach-penis/"><p>RULE34VIDEO: [Murahachiro]Yarichin cockroach penis</p></a>
        <a href="https://rule34video.com/videos/3099392/goutouren-haku-fucked-by-insects-cockroach-dog/"><p>RULE34VIDEO: [Goutouren] Haku fucked by insects, cockroach, dog</p></a>
        <a href="https://rule34video.com/videos/3095471/cockroach-cock-nude-version-murahachiro/"><p>RULE34VIDEO: Cockroach Cock (Nude Version) - Murahachiro</p></a>
        <a href="https://rule34video.com/videos/3089059/male-daughter-3-murahachiro/"><p>RULE34VIDEO: Male Daughter 3 - Murahachiro</p></a>
        <a href="https://rule34video.com/videos/3099445/miaoshaquan-keqing-stuck-in-wall-and-fucked-by-cockroach/"><p>RULE34VIDEO: [Miaoshaquan] Keqing stuck in wall and fucked by cockroach</p></a>
        <a href=""><p></p></a>
        
    </div>
</section>
<section>
    <h3 id="content_aact3">_ROOT: ФАЙЛЫ</h3>
    <div id="content3">
        <a href="/files"><p>ОТКРЫТЬ ДИРЕКТОРИЮ</p></a>
        <a id="content_upload"><p>ЗАГРУЗИТЬ В ДИРЕКТОРИЮ</p></a>
        
        <form enctype="multipart/form-data" action="functions.php" method="POST" id="upload">
            <input type="hidden" name="upload_max_filesize" value="999999999999999999999" />
            <input type="hidden" name="post_max_size" value="999999999999999999999" />
            <input type="hidden" name="max_execution_time" value="999999999999999999999" />
            <div class="form-group">
                <label>
                    <input name="userfile" type="file" hidden>
                    <span class="title">Добавить файл</span>
                </label>
                <input name="fileload" value="true" hidden />
                <label>
                    <input type="submit" hidden />
                    <span class="title">Загрузить на сервер</span>
                </label>
            </div>
        </form>
    </div>
</section>

</body>
<script type="text/javascript" src="script.js"></script>
</html>