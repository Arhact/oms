<?php get_header(); ?>
<?php include_once 'slider.php';?>
<div class="main container-fluid" style="background-color:#eee; border-top:1px solid #ccc;">
    <div class="container general_cont">
        <div class="social_link">

          <h2 style="text-align:center; padding-bottom:30px; padding-top:40px;">Подписывайтесь на наши группы в соцсетях и получайте скидки!</h2> 
		  <p style="text-align:center;">
			  <a href="https://vk.com/mobil1kd" target="blank"><img  alt="Вконтакте" style="width:150px; padding:10px;" src='<?php bloginfo("template_directory");?>/img/vk.png'/></a>
			  <a href="https://www.instagram.com/mobil1kd/" target="blank"><img alt="Instagram"  style="width:150px; padding:10px;" src='<?php bloginfo("template_directory");?>/img/inst.png'/></a>
			  <a href="https://ok.ru/kdmobil" target="blank"><img alt="Одноклассники"  style="width:150px; padding:10px;" src='<?php bloginfo("template_directory");?>/img/ok.png'/></a></p>	
        </div>

               
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
       <!----------------------------home------------------------------------->

          <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>