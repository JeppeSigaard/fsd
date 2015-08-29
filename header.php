<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(' · ', true, 'right'); ?></title>
    <?php wp_head(); ?>
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
                    <span class="page-title-da">Foreningen For Sygehusmaskinmestre i Danmark</span>
                    <span class="page-title-en">The Danish Association of Hospital Engineers</span>
                </a>
                <div class="header-bar-nav">
                    <input type="text" placeholder="Søg på FSD">
                    <a class="header-bar-button button-search" href="#">Søg</a>
                    <a class="header-bar-button button-menu-toggle" href="#">Menu</a>
                </div>
            </div>
        </div>
    </header>