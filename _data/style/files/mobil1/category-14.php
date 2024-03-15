<?php get_header(); ?>
<?php include_once 'slider.php';?>

<?php
	function out_works($cat_id) {
	 	// echo '<h1 id="link'.$cat_id.'">'.$cat_name.'</h1>';
		echo '<div class="cat_out work_new_cont">';
		if ( have_posts() ) : 
		$query_cat='cat='.$cat_id;
		query_posts(array('cat' => '14', 'orderby' => 'date', 'order'=>'DESC'));   
		while (have_posts()) : the_post();  
		echo '<a href='; 
		the_permalink();
		echo '>';
	  	echo '<div class="single_work">';
        if ( has_post_thumbnail()) { 
		the_post_thumbnail(array(350, 233));  } 
		echo '</div>';
		echo '<h3 class="work_new2">';
        the_title(); 
        echo '</h3>';
		echo '<div class="date_news">';
        the_date('j F Y');
        echo '</div>';
		echo '</a>';
		endwhile;  
		endif;
	  echo '</div>';
		wp_reset_query();
	}	
?> 
<div class="main container-fluid">

    <div class="container general_cont" id="uslugi">
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
            <h1>Наши работы</h1>
        </div>
        <div class="works_line">
            <?php out_works('14');?>

        </div>
        <div class="page_line">
        </div>
    </div>
</div>
<?php get_footer(); ?>