<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(' · ', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68531376-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <nav class="top-menu">
            <?php wp_nav_menu(array(
                'theme_location' => 'top_menu',
                'container' => 'false',
                'fallback_cb'     => 'null',
                'items_wrap'      => '<ul>%3$s</ul>',
            )); ?>
        </nav>
        <div class="header-bar">
            <div class="inner">
                <a href="<?php echo esc_url(bloginfo('url')); ?>" class="header-bar-logo">
                    <div class="logo">
                        <?php include get_template_directory().'/libs/img/logo.svg'; ?>
                    </div>
                    <span class="page-title-da"><?php echo get_theme_mod('stem_navn'); ?></span>
                    <span class="page-title-en"><?php echo get_theme_mod('stem_navn_engelsk'); ?></span>
                </a>
                <div class="header-bar-nav">
                    <form action="<?php bloginfo('url') ?>">
                    <input type="text" name="s" placeholder="Søg på FSD">
                    <input type="submit" class="header-bar-button button-search" value="Søg">
                    </form>
                    <a class="header-bar-button button-menu-toggle" href="#">Menu</a>
                </div>
            </div>
        </div>
    </header>
