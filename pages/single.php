<main class="main-single">
    <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('read-width') ?>>
        <?php get_template_part('parts/content','page'); ?>
    </article>
    <?php endwhile; ?>
</main>
<aside>
</aside>
