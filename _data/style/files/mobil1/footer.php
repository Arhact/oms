<div class="contrainer-fluid">
         <div class="sales_block container">
                <a class="sales_cont sales_cont1" href="#openModal" onclick="search_add2('Развал Схождение по акции');">
                    <span class="sales_cont_h1">
                        Пройти ТО
                    </span>
                    <span>
                         <table>
                            <tr>
                                <td>Диагностика ходовой
                                </td>
                                <td><b>Бесплатно</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Замена масла ДВС + фильтра
                                </td>
                                <td><b>350 руб.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Замена воздушного фильтра
                                </td>
                                <td><b>от 200 руб.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Замена масла АКПП
                                </td>
                                <td><b>от 1500 руб.</b>
                                </td>
                            </tr>
                        </table>                         
                    </span> 
                    <span class="s_cont_r">
                        Записаться
                    </span>     
                    <span class="sales_cont_foot">
                        <img alt="" src="<?php bloginfo("template_directory");?>/img/banner1.png"/>
                    </span>  
                </a>
                 <a class="sales_cont sales_cont2" href="#openModal" onclick="search_add2('Шиномонтаж + Балансировка по акции');">
                    <span class="sales_cont_h1">
                        Калькулятор ТО
                    </span>
                    <span class="s_text_cont"> 
                        Узнайте стоимость технического обслуживания.<br> 
                        Наш специалист свяжется с Вами в ближайшее время.
                    </span>   
                    <span class="sales_cont_foot">
                        <img alt="" src="<?php bloginfo("template_directory");?>/img/banner2.png"/>
                    </span> 
                     <span class="s_cont_r">
                        Рассчитать
                    </span>  
                </a>
                 <a class="sales_cont sales_cont2" href="#openModal" onclick="search_add2('Шиномонтаж + Балансировка по акции');">
                    <span class="sales_cont_h1">
                        Бесплатная доставка
                    </span>
                    <span class="s_text_cont"> 
                        При покупке от 3000 рублей доставка <br>  по городу Калининграду <b>БЕСПЛАТНО! </b>
                    
                    </span>   
                    <span class="sales_cont_foot">
                        <img alt="" src="<?php bloginfo("template_directory");?>/img/banner3.png"/>
                    </span> 
                     <span class="s_cont_r">
                        Заказать
                    </span>                        
                </a>
                 <a class="sales_cont sales_cont2" href="#openModal" onclick="search_add2('Шиномонтаж + Балансировка по акции');">
                    <span class="sales_cont_h1">
                        Оплата любым удобным способом
                    </span>
                    <span class="s_text_cont"> 
                       <ul>
                        <li>Оплата банковским переводом на расчётный счёт</li>
                        <li>Наличный и безналичный расчёт в магазине</li>
                        <li>Оплата наличными курьеру</li>
                        <li>Оплата банковской картой на сайте</li>
                        </ul>
                    </span>       
                    <span class="sales_cont_foot">
                        <img alt="" src="<?php bloginfo("template_directory");?>/img/banner4.png"/>
                    </span> 
                     
                </a>
        </div>
</div>  
   <footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="container-fluid footer_top">
        <div class="container">
            <div class="footer_cont footer_logo">
                <a href="#">
                    <span class="logo_text" style="margin:0;padding:0;">
                        Мир Масел 
                    </span>
               </a>
                <p><b>Магазин Мир Масел</b> предлагает широкий выбор авто, мото и трансмиссионных масел. У нас Вы можете купить оригинальные масла Mercedes, BMW, VAG, General Motors, Mazda, Mitsubishi, Toyota, Lexus, Subaru, HONDA, NISSAN, HYUNDAI, FORD, Mopar, VOLVO и другие.</p>
                <div class="footer_payment">
					<img data-src="<?php bloginfo("template_directory");?>/img/visa.svg" style="width:61px; height:20; padding:5px;" alt="Visa">
					<img data-src="<?php bloginfo("template_directory");?>/img/mastercard.svg" style="width:41px; height:33; padding:5px;" alt="MasterCard"> 
					<img data-src="<?php bloginfo("template_directory");?>/img/mir.svg" style="width:81px; height:37; padding:5px;" alt="Мир"> 
				</div>

            </div>

            <div class="footer_cont VK"> 
                <p style="color:#ff9000; font-size:16px;"><b>г. Калининград, ул. Третьяковская, 4В</b></p>
                <p style="font-size:36px;"> 91-52-08</p>
                <p>E-mail: <b>info@kdmobil.ru</b></p>
                <p><b><i class="icon-doc-text" aria-hidden="true" style="color:#ff9000; "></i><a style="color:#ff9000;" href="https://kdmobil.ru/politika-obrabotki-personalnyx-dannyx/" > Политика обработки персональных данных</a></b></p>
            </div>
        </div>
    </div>
    <div class="container-fluid footer_bottom">
        <div class="container copy">
                © <?php echo date('Y');?> Мир Масел 39. Информация на сайте не является публичной офертой.


        </div>
    </div>
