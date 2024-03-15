<?php
add_theme_support( 'woocommerce' );
/*woo*/
/**Woooo**/
/*****nels*****/
function my_search_form( $form ) {

	$form = '
	<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
        <input type="submit" id="searchsubmit" value="">
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="поиск..."/>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated) {
$translated = str_ireplace('Любой', ' ', $translated);
return $translated;
}


function ale_exclude_search_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'product');
    }

    return $query;
}
 
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}



function my_template_loop_product_title(){
    global $product;
    echo '<div class="promo_div">';
    $versionvalues = get_the_terms( $product->id, 'pa_promo');
	if ($versionvalues) {
    foreach ( $versionvalues as $versionvalue ) {
		
		 if ($versionvalue->name == "новинка") {
            echo '<div class="promo_new"></div>';
        }
		  elseif ($versionvalue->name == "хит") {
			echo '<div class="promo_hit"></div>';
		}
		elseif ($versionvalue->name == "рекомендуем") {
			echo '<div class="promo_rec"></div>';
		}
		elseif ($versionvalue->name == "скидка") {
			echo '<div class="promo_dis"></div>';
		}
}
 
    }

    echo '</div>';
}
add_action('woocommerce_shop_loop_item_title', 'my_template_loop_product_title', 16 );
function my_pa_loop(){
    global $product;
    echo '<div class="promo_info">';
    $versionvalues = get_the_terms( $product->id, 'pa_tip-produkta');
	if ($versionvalues) {
    foreach ( $versionvalues as $versionvalue ) {
            echo  $versionvalue->name;
        }
 
    }
    $versionvalues2 = get_the_terms( $product->id, 'pa_vyazkost');
	if ($versionvalues2) {
    foreach ( $versionvalues2 as $versionvalue ) {
            echo ' ' . $versionvalue->name;
            echo '<br>';
        }
 
    }
    $versionvalues3 = get_the_terms( $product->id, 'pa_strana-izgotovitel');
	if ($versionvalues3) {
    foreach ( $versionvalues3 as $versionvalue ) {
            echo $versionvalue->name;
        }
 
    }

    echo '</div>';
}
add_action('woocommerce_product_get_rating_html', 'my_pa_loop', 15 );



add_filter('woocommerce_product_get_rating_html', 'your_get_rating_html', 10, 2); 
  function your_get_rating_html($rating_html, $rating) {
      global $product;
      echo do_shortcode('[ratings id="$product->id"]');
  }

add_action('woocommerce_single_product_summary', create_function('', 'echo do_shortcode("[ratings]");'), 29);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

add_action('woocommerce_single_product_summary', create_function('', 'echo "<div class=\"price_cont\"><div class=\"rr_v\">₽</div><div class=\" price_cat \"><span>ЦЕНА</span> ";'), 9);
add_action('woocommerce_single_product_summary', create_function('', 'echo "</div></div>";'), 11);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20); 
//add_action('woocommerce_single_product_summary', create_function('', 'echo "</div></div></div><div class=\"container_fluid excerpt_line\"><div class=\"container\"><h4>Описание</h4>";'), 49);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 50);
add_action('woocommerce_single_product_summary', create_function('', 'echo "</div></div></div></div><div class=\"container_fluid\">";'), 51);

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    //unset( $tabs['description'] );          // Удалить вкладку описания
    unset( $tabs['reviews'] );          // Удалить вкладку отзывов
    //unset( $tabs['additional_information'] );  // Удалить вкладку дополнительной информации
 
    return $tabs;
 
}




function shop_sku(){
global $product;
echo '<div class="summary_top"><div itemprop="productID" class="sku">Артикул: <span>' . $product->sku . '</span></div>';
} 
add_action( 'woocommerce_single_product_summary', 'shop_sku', 5);


add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = ' RUB'; break;
     }
     return $currency_symbol;
}




