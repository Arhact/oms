<?php get_header(); ?>
<div class="main container-fluid">
	   <div class="slider">
       <?php 
    echo do_shortcode("[metaslider id=29]"); 
?>
    </div>
    <div class="container">

         <div class="right_main">
           <div style="text-align:center;">
             <h1>Страница не найдена! :(</h1>
             <h1><a href="http://kdmobil.ru">Вернуться на главную</a></h1>
           		<img src='<?php bloginfo("template_directory");?>/img/404.jpg'>
           </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>