<?php 
$quick_links = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 4,
    'meta_key'  => 'quicklinks_check',
    'meta_value'    => 1,
));
?>
<section class="quick-links">
    <div class="inner">
        <ul class="post-list list-quick-links">
            <?php while ($quick_links->have_posts()) : $quick_links->the_post();?>
            <?php get_template_part('parts/list','item'); ?>
            <?php endwhile; ?>
        </ul>
    </div>
</section>