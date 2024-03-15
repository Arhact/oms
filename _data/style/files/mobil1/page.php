<?php get_header(); ?>
<?php include_once 'slider.php';?>
    <div class="container">

        <div class="msite">
            <?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			?>
        </div>  
    <div class="article_line">
        <h1><?php echo get_the_title();?></h1>
    </div> 
</div>    
    <div class="main main_woo container-fluid">

 <div class="container general_cont_woo">                         
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
       <!----------------------------home------------------------------------->

          <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>