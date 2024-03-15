<?php get_header(); ?>
  <div class="map2" id="map">
	<script async>
	function initMap() {
	  var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: {lat: 54.742562, lng: 20.477901}
	  });

	  var image = 'https://new.mirmasel39.ru/wp-content/themes/mobil1/img/logo.png';
	  var beachMarker = new google.maps.Marker({
		position: {lat: 54.742562, lng: 20.477901},
		map: map, 
		icon: image
	  });
	}
	</script>
	<script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKJCBcNGtwRkIUheSWVZquN8jbUjf9fbU&callback=initMap">
    </script>
</div>

 
<div class="main container-fluid">
    <div class="container general_cont">

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
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
       <!----------------------------home------------------------------------->

          <?php the_content(); ?>
      <?php endwhile; endif; ?>
      
    </div>
</div>

<?php get_footer(); ?>
