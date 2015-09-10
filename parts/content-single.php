<?php if( has_post_thumbnail() ) : $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'double-wide' ); ?> 
<div class="single-img" style="background-image:url(<?php echo $image_url[0]; ?>);">
    <div class="post-date">
        <span><?php the_date('d'); ?></span>
        <span><?php echo get_the_date('M Y'); ?></span>
    </div>
</div>
<?php else : ?>
<div class="no-img">
    <div class="post-date">
        <span><?php the_date('d'); ?></span>
        <span><?php echo get_the_date('M Y'); ?></span>
    </div>
</div>
<?php endif; ?>
<h1 class="post-title"><?php the_title(); ?></h1>
<?php the_content(); ?>