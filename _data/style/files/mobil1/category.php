<?php get_header(); ?>  
<?php include_once 'slider.php';?>

<?php
	function out_works($cat_id) {
	 	// echo '<h1 id="link'.$cat_id.'">'.$cat_name.'</h1>';
		echo '<div class="cat_out">';
		if ( have_posts() ) : 
		$query_cat='cat='.$cat_id;
		query_posts(array('cat' => $cat_id, 'orderby' => 'title', 'order'=>'ASC'));   
		while (have_posts()) : the_post();  
		echo '<a href='; 
		the_permalink();
		echo '>';
	  	echo '<div class="single_work"><div class="single_tab"><div class="single_cell"><h3>';
        the_title(); 
        echo '</h3></div></div>';
        if ( has_post_thumbnail()) { 
		the_post_thumbnail(array(350, 233));  } 
		 echo '</div>';
		echo '</a>';
		endwhile;  
		endif;
	  echo '</div>';
		wp_reset_query();
	}	
?> 

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
            <h1><?php echo single_cat_title();?></h1> 
        </div> 
</div>
<div class="main main_woo  container-fluid">  
               <div class="container general_cont" id="uslugi">	             
                <?php
                    $category = get_queried_object();
                    out_works($category->term_id);
                ?>
  

</div>
</div>
<?php get_footer(); ?>