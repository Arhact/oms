<?php
    include 'sfcode.php';
    allimports();
?>

<?php
    if(!isset($_COOKIE['pagecd'])) {
        echo '<div class="err">ошибка в работе файлов cookie<br><a href="/">на главную</a></div>';
    }
    else if(isset($_COOKIE['pagecd'])) { 
        freqpvanimation();

        if($_COOKIE['pagecd'] == '01b') {
            headcode();
            echo '<title>Веб-плеер: о нас</title>';
            
            echo '<div class="container about-cont">
                <p>Проект: <a>веб-плеер</a></p>
                <p>Администратор: <a>Бурдин В. Д.</a></p><br>
                <p>Наш ВК: <a href="https://vk.com/id434647357">vk.com</a></p>
                <p>Учебное заведение: <a href="http://kitis.ru">kitis.ru</a></p>
                <p>С вопросами обращаться на почту: <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvlqWGsQghMXdlnlVtSFpSNdgkJQLxjRvXrfjGtKsbZFsNFKdWsFZRZjlrKWdkdVbCNNGq">mail.google.com</a></p>
                <br>______<br>
                <span>Добро пожаловать, разумный, читающий это. Данный проект позиционируется как готовый, но абсолютно пустой от треков плеер. Для использования берется любой бесплатный хостинг, и уже туда загружается и сайт, и все необходимые файлы. Это сделано во избежание проблем с <a href="https://rkn.gov.ru/p582/p850/p864/">авторскими правами</a>. Мы же не <a href="https://demonoid.is/">пираты</a>, верно? Так что, весь загруженный контент целиком и полностью - проблемы <a href="https://rkn.gov.ru/it/control/">совести</a> пользователя.</span>
                <p class="about-gl">Удачи!</p>
            </div>
            <footer></footer>';
        }

        if($_COOKIE['pagecd'] == '02b') {
            headcode();
            echo '<title>Веб-плеер: обратная связь</title>';
            
            echo '<div class="container bcc-cont">
                <form action="service/formreq.php" method="POST" class="backconnect">
                    <label>Логин</label><br>

                    <input required type="text" name="login" placeholder="никнейм" value="';
                    if (isset($_POST['sub'])){
                        echo($_POST['login']); 
                    } 
                    if(empty($_POST['login'])) {
                        echo ""; 
                    };
                    echo '"><br>

                    <label>Ваше сообщение</label><br>

                    <textarea required name="formtext" placeholder="текст" value="';
                    if (isset($_POST['sub'])){
                        echo($_POST['formtext']); 
                    } 
                    if(empty($_POST['formtext'])) {
                        echo ""; 
                    };
                    echo '"></textarea><br>

                    <label>Адрес mail</label><br>

                    <input required type="email" name="email" placeholder="address@mail.ru" value="';
                    if (isset($_POST['sub'])){
                        echo($_POST['email']); 
                    } 
                    if(empty($_POST['email'])) {
                        echo ""; 
                    }
                    echo '"><br>
                    <input type="submit" name="sub" value="Отправить">
                </form>
            </div>
            <footer></footer>';
        }   
        
        if($_COOKIE['pagecd'] == '00a') {
            ipageheadcode();
            echo '<title id="title">Веб-плеер</title>';

            echo '<div class="container">
                <div class="sidebar">
                    <section class="lib">
                        <a class="section_library" href="lib.php"><i class="fa fa-list"></i>БИБЛИОТЕКА</a>
                    </section>
                    <section class="playlists">
                        <h1 class="section_name">Плейлисты:</h1>
                        <div class="sct_cla1">';
                            echo listt(0);
                        echo '</div>
                    </section>
                    <section class="userslist">
                        <h1 class="section_name">Авторы&группы:</h1>
                        <div class="sct_cla2">';
                            echo listt(1);
                        echo '</div>
                    </section>
                </div>
                <div class="main">
                    <section>
                        <h1 class="section_trackslist">Список треков:</h1>
                        <div class="sct_clb1">';
                            echo filelist(2);
                        echo '</div>
                    </section>
                </div>
            </div>
            <footer>
                <p id="mp3name">'; if(isset($_COOKIE['mp3l'])){nlck(0);}else{nlnock(0);}; echo '</p>
                <audio controls id="myaudio" volume="-5000">
                    <source id="mp3src" src='; if(isset($_COOKIE['mp3l'])){nlck(1);}else{nlnock(1);}; echo 'type="audio/mpeg">
                    функция <code>audio</code> не поддерживается браузером
                </audio>
            </footer>';
        }

        echo '</body></html>';
    }
?>
<script src="../mp3script.js?v=1"></script>