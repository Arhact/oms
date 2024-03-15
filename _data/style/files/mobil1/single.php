<?php get_header(); ?>
<?php include_once 'slider.php';?>
<div class="container-fluid">
    <div class="container">
    <div class="article">
        <div class="msite">  
            <?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}
?>
        </div>
        </div>
              
    <div class="article_line">
        <h1><?php echo get_the_title();?></h1>
    </div> 
    </div></div> 
    <div class="main main_woo container-fluid">

 <div class="container general_cont_woo">    
    <div class="main_table"> 
    
	   <div class="post_out">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
       <!----------------------------home------------------------------------->

          <?php the_content(); ?>
        		  
		  

        <?php endwhile; endif; wp_reset_query();?>
        </div>
        <div class="single_menu">
          <div class="single_menu_cont">
           <div class="single_menu_in">

               <?php 
                    $work_list = (get_post_meta($post->ID, 'work_list', true));
                    $price_list = (get_post_meta($post->ID, 'price_list', true));
                    
                    if ($work_list == ""){
                        echo '<span class="single_menu_article">Диагностика ходовой</span>';
                        echo '<div class="single_menu_body">
                        <span class="single_price">БЕСПЛАТНО</span>
                        <input id="id_search_input" class="search_input" type="hidden" value="Диагностика ходовой" >
                        <a class="search_btn2" href="#openModal" onclick="search_add();">Записаться</a>
                        </div>';
                    }
                    else {
                       echo '<span class="single_menu_article">'.$work_list.'</span>'; 
                       echo '<div class="single_menu_body">
                           <span class="single_price">'.$price_list.' руб.</span>
                           <input id="id_search_input" class="search_input" type="hidden" value="'.$work_list.'" >
                           <a class="search_btn2" href="#openModal" onclick="search_add();">Записаться</a>
                           </div>';
                    }    

                ?>       

            </div>
            <div class="ratings_cont"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
            </div>
        </div>
    </div>   
</div>
<?php get_footer(); ?>