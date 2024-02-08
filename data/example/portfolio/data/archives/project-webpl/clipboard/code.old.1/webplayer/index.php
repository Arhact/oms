<?php
    if(!isset($_COOKIE['pagecd'])) {
        setcookie('pagecd', '00a');
        $_COOKIE['pagecd'] = '00a';
    } // _ROOT: NAVIGATION COOKIE
    
    include 'sfcode.php'; // _ROOT: IMPORT FILE WITH FUNCTIONS
    allimports(); // _ROOT: NOERRORDISPLAY && HTML IMPORTS
    
    if(!isset($_COOKIE['pagecd'])) {
        echo '<div class="err">ошибка в работе файлов cookie<br><a href="/">на главную</a></div>';
    } // _ROOT: ERRLOG COOKIE
    else if(isset($_COOKIE['pagecd'])) { 
        freqpvanimation(); // _ROOT: FP-V ANIMATION
        
        if($_COOKIE['pagecd'] == '00a') {
            echo '<title id="title">Веб-плеер</title>'; // _ROOT: SITE TITLE

            echo 
            '<header>

                <div class="logo"><img src="files/logo.png" alt="logo"></div>

                <nav>
                    <a id="00a" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">на главную</a>
                    <a id="01b" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">о нас</a>
                    <a id="02b" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">обратная связь</a>
                </nav>

                <div class="search_field">
                    <form method="post" action="/">
                        <input type="text" id="search" placeholder="скачать" name="search" value="">
                        <input type="submit" id="00f" onclick="document.cookie = \'pagecd=\'+this.id;" value="вперёд">
                    </form>
                </div>

            </header>'; // _ROOT: MAINPAGE HEADER

            echo 
            '<div class="container">

                <div class="sidebar">
                    <section class="lib">
                        <a class="section_library" id="03b" onclick="document.cookie = \'pagecd=\'+this.id;" href="/"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
                    </section>

                    <section class="playlists">
                        <h1 class="section_name">Плейлисты:</h1>
                        <div class="sct_cla1">';
                            echo listt(0); /* _ROOT: LIST1 -EMPTY */
                        echo '</div>
                    </section>

                    <section class="userslist">
                        <h1 class="section_name">Авторы&группы:</h1>
                        <div class="sct_cla2">';
                            echo listt(1); // _ROOT: LIST2 -EMPTY

                        echo '</div>
                    </section>
                </div>

                <div class="main">
                    <section>
                        <h1 class="section_trackslist">Список треков:</h1>
                        <div class="sct_clb1">';
                            echo filelist(2); // _ROOT: TRACKLIST

                        echo '</div>
                    </section>
                </div>
            </div>
            <footer>
                <p id="mp3name">';
                    if(isset($_COOKIE['mp3l'])){nlck(0);}else{nlnock(0);}; // _ROOT: TRACKNAME -IF [COOKIE=TRUE]: LASTFILE -ELIF [COOKIE=FALSE]: FIRSTFILE
                echo '</p>
                <audio controls id="myaudio" volume="-5000">
                    <source id="mp3src" src=';
                        if(isset($_COOKIE['mp3l'])){nlck(1);}else{nlnock(1);}; // _ROOT: TRACKLINK -IF [COOKIE=TRUE]: LASTFILE -ELIF [COOKIE=FALSE]: FIRSTFILE
                    echo 'type="audio/mpeg">
                    функция <code>audio</code> не поддерживается браузером
                </audio>
            </footer>'; // _ROOT: TEXT FOR AUDIOERR
        }

        if($_COOKIE['pagecd'] == '01b') {
            echo '<title>Веб-плеер: о нас</title>'; // _ROOT: SITE TITLE

            headcode(); // _ROOT: SITE HEADER
            
            echo 
            '<div class="container about-cont">
                <p>Проект: <a>веб-плеер</a></p>
                <p>Администратор: <a>Бурдин В. Д.</a></p><br>
                <p>Наш ВК: <a href="https://vk.com/id434647357">vk.com</a></p>
                <p>Учебное заведение: <a href="http://kitis.ru">kitis.ru</a></p>
                <p>С вопросами обращаться на почту: <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvlqWGsQghMXdlnlVtSFpSNdgkJQLxjRvXrfjGtKsbZFsNFKdWsFZRZjlrKWdkdVbCNNGq">mail.google.com</a></p>
                <br>______<br>
                <span>Добро пожаловать, разумный, читающий это. Данный проект позиционируется как готовый, но абсолютно пустой от треков плеер. Для использования берется любой бесплатный хостинг, и уже туда загружается и сайт, и все необходимые файлы. Это сделано во избежание проблем с <a href="https://rkn.gov.ru/p582/p850/p864/">авторскими правами</a>. Мы же не <a href="https://demonoid.is/">пираты</a>, верно? Так что, весь загруженный контент целиком и полностью - проблемы <a href="https://rkn.gov.ru/it/control/">совести</a> пользователя.</span>
                <p class="about-gl">Удачи!</p>
            </div>'; // _ROOT: BODYCODE

            echo '<footer>_ROOT: DESCRIPTION</footer>'; // _ROOT: FOOTERCODE
        }

        if($_COOKIE['pagecd'] == '02b') {
            echo '<title>Веб-плеер: обратная связь</title>'; // _ROOT: SITE TITLE

            headcode(); // _ROOT: SITE HEADER
            
            echo 
            '<div class="container bcc-cont">
                <form action="service/formreq.php" method="POST" class="backconnect">
                    <label>Логин</label><br>
                    <input required type="text" name="login" placeholder="никнейм" value="';
                    if(isset($_POST['sub'])) { echo($_POST['login']); } 
                    if(empty($_POST['login'])) { echo ""; }; // _ROOT: L0GINCODE
                    echo '"><br>

                    <label>Ваше сообщение</label><br>
                    <textarea required name="formtext" placeholder="текст" value="';
                    if(isset($_POST['sub'])) { echo($_POST['formtext']); } 
                    if(empty($_POST['formtext'])) { echo ""; }; // _ROOT: MESSAGECODE
                    echo '"></textarea><br>

                    <label>Адрес mail</label><br>
                    <input required type="email" name="email" placeholder="address@mail.ru" value="';
                    if (isset($_POST['sub'])) { echo($_POST['email']); } 
                    if(empty($_POST['email'])) { echo ""; } // _ROOT: ADDRESSCODE
                    echo '"><br>

                    <input type="submit" name="sub" value="Отправить">
                </form>
            </div>
            <footer>_ROOT: CONNECTION FORM</footer>'; // _ROOT: FOOTERCODE
        }   

        if($_COOKIE['pagecd'] == '03b') {
            echo '<title>Веб-плеер: библиотека</title>'; // _ROOT: SITE TITLE

            headcode(); // _ROOT: SITE HEADER
            
            echo 
            '<div class="container">

                <div class="sidebar">
                    <section class="lib">
                        <a class="section_library" href="lib.php"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
                    </section>
                    <section class="playlists">
                        <h1 class="section_name">Плейлисты:</h1>
                        <div class="sct_cla1">';
                            echo listt(0); // _ROOT: LIST1 -EMPTY
                        echo '</div>
                    </section>
                    <section class="userslist">
                        <h1 class="section_name">Авторы&группы:</h1>
                        <div class="sct_cla2">';
                            echo listt(1); // _ROOT: LIST2 -EMPTY
                        echo '</div>
                    </section>
                </div>

                <div class="main">
                    <section>
                        <h1 class="section_trackslist">Библиотека</h1>
                        <div class="sct_clb1">';
                            echo rlinklist(); // _ROOT: SITESLIST
                        echo '</div>
                    </section>
                </div>
                
            </div>';
            echo '<footer>_ROOT: USEFUL LINKS</footer>'; // _ROOT: FOOTERCODE
        } 

        if($_COOKIE['pagecd'] == '00f') {
            echo '<title>Веб-плеер: загрузка треков</title>'; // _ROOT: SITE TITLE

            allimports();

            echo
            '<header>
                <div class="logo"><img src="files/logo.png" alt="logo"></div>
                <nav>
                    <a id="00a" onclick="document.cookie = \'pagecd=\'+this.id;" href="http://webplayer">на главную</a>
                    <a id="02f" onclick="document.cookie = \'pagecd=\'+this.id;" href="/">управление файлами</a>
                </nav>

                <div class="search_field">
                    <form method="post" action="/">
                        <input type="text" id="search" placeholder="скачать" name="search" value="">
                        <input type="submit" id="00f" onclick="document.cookie = \'pagecd=\'+this.id;" value="вперёд">
                    </form>
                </div>
            </header>'; // _ROOT: SITE HEADER
            
            echo 
            '<div class="container">
                <div class="main" style="max-width: 100%;">';
                    if (!empty($_POST['search'])){
                        mp3list($_POST['search']);
                    }else{
                        echo 'ошибка: введите название и/или автора трека';
                    }
                echo '</div>
            </div>'; //_ROOT: BODYCODE
            
            echo '<footer>_ROOT: DOWNLOAD SERVICE</footer>'; // _ROOT: FOOTERCODE
        }

        if($_COOKIE['pagecd'] == '01f') {
            echo '<title>Веб-плеер: загрузка треков</title>'; // _ROOT: SITE TITLE

            allimports();

            echo
            '<html>
                <body>
                    <div class="forml">
                        <a href="http://webplayer" class="backdnl">на главную...</a><br><br>';
                        btn();
                    echo '</div>'; //_ROOT: BODYCODE
            
            echo '<footer>_ROOT: DOWNLOAD TO PC</footer>'; // _ROOT: FOOTERCODE
        }

        if($_COOKIE['pagecd'] == '02f' or $_COOKIE['pagecd'] == '12f') {
            echo '<title>Веб-плеер: управление файлами</title>'; // _ROOT: SITE TITLE

            headcode(); // _ROOT: SITE HEADER

            if($_COOKIE['pagecd'] == '02f') {
                echo '<div class="container clearallcont">
                    <form method="post" action="/" class="clearall">
                        <input type="submit" id="12f" onclick="document.cookie = \'pagecd=\'+this.id;" value="ОЧИСТИТЬ ВСЁ">
                        <i class="fa fa-list"></i>
                    </form>
                    <form enctype="multipart/form-data" action="http://webplayer/files/" method="post" class="clearall">
                        <input type="file" name="musfile" accept=".mp3" multiple>
                        <input type="submit" value="ЗАГРУЗИТЬ ФАЙЛ">
                        <i class="fa fa-upload"></i>
                    </form>
                </div>';
                // http://htmlbook.ru/samhtml5/formy/zagruzka-failov
                // curl_download('C:\Users\admin\Desktop\tble.xlsx', 'files/tble.xlsx');
                // https://webformyself.com/10-poleznyx-sovetov-dlya-veb-razrabotchikov-po-zagruzke-fajlov-v-html/
            }
            if($_COOKIE['pagecd'] == '12f') {
                // fileclear();
                curl_download($_POST['musfile'], 'files/'.'test'.'.mp3');
                ?><script>document.cookie = "pagecd=02f";window.location="http://webplayer/";</script><?php;
            } //_ROOT: BODYCODE
            if($_COOKIE['pagecd'] == '22f') {
               // <input type="submit" id="22f" onclick=" let musfile = document.querySelector(\'#musfile\'); document.cookie = \'musdowind=\'+musfile.value; document.cookie = \'pagecd=\'+this.id; " value="ЗАГРУЗИТЬ ФАЙЛ">
               curl_download($_COOKIE['musdowind'], 'files/'.$_POST['filename'].'.mp3');
                ?><script>document.cookie = "pagecd=02f";window.location="http://webplayer/";</script><?php;
            }; //_ROOT: BODYCODE

            echo '<footer>_ROOT: FILES SETTINGS</footer>'; // _ROOT: FOOTERCODE
        }

        echo '</body></html>'; // _ROOT: HTML END
    }
?>
<script src="../mp3script.js?v=1"></script>