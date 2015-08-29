
<main>
    <div class="breadcrumbs read-width">
        <div class="bc-inner bc-left">
            <a class="arrow-link">Breadcrumb 1</a>
        </div>
        <div class="bc-inner bc-right">
            <a class="reverse-arrow-link">Breadcrumb 2</a>
        </div>
        
    </div>
    <?php while ( have_posts() ) :the_post(); ?>
    <article <?php post_class('read-width') ?>>
        <?php get_template_part('parts/content','single'); ?>
    </article>
    <?php endwhile; ?>
</main>
<aside></aside>
