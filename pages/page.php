<main>
    <?php get_template_part('parts/content','breadcrumbs') ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('read-width') ?>>
        <?php get_template_part('parts/content','page'); ?>
    </article>
    <?php endwhile; ?>
</main>
<aside>
    <?php get_template_part('parts/aside','controller'); ?>
</aside>
