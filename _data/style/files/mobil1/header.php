<!doctype html>
 <html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <meta name="theme-color" content="#ff9000">
	<meta name="mailru-domain" content="qiMKpPjofCVQReN8" />
    <link rel="shortcut icon" type="image/png" href="<?php bloginfo("template_directory");?>/favicon.png">	
    <link href="<?php bloginfo("template_directory");?>/woo.css" rel="stylesheet"> 

    <?php wp_head(); ?>
  </head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
        <nav itemscope itemtype="http://www.schema.org/SiteNavigationElement" class="menu_small">
               <div class="menu_icon_line">
                    <div class="icon-menu">
                        <i class="icon-menu_font" aria-hidden="true"></i>
                        МЕНЮ
                    </div>
                </div>
           <div class="small_menu_cont">
                <div class="icon-close">
                    <i class="icon-cancel" aria-hidden="true"></i>
                </div>
                <?php wp_nav_menu(array('menu' => 'small_menu')); ?>
            </div>
        </nav> 
    <div class="container-fluid header_bg">
        <div class="container header">
            <div class="logo"> 
                <a href="https://new.mirmasel39.ru"> 
                    <img alt="Автокомплекс Мобил 1 Центр Третьяковский" src="<?php bloginfo("template_directory");?>/img/logo.png">  
                    <span class="logo_text">
                        Мир Масел 
                    </span>
                    <span class="logo_phone">
                        автомасла, автохимия
                    </span>
               </a> 
            </div>
                <?php dynamic_sidebar( 'header_search' ); ?>
            <div class="contact_header">
                <div class="header_right">
                    <a href="#" class="login_cont">
                        <i class="icon-user" aria-hidden="true"></i>
                        <span>Войти</span>
                    </a>   
                    <a  href="#openModal" onclick="search_add" class="login_cont">
                        <i class="icon-list-alt" aria-hidden="true"></i>
                        <span>Пройти ТО</span>
                    </a>     
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg_menu">
        <div class="menu_cont container">
            <div class="header_menu">
                <div itemscope itemtype="http://www.schema.org/SiteNavigationElement" class="cont_nav">
                    <?php wp_nav_menu(); ?>
                </div>
                <div class="header_menu_right"> 
                    <a href="#"><i class="icon-phone" aria-hidden="true"></i>8 (4012) 915-208 </a>
                       <div class="s-header__basket-wr cart_menu widget_cart">
                            <?php
                            global $woocommerce; ?>
                            <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="basket-btn basket-btn_fixed-xs">
                                <?php dynamic_sidebar( 'header_cart' ); ?>
                                <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                                <i class="icon-basket" aria-hidden="true"></i>
                            </a>

                        </div>    
                </div>
            </div>
        </div>     
    </div>
    <div class="slider_bottom">
    </div>