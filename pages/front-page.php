
<?php get_template_part('parts/front','slider'); ?>
<section class="front-page-article">
    <div class="inner read-width">
        <article <?php post_class(); ?>>
            <?php while(have_posts()) : the_post(); ?>
            <?php //the_title('<h1 class="page-title">','</h1>'); ?>
            <?php the_content();?>
            <?php endwhile; ?>
        </article>
    </div>
</section>
<?php get_template_part('parts/aside','controller'); ?>
<?php get_template_part('parts/newsletter','subscribe'); ?>