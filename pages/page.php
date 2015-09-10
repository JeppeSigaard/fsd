<main>
    <?php get_template_part('parts/content','breadcrumbs') ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('read-width') ?>>
        <?php get_template_part('parts/content','page'); ?>
        <?php if(get_post_meta(get_the_ID(),'show_signup_form',true) === '1'){get_template_part('parts/member','form'); } ?>
        <?php if(get_post_meta(get_the_ID(),'show_newsletter_form',true) === '1'){get_template_part('parts/newsletter','subscribe'); } ?>
    </article>
    <?php endwhile; ?>
    
</main>
<aside>
    <?php get_template_part('parts/aside','controller'); ?>
</aside>
