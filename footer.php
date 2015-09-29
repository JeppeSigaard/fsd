<footer class="site-footer">
    <div class="inner">
        <a href="<?php echo esc_url(bloginfo('url')) ?>">
            <?php include get_template_directory().'/libs/img/logo.svg'; ?>
        </a>
        <span class="page-title-da"><?php echo get_theme_mod('stem_navn'); ?></span>
        <span class="page-title-en"><?php echo get_theme_mod('stem_navn_engelsk'); ?></span>
        <a href="mailto<?php echo get_theme_mod('stem_email'); ?>"><?php echo get_theme_mod('stem_email'); ?></a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
