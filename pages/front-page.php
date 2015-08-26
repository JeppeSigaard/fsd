

<section class=" read-width">
    <article>
        <?php while(have_posts()) : the_post(); ?>
        <?php the_title('<h1 class="page-title center">','</h1>'); ?>
        <?php the_content();?>
        <?php endwhile; ?>
    </article>
</section>