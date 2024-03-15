<?php
add_theme_support( 'woocommerce' );


/*single_woo*/
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "<div class=\" single_img_cont \">";'), 11);
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 12 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_action('woocommerce_before_single_product_summary', create_function('', 'echo "<div class=\"price_cont\"><div class=\"rr_v\">₽</div><div class=\" price_cat \"><span>ЦЕНА С УСТАНОВКОЙ</span> ";'), 13);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 14);
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "</div><a class=\"add_button\" href=\"#form\">УСТАНОВИТЬ</a></div>";'), 15);

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = ' RUB'; break; 
     }
     return $currency_symbol; 
}

add_action('woocommerce_before_single_product_summary', create_function('', 'echo "</div></div></div></div>";'), 16);
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "<div class=\" all_img_cont \"><div class=\"container \">";'), 19);
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_thumbnails', 20 );
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "</div></div>";'), 21);
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "<div class=\" product_info \"><div class=\"container \">";'), 22);
add_action('woocommerce_before_single_product_summary', 'description_product_tab_content', 23);
add_filter('woocommerce_get_image_size_thumbnail','add_thumbnail_size',1,10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);

add_action('woocommerce_before_single_product_summary', create_function('', 'echo "</div>";'), 36);
add_action('woocommerce_before_single_product_summary', create_function('', 'echo "</div>";'), 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function add_thumbnail_size($size){

    $size['width'] = 500;
    $size['height'] = 380;
    $size['crop']   = 0; //0 - не обрезаем, 1 - обрезка
    return $size;
}
add_filter('woocommerce_get_image_size_gallery_thumbnail','add_gallery_thumbnail_size',1,10);
function add_gallery_thumbnail_size($size){
    $size['width'] = 500;
    $size['height'] = 380;
    $size['crop']   = 0;
    return $size;
}
add_filter('woocommerce_get_image_size_single','add_single_size',1,10);
function add_single_size($size){

    $size['width'] = 900;
    $size['height'] = 900;
    $size['crop']   = 0;
    return $size;
}
/*!single_woo*/
/*Витрина*/





function isa_woocommerce_all_pa(){
    global $product;
    $attributes = $product->get_attributes();
    if ( ! $attributes ) {
        return;
    }
    $out = '';
    echo "<div class='pa_out'>";
    foreach ( $attributes as $attribute ) {
            // skip variations
            if ( $attribute['is_variation'] ) {
                continue;
            }
        if ( $attribute['is_taxonomy'] ) {
            $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );
            // get the taxonomy
            $tax = $terms[0]->taxonomy;
            // get the tax object
            $tax_object = get_taxonomy($tax);
            // get tax label
            if ( isset ($tax_object->labels->name) ) {
                $tax_label = $tax_object->labels->name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
            }
            foreach ( $terms as $term ) {
                $out .= '<span class="pa_label">' . $tax_label . ': </span>';
                $out .= $term->name . '<br />';
            }
               
        } else {
            $out .= '<span class="pa_label">' .$attribute['name'] . ': ';
            $out .= $attribute['value'] . '<br />';
        }
    }
    $out2 = str_replace("Товар", "", $out);
    echo $out2;
    echo "</div>";
}
add_action('woocommerce_before_shop_loop_item_title', 'isa_woocommerce_all_pa', 21);
add_action('woocommerce_before_shop_loop_item_title', create_function('', 'echo "<span class=\"link_map\">ПОДРОБНЕЕ</span>";'), 22);

/*!Витрина*/
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
add_action('woocommerce_before_subcategory_title', 'woocommerce_template_loop_category_title', 11);
remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
add_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 15);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_title', 15);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_before_shop_loop_item_title', create_function('', 'echo "<div class=\" img_cont\">";'), 9);
add_action('woocommerce_before_shop_loop_item_title', create_function('', 'echo "</div>";'), 11);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item', create_function('', 'echo "<div class=\"price_cont_sm\"><div class=\"rr_v\">₽</div><div class=\" price_cat \"><span>ЦЕНА С УСТАНОВКОЙ</span> ";'), 13);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 14);
add_action('woocommerce_after_shop_loop_item', create_function('', 'echo "</div></div>";'), 15);

function description_product_tab_content() {
    echo '<div class="desc">'; 
    echo the_content();
    echo '</div>'; 
} 


function description_product_tab() {

} 
add_filter( 'woocommerce_product_tabs', 'description_product_tab' );
?>