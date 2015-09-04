<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
<li <?php post_class('list-item'); ?>>
    <a href="<?php the_permalink(); ?>" class="inner">
        <div class="list-item-img" <?php echo (is_array($image_url)) ? 'style="background-image:url('.$image_url[0].');"' : ''?>>
            <div class="post-date"><span>26</span><span>okt 2015</span></div>
        </div>
        <header class="list-item-header"><?php the_title(); ?></header>
        <div class="list-item-excerpt"><?php the_excerpt(); ?></div>
    </a>
</li>


