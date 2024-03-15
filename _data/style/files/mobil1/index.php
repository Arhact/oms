<?php get_header(); ?>
<div class="main container-fluid">
   <div class="slider slider_2">
    </div>
    <div class="container general_cont">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
       <!----------------------------home------------------------------------->

          <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>