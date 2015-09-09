<section class="search-results">
   <div class="inner read-width">
        <ul class="post-list search-list">
            <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <?php get_template_part('parts/list','item') ?>
            <?php endwhile; endif; ?>
       </ul>
    </div>
</section>