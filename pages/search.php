<section class="search-results">
   <div class="inner read-width">
        <header class="post-list-header">
           <a href="<?php bloginfo('url') ?>/?s=<?php echo wp_strip_all_tags($_GET['s']) ?>" class="arrow-link">Resultater for '<?php echo wp_strip_all_tags($_GET['s']) ?>'</a>
        </header>
        <?php if (have_posts()) : ?>
        <ul class="post-list search-list list-wide">
            <?php  while(have_posts()) : the_post(); ?>
            <?php get_template_part('parts/list','item') ?>
            <?php endwhile; ?>
       </ul>
       <?php else : ?>
        <article class="search-no-dice">
            <h4>Ingen resultater</h4>
            <p>Vi fandt ikke det du søgte efter. Du kan kontrollere din indtastning og prøve igen:</p>
            <form id="search-redo" action="<?php bloginfo('url') ?>">
                <input type="text" name="s" placeholder="Søg på FSD" value="<?php echo wp_strip_all_tags($_GET['s']) ?>">
                <input type="submit" class="header-bar-button button-search" value="Søg">
            </form>
       </article>
       <?php endif; ?>
    </div>
</section>