</footer>
    <div id="openModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
			<a href="#close" title="Close" class="close">×</a>
            <div class="tabs">
                <div class="info active">
                   <span class="article_tabs">Выберите марку:</span>
                   <?php
                    global $wpdb;
                    $sql = "SELECT * FROM {$wpdb->prefix}avto ORDER BY `marka`";  
                    $result = $wpdb->get_results($sql) or die(mysql_error()); 

                        foreach($result as $results) { 
 
                         echo "<input type='radio' name='marka' id='".$results->marka."' value='".$results->marka."'/><label  onclick='tabs_list(1)' for='".$results->marka."'><img data-src='https://kdmobil.ru/img/".$results->id.".png'><span class='marka_name'>".$results->marka."</span></label>";
                        } ?>
                        <input type='radio' name='marka' id='all_avto' value='xz'/><label onclick='tabs_list(2)' for='all_avto'><i class="marka_i icon-question-circle-o" aria-hidden="true"></i><span class='marka_name'>Другая</span></label>
                </div>
                <div class="info"> 
                    <div id="out_model"></div>
                </div>
                <div class="info">
                    <span class="article_tabs">Выберите год выпуска:</span>
                    <?php 
                    $year_start = 2020;
                    for ($i = 0; $i <= 33; $i++)
                        {
                            echo '<input type="radio" name="year" id="y_'.$year_start.'" value="'.$year_start.'"/><label class="marka_name_sm" onclick="tabs_list(3)" for="y_'.$year_start.'"><span class="marka_name">'.$year_start.'</span></label>';
                            $year_start = $year_start - 1;
                        }                 
                    ?>

                </div>
                <div class="info">
                    <span class="article_tabs">Выберите перечень работ(запчастей):</span>
                       <div class="form_work_cont">
                            <div class="form_work">
                               <span class="header_form">Замена:</span>
                            <p><input type="checkbox" name="calcto" id="to1" value="Замена масла ДВС" checked><label for="to1"> Масло в двигателе и маслянный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to2" value="Замена масла ДВС"><label for="to2"> Топливный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to3" value="Замена масла ДВС"><label for="to3"> Салонный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to4" value="Замена масла ДВС"><label for="to4"> Воздушный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to5" value="Замена масла ДВС"><label for="to5"> Замена масла в АКПП(частичная)</label></p>
                               <p><input type="checkbox" name="calcto" id="to6" value="Замена масла ДВС"><label for="to6"> Замена масла в АКПП(полная)
                               </label></p>
                               <p><input type="checkbox" name="calcto" id="to7" value="Замена масла ДВС"><label for="to7"> Свечи </label></p>
                               <p><input type="checkbox" name="calcto" id="to8" value="Замена масла ДВС"><label for="to8"> Замена антифриза</label></p>
                               <p><input type="checkbox" name="calcto" id="to9" value="Замена масла ДВС"><label for="to9"> Замена торм. жидкости</label></p>
                               <p><input type="checkbox" name="calcto" id="to10" value="Замена масла ДВС"><label for="to10"> Замена жидкости ГУР</label></p>
                            </div> 
                            <div class="form_work">
                               <span class="header_form">Диагностика:</span>
                            <p><input type="checkbox" name="calcto" id="to21" value="Замена масла ДВС" checked><label for="to21"> Диагностика ходовой (бесплатно)</label></p>
                               <p><input type="checkbox" name="calcto" id="to22" value="Замена масла ДВС" checked><label for="to22"> Диагностика торм.системы (бесплатно)</label></p>
                               <p><input type="checkbox" name="calcto" id="to23" value="Замена масла ДВС" checked><label for="to23"> Диагностика рулевой (бесплатно)</label></p>
                               <p><input type="checkbox" name="calcto" id="to24" value="Замена масла ДВС" checked><label for="to24"> Проверка света по кругу (бесплатно)</label></p>
                               <p><input type="checkbox" name="calcto" id="to25" value="Замена масла ДВС" checked><label for="to25"> Проверка охл. и торм. жидкостей (бесплатно)</label></p>
                               <p><input type="checkbox" name="calcto" id="to26" value="Замена масла ДВС"><label for="to26"> Проверка уровня масла АКПП </label></p>
                               <p><input type="checkbox" name="calcto" id="to27" value="Замена масла ДВС"><label for="to27"> Компьютерная диагностика </label></p>
                               <p><input type="checkbox" name="calcto" id="to28" value="Замена масла ДВС"><label for="to28"> Р/СХ </label></p>
                            </div>
                            <div class="form_work">
                               <span class="header_form">Дополнительно:</span>
                            <p><input type="checkbox" name="calcto" id="to1" value="Замена масла ДВС"> <label for="to1">Масло в двигателе и маслянный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to2" value="Замена масла ДВС" checked><label for="to2"> Топливный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to3" value="Замена масла ДВС" checked><label for="to3"> Салонный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to4" value="Замена масла ДВС" checked><label for="to4"> Воздушный фильтр</label></p>
                               <p><input type="checkbox" name="calcto" id="to5" value="Замена масла ДВС" checked><label for="to5"> Замена масла в АКПП(частичная)</label></p>
                               <p><input type="checkbox" name="calcto" id="to6" value="Замена масла ДВС" checked><label for="to6"> Замена масла в АКПП(полная)</label></p>
                            </div>      
                        </div> 
                            <div class="button_end_cont">
                                <div class="button_end" onclick="tabs_list(4)">Далее</div>
                            </div>    
                </div>
                <div class="info">
                    <span class="article_tabs">Введите контактные данные:</span>
                        <div class="end_form">
                            <div id="new_model" class="showmodel">
                                <input type="text" name="marka2" id="marka2" placeholder="Марка авто" >
                                <input type="text" name="model2" id="model2" placeholder="Модель авто" >
                            </div> 
                            <input type="tel" name="phone_in" id="phone_in" placeholder="Контактный телефон" >
                            <textarea placeholder="Укажите неисправность или перечислите необходимые работы" id="out_works"></textarea>
                            <div id="conf_cont">
                                <input type="checkbox" value="1" aria-invalid="false" name="conf" id="conf"> Я даю согласие на обработку моих <a href="https://kdmobil.ru/politika-obrabotki-personalnyx-dannyx/">персональных данных*</a>
                            </div>
                            <div class="button_end_cont">
                                <div class="button_end" onclick="tabs_list(5)">Отправить</div>
                            </div>    
                        </div>    
                </div>
                <div class="info">
                    <span class="article_tabs">Ваша заявка принята!</span>
                        <div class="end_form" id="out_form">
                            <span style="text-align:center;display:block;font-size:16;font-weight:bold;padding:50px auto;">Ваша заявка принята!</span>
                        </div>    
                </div>
            </div>
                        <div class="tabs_list">
                <ul class="tabs_menu">
                        <li class="active" onclick="tabs_list(0)">1</li>
                        <li class="no_active" onclick="tabs_list(1)">2</li>
                        <li class="no_active" onclick="tabs_list(2)">3</li>
                        <li class="no_active" onclick="tabs_list(3)">4</li>
                        <li class="no_active" onclick="tabs_list(4)">5</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/lightbox.css">
