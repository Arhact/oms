<?php
    if(!isset($_COOKIE['pagecd'])) {
        setcookie('pagecd', '00a');
    }
    $_COOKIE['pagecd'] = '00a';
?>
<?php
    include 'sfcode.php';
    allimports();
?>
<?php
    echo '<title id="title">Веб-плеер</title>';
    freqpvanimation();
    ipageheadcode();
?>

<body>
    <div class="container">
        <div class="sidebar">
            <section class="lib">
                <a class="section_library" href="lib.php"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
            </section>
            <section class="playlists">
                <h1 class="section_name">Плейлисты:</h1>
                <div class="sct_cla1">
                    <?php listt(0) ?>
                </div>
            </section>
            <section class="userslist">
                <h1 class="section_name">Авторы&группы:</h1>
                <div class="sct_cla2">
                    <?php listt(1) ?>
                </div>
            </section>
        </div>
        <div class="main">
            <section>
                <h1 class="section_trackslist">Список треков:</h1>
                <div class="sct_clb1">
                    <?php filelist(2) ?>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <p id="mp3name"><?php if(isset($_COOKIE['mp3l'])){nlck(0);}else{nlnock(0);} ?></p>
        <audio controls id="myaudio" volume="-5000">
            <source id="mp3src" src=<?php if(isset($_COOKIE['mp3l'])){nlck(1);}else{nlnock(1);} ?> type="audio/mpeg">
            функция не поддерживается браузером
        </audio>
    </footer>
    <script src="../mp3script.js?v=1"></script>
</body>

</html>