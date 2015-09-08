<?php 

$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 

$date_1 = get_the_date('d', get_the_ID());
$date_2 = get_the_date('m Y', get_the_ID());

if('event' === get_post_type(get_the_ID())){

    $date_1 = date('d', strtotime( get_post_meta(get_the_ID(),'start_date',true)));
    $date_2 = date('m Y', strtotime( get_post_meta(get_the_ID(),'start_date',true)));
    
}

?>
<li <?php post_class('list-item'); ?>>
    <a href="<?php the_permalink(); ?>" class="inner">
        <div class="list-item-img" <?php echo (is_array($image_url)) ? 'style="background-image:url('.$image_url[0].');"' : ''?>>
            <?php if ('page' !== get_post_type(get_the_ID())) : ?>
            <div class="post-date"><span><?php echo $date_1 ?></span><span><?php echo $date_2 ?></span></div>
            <?php endif; ?>
        </div>
        <header class="list-item-header"><?php the_title(); ?></header>
        <div class="list-item-excerpt"><?php the_excerpt(); ?></div>
    </a>
</li>