<script src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
  <script>
      
function tabs_list(tabs_index) {
  		if (!$(this).hasClass("active")) {
			var i = tabs_index;
            if (i == 5){
               if ($("#conf").is(':checked')) {
               
               if ($("#phone_in").val() == "") {
                  $("#phone_in").fadeIn(1000).addClass("alert_phone");
               }
                else {
                    $(".tabs_menu li.active").removeClass("active");
                    $(".tabs .active").hide().removeClass("active");
                    $(this).addClass("active");
                    $($(".tabs").children(".info")[i]).fadeIn(1000).addClass("active");
                    $($(".tabs_menu").children("li")[i]).fadeIn(1000).removeClass("no_active");
                    $($(".tabs_menu").children("li")[i]).fadeIn(1000).addClass("active");
                    $($(".tabs_menu").children("li")[i]).fadeIn(1000).addClass("no_active2");
                    var search_marka2 = $('input[name=marka]:checked').val();
                    var search_model2 = $('input[name=model]:checked').val();
                    var search_marka3 = $('input[name=marka2]').val();
                    var search_model3 = $('input[name=model2]').val();
                    var search_year2 = $('input[name=year]:checked').val();
                    var search_phone = $('input[name=phone_in]').val();
                    var out_works = $('#out_works').val();
                    $.post("<?php bloginfo("template_directory");?>/moduls/send_works.php", {marka : search_marka2, model : search_model2, marka2 : search_marka3, model2 : search_model3, year_w : search_year2, phone : search_phone, out_works : out_works}, function(data){
                       if (data.length>0){ 
                         $("#out_form").html(data); 
                       } 
                      })                   
                }
               }
                else {
                    $("#conf_cont").fadeIn(1000).addClass("alert_phone"); 
                }
            }
            
            else {
			$(".tabs_menu li.active").removeClass("active");
			$(".tabs .active").hide().removeClass("active");
			$(this).addClass("active");
			$($(".tabs").children(".info")[i]).fadeIn(1000).addClass("active");
            $($(".tabs_menu").children("li")[i]).fadeIn(1000).removeClass("no_active");
            $($(".tabs_menu").children("li")[i]).fadeIn(1000).addClass("active");
            $($(".tabs_menu").children("li")[i]).fadeIn(1000).addClass("no_active2");
		}}
}           
$('input[name=marka]').change(function() {
    if ($('input[name=marka]:checked').val() !== "xz"){
    $("#new_model").fadeIn(1000).addClass("show_model");    
      var search_model = $('input[name=marka]:checked').val();
        $.post("<?php bloginfo("template_directory");?>/moduls/find_model.php", {marka : search_model}, function(data){
           if (data.length>0){ 
             $("#out_model").html(data); 
           } 
          }) 
    }
    else {
        $("#new_model").fadeIn(1000).removeClass("show_model");
    }
});      
function search_add() {
     var search_text = $('#id_search_input').val();
     if (search_text.length>0){
        $('#out_works').val(search_text);    
     }    
}
      function search_add2(text) {
     if (text.length>0){
        $('#out_works').val(text);    
     }    
}


    document.addEventListener('click', function (e) {
      if (location.hash === '#openModal') {
        if (!e.target.closest('.modal-dialog')) {
          location.hash = '#close';
        }
      }
    });
  </script>



