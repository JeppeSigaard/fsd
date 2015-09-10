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