function wcs_custom_get_availability( $availability, $_product ) {
    // Change In Stock Text
    echo "<h3>НАЛИЧИЕ ТОВАРА НА СКЛАДАХ</h3>";
    echo "<div><div class=\"sklad_stock\">Магазин Третьяковская, 4В</div><div class=\"view_stock\">";
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('', 'woocommerce');
        $quant_pcs == 0;
        $quant_pcs = $_product->get_stock_quantity();
        if ($quant_pcs == 1) {
            echo "<span></span>";
        }
        elseif ($quant_pcs < 4 && $quant_pcs > 1) {
            echo "<span></span><span></span>";
        }
        elseif ($quant_pcs < 7 && $quant_pcs > 3) {
            echo "<span></span><span></span><span></span>";
        }
        elseif ($quant_pcs < 10 && $quant_pcs > 6) {
            echo "<span></span><span></span><span></span><span></span>";
        }
        elseif ($quant_pcs > 9) {
            echo "<span></span><span></span><span></span><span></span><span></span>";
        }
         else {
            echo "<span></span><span></span><span></span>";
        } 
    }
    else {echo "Нет в наличии";}
    // Change Out of Stock Text

    echo "</div></div></div><div class=\" summary_bottom\">";
    //return $availability; 
}

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);

add_filter('woocommerce_after_add_to_cart_quantity', 'quantity_edit_plus', 1, 2);
function quantity_edit_plus() {
    echo "<div class=\"plus\">+</div>";
}
add_filter('woocommerce_after_add_to_cart_quantity', 'quantity_edit_minus', 1, 2);
function quantity_edit_minus() {
    echo "<div class=\"minus\">-</div>";
}
function one_click() {
 echo '<a href="#openModal" class="service_link">Заменить</a>';
}
add_action('woocommerce_single_product_summary', 'one_click', 31, 1);
add_action('woocommerce_single_product_summary', create_function('', 'echo "</div>";'), 31, 2);

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  
add_filter( 'woocommerce_product_add_to_cart_text' , 'woo_custom_single_add_to_cart_text2' );
function woo_custom_single_add_to_cart_text() {
    return __( 'В КОРЗИНУ', 'woocommerce' ); 
}
function woo_custom_single_add_to_cart_text2() {
    return __( '', 'woocommerce' ); 
}


/*****cat******/

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_title', 15);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_before_shop_loop_item_title', create_function('', 'echo "<div class=\"cart_cntk \">";'), 12, 2);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 13);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 13);
add_action('woocommerce_before_shop_loop_item_title', create_function('', 'echo "</div>";'), 14, 2);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 ); 
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_taxonomy_archive_description', 100 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_product_archive_description', 100 );
/*****!cat*****/
/*****nels!****/
/*woo*/

add_theme_support( 'wc-product-gallery-lightbox' );




 function nav_menu_schema($content) {
	$pattern = "<a";
	$replacement = '<a itemprop="url"';
	$content = str_replace($pattern, $replacement, $content);
	return $content;
}

add_filter('the_content', 'addrellightbox');
function addrellightbox($content) {
global $post;   
$pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png|webp)('|\")(.*?)>/i";
$replacement = '<a$1href=$2$3.$4$5 data-lightbox="image"$1 title="'.$post->post_title.'"$6>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
} 

function df_woocommerce_single_product_image_html($html) {
    $html = str_replace('data-rel="prettyPhoto', 'rel="lightbox', $html);
    return $html;
}
add_filter('woocommerce_single_product_image_html', 'df_woocommerce_single_product_image_html'); // single image
add_filter('woocommerce_single_product_image_thumbnail_html', 'df_woocommerce_single_product_image_html'); //


add_filter('wp_nav_menu', 'nav_menu_schema');
# удалить атрибут type у scripts и styles
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('wp_print_footer_scripts ', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
add_theme_support( 'post-thumbnails' );
add_image_size( 'news_img', 500, 370 ); // Hard Crop Mode

/*-----------------------------------------------------------------------------------*/
/* Убираем мусор: feed, shortlink
/*-----------------------------------------------------------------------------------*/
function mw_clear_wp_head()
{
  add_filter('xmlrpc_enabled', '__return_false');
  remove_action( 'wp_head', 'feed_links', 2 ); // Удаляет ссылки RSS-лент записи и комментариев
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Удаляет ссылки RSS-лент категорий и архивов

  remove_action( 'wp_head', 'rsd_link' ); // Удаляет RSD ссылку для удаленной публикации
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Удаляет ссылку Windows для Live Writer
  remove_action( 'wp_head', 'wp_generator' ); // Удаляет версию WordPress

  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); // Удаляет короткую ссылку
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Удаляет ссылки на предыдущую и следующую статьи
}
add_action( 'wp_head', 'mw_clear_wp_head', 1 );



//Подключение основного файла Style.css
function enqueue_styles() {
    wp_enqueue_style( 'mobil1', get_stylesheet_uri(), array(), '0.183'); 
} 
add_action('wp_enqueue_scripts', 'enqueue_styles');

