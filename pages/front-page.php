
<section class="front-page-slider">
    <div class="inner">        
    </div>
</section>

<section class="front-page-article read-width">
    <article <?php post_class(); ?>>
        <?php while(have_posts()) : the_post(); ?>
        <?php the_title('<h1 class="page-title">','</h1>'); ?>
        <?php the_content();?>
        <?php endwhile; ?>
    </article>
</section>