<script>
	[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
img.setAttribute('src', img.getAttribute('data-src'));
img.onload = function() {
img.removeAttribute('data-src');
};
});
</script>
        <script type="text/javascript">

var main = function() { 
    $('.icon-menu').click(function() { 
        $('.small_menu_cont').animate({
            left: '0px'
        }, 200);
        $('body').animate({ 
            left: '0px'
        }, 200);
    });


/* Закрытие меню */

    $('.icon-close').click(function() { 
        $('.small_menu_cont').animate({
            left: '-285px'
        }, 200); 
    $('body').animate({ 
            left: '0px'
        }, 200);
    });
};

$(document).ready(main);
</script> 
        <script type="text/javascript">
$(document).ready(function() {  
var stickyNavTop = $('.bg_menu').offset().top;  
   
var stickyNav = function(){  
var scrollTop = $(window).scrollTop();  
        
if (scrollTop > stickyNavTop) {   
    $('.bg_menu').addClass('sticky');  
} else {  
    $('.bg_menu').removeClass('sticky');   
}  
};  
   
stickyNav();  
   
$(window).scroll(function() {  
    stickyNav();  
});  
});  
$(document).ready(function() {  
var stickyNavTop = $('.slider_bottom').offset().top;  
   
var stickyNav = function(){  
var scrollTop = $(window).scrollTop();  
        
if (scrollTop > stickyNavTop) {   
    $('.slider_bottom').addClass('sticky2');  
} else {  
    $('.slider_bottom').removeClass('sticky2');   
}  
};  
   
stickyNav();  
   
$(window).scroll(function() {  
    stickyNav();  
});  
}); 
            
$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});    
                
</script> 





    <link href="<?php bloginfo("template_directory");?>/woo.css" rel="stylesheet"> 
</body>


<?php wp_footer(); ?>