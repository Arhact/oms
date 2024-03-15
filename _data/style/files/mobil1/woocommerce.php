<?php get_header(); ?>
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
        <h1><?php echo wp_title();?></h1>
    </div> 
</div>    
<div class="main main_woo container-fluid">

 <div class="container general_cont_woo">


<?php
                    if ( is_singular( 'product' ) ) {
                        echo '<div class="woo_full_cont">';
                        woocommerce_content();
                        echo '</div>';
                    }else{
                        //For ANY product archive.
                        //Product taxonomy, product search or /shop landing
                        wc_get_template( 'archive-product.php' );
                    }
                    ?> 
</div>
<?php get_footer(); ?>

 