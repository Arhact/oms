<?php include 'service/php/functions.php'; ?>

<!DOCTYPE html>

<head>
    <html lang="ru">
    <?php allimports(0); ?>
    <title id="title">Веб-плеер</title>
</head>

<body>
    <!-- шапка -->
    <header>
        <!-- логотип -->
        <div class="logo"><img src="service/img/logo.png" alt="logo"></div>
        <!-- навигация по сайту -->
        <nav>
            <a href="/">на главную</a>
            <a href="/">о нас</a>
            <a href="/">обратная связь</a>
        </nav>
        <!-- поиск & загрузка -->
        <div class="search_field">
            <form method="post" action="/">
                <input type="text" id="search" placeholder="скачать" name="search" value="">
                <input type="submit" id="00f" onclick="document.cookie = \'pagecd=\'+this.id;" value="вперёд">
            </form>
        </div>
    </header>
    <!-- тело -->
    <div class="container">
        <!-- левый блок -->
        <div class="sidebar">
            <!-- модуль: библиотека -->
            <section class="lib">
                <a class="section_library" href="/"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
            </section>
            <!-- модуль: тестовый список 1 -->
            <section class="playlists">
                <h1 class="section_name">Плейлисты:</h1>
                <div class="sct_cla1">
                    <?php echo listt(0);  // _ROOT: LIST1 -EMPTY ?>
                </div>
            </section>
            <!-- модуль: тестовый список 2 -->
            <section class="userslist">
                <h1 class="section_name">Авторы&группы:</h1>
                <div class="sct_cla2">
                    <?php echo listt(1); // _ROOT: LIST2 -EMPTY ?>
                </div>
            </section>
        </div>
        <!-- главный блок -->
        <div class="main">
            <!-- модуль: список треков -->
            <section>
                <h1 class="section_trackslist">Список треков:</h1>
                <div class="sct_clb1">
                    <?php echo filelist(2); // _ROOT: TRACKLIST ?>
                </div>
            </section>
        </div>
    </div>
    <!-- подвал -->
    <footer>
        <!-- модуль: mp3.предидущий файл -->
        <div id="prev"><div class="arrow"></div><div class="arrow"></div></div>

        <!-- модуль: mp3.название -->
        <p id="mp3name">
            <?php firsttrack(0); ?>
        </p>

        <!-- модуль: mp3.следующий файл -->
        <div id="next"><div class="arrow"></div><div class="arrow"></div></div>

        <!-- модуль: mp3.файл -->
        <audio controls id="myaudio" volume="-5000">
            <source id="mp3src" src=<?php firsttrack(1); ?> type="audio/mpeg">
            _ROOT: ERROR AUDIO FNCT
        </audio>
    </footer>
</body>

<?php allimports(1); ?>
</html>