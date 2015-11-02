<?php 
if ('page' !== get_post_type(get_the_ID()) || get_post_meta(get_the_ID(),'show_thumbnail',true) === '1') : 
    if( has_post_thumbnail() ) : 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'double-wide' ); 
?> 
<div class="single-img" style="background-image:url(<?php echo $image_url[0]; ?>);"></div>
<?php endif; endif; ?>
<h1 class="post-title"><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php get_template_part('parts/post','attachment'); ?>
<?php get_template_part('parts/admission','form'); ?>
