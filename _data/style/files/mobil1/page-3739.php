<?php get_header(); ?>
<?php include_once 'slider.php';?>
<div class="main container-fluid">
    <div class="container general_cont">
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
                <div class="service_block">
                    <ul>
                        <li class="service_small">
                            <a href="https://kdmobil.ru/category/nashi-raboty/">
                                <i class="icon-camera-alt"></i>
                                <span>Наши работы</span>
                            </a>
                        </li>
                        <li class="service_small">
                            <a href="https://kdmobil.ru/category/blog/">
                                <i class="icon-list-alt"></i>
                                <span>Блог</span>
                            </a>
                        </li>
                        <li class="service_small">
                            <a href="https://kdmobil.ru/vakansii/">
                                <i class="icon-address-book-o"></i>
                                <span>Вакансии</span>
                            </a>
                        </li>
                        <li class="service_small">
                            <a href="https://kdmobil.ru/otzyvy/">
                                <i class="icon-thumbs-up"></i>
                                <span>Отзывы</span>
                            </a>
                        </li>
                        <li class="service_small">
                            <a href="https://kdmobil.ru/social/">
                                <i class="icon-megaphone"></i>
                                <span>Мы в социальных сетях</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <!----------------------------home------------------------------------->

                <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
        <?php get_footer(); ?>