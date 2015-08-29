<?php get_header(); ?>
<div class="page-wrap">
    <nav class="site-nav">
        <div class="inner">
            <?php wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'container' => 'false',
                'fallback_cb'     => 'null',
                'items_wrap'      => '<ul class="site-nav-menu">%3$s</ul>',
            )); ?>
        </div>
    </nav>
    <div class="content">
    <?php

    if(is_home() || is_front_page()){
        require 'pages/front-page.php';
    }

    elseif(is_archive()){
        require 'pages/archive.php';
    }

    elseif(is_page()){
        require 'pages/page.php';
    }

    elseif(is_single()){
        require 'pages/single.php';
    }

    else{require 'pages/404.php';}

    ?>
    </div>
</div>
<? get_footer();