//Подключение таблицы стилей для шрифтов 
/*function my_fonts_load() {
    $theme_uri = get_template_directory_uri();
    wp_register_style('my_theme_fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css', false, '0.1');
    wp_enqueue_style('my_theme_fonts');
}
    my_fonts_load();
*/
/*function img_rss($content) { 
global $post; 
if ( has_post_thumbnail( $post->ID ) ) { 
$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'style' => 'float:left; margin:0 10px 10px 0;' ) ) . '' . $content; 
}
return $content; 
} 
add_filter('the_excerpt_rss', 'img_rss'); 
add_filter('the_content_feed', 'img_rss'); */

//Подключение таблицы стилей для Анимации при прокрутке страницы
/*function animate_load() {
    $theme_uri = get_template_directory_uri();
    wp_register_style('my_theme_animate', $theme_uri.'/css/animate.css', false, '0.1');
    wp_enqueue_style('my_theme_animate');
}
    animate_load();*/
/*function my_style_load() {
    $theme_uri = get_template_directory_uri();
    wp_register_style('my_theme_style', $theme_uri.'/css/bootstrap.min.css', false, '0.1');
    wp_enqueue_style('my_theme_style');
}
add_action('wp_enqueue_scripts', 'my_style_load');




//Подключение библиотеки для Анимации при прокрутке страницы
/*function wpt_register_js() {
    wp_register_script('jquery.bootstrap', get_template_directory_uri() . '/js/wow.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap');
}
add_action( 'wp_enqueue_scripts', 'wpt_register_js' );

function register_bootstrapjquery() {
    wp_deregister_script( 'bootstrapjquery' );
    wp_register_script( 'bootstrapjquery', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'bootstrapjquery' );
}
add_action('wp_enqueue_scripts', 'register_bootstrapjquery');

add_action('wp_enqueue_scripts', 'my_style_load');
/* Enqueue scripts and styles. */
     wp_deregister_script('jquery');
     wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js", false, '1.12.2');
     wp_enqueue_script('jquery');

function register_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.js');
    wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'register_jquery');
/*function register_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.js');
    wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'register_jquery');*/
if ( ! function_exists( 'example_setup' ) ) :
/* Sets up theme defaults and registers support for various WordPress features. */
function solla_theme_setup() {

    // языковая поддержка
    load_theme_textdomain( 'solla', get_template_directory() . '/languages' );
    // фиды для rss-подписки
    add_theme_support( 'automatic-feed-links' );
    // добавление миниатюры поста
    add_theme_support( 'post-thumbnails' );
    // html5 форма поиска, форма и список комментариев
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
    ) );
    // какие форматы постов будут поддерживаться
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'status',
    ) );
}
endif;
add_action( 'after_setup_theme', 'solla_theme_setup' );

/* Menus */
register_nav_menus(array(
  'main_menu' => __('Navigation Menu'),
  'second_menu' => __('second Menu'),
    'menu_ext' => __('Menu Ext')
));

/* Register widget area */
function solla_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'solla' ),
        'id'            => 'right-sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'solla' ),
        'before_widget' => '<div class="widget">',
        'before_title'  => '<span class="widget-header">',
        'after_title'   => '</span>',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'solla_widgets_init' );

function solla_widgets_init2() {
    register_sidebar( array(
        'name'          => __( 'header_search', 'mobil1' ),
        'id'            => 'header_search',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'solla' ),
        'before_widget' => '<div class="widget_top">',
        'before_title'  => '<span class="widget-search">',
        'after_title'   => '</span>',
        'after_widget'  => '</div>',
    ) );
        register_sidebar( array( 
        'name'          => __( 'header_cart', 'mobil1' ),
        'id'            => 'header_cart',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'solla' ),
        'before_widget' => '',
        'before_title'  => '<span class="widget-cart">',
        'after_title'   => '</span>',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'solla_widgets_init2' );
/* Remove information about version of wordpress */
remove_action('wp_head', 'wp_generator');

/* Hide admin bar */
add_filter('show_admin_bar', '__return_false');

/* Excerpt properties */
add_filter( 'excerpt_length', function(){
	return 20;
} );



//only speed

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
 
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
// Remove WP embed script
function speed_stop_loading_wp_embed() {
if (!is_admin()) {
wp_deregister_script('wp-embed');
}
}
add_action('init', 'speed_stop_loading_wp_embed');

