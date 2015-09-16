<?php 
    
$slider_args = array(
    'post_type' => 'any',
    'posts_per_page' => 6,
    'orderby'  => 'post_Date',
    'order' => 'DESC',
    'meta_key'  => 'show_in_slide',
    'meta_value'    => 1,
);

?>
<?php $slide_query = new WP_Query($slider_args); if ($slide_query->have_posts()) : ?>
<section class="front-page-slider">
    <div class="inner">
        <ul class="post-list list-front-slider">
            <?php 
            
                while ($slide_query->have_posts() ) : $slide_query->the_post(); 
                
                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'cinemascope' );
                
                $date_1 = get_the_date('d', get_the_ID());
                $date_2 = get_the_date('m Y', get_the_ID());

                if('event' === get_post_type(get_the_ID())){

                    $date_1 = date('d', strtotime( get_post_meta(get_the_ID(),'start_date',true)));
                    $date_2 = date('m Y', strtotime( get_post_meta(get_the_ID(),'start_date',true)));

                }
            ?>
            <li class="list-item">
                <a href="<?php the_permalink(); ?>" class="post_class inner">
                    <div class="list-item-img" style="background-image:url(<?php echo $image_url[0] ?>);">
                        <?php if ('page' !== get_post_type(get_the_ID())) : ?>
                        <div class="post-date"><span><?php echo $date_1 ?></span><span><?php echo $date_2 ?></span></div>
                        <?php endif; ?>
                    </div>
                    <header class="list-item-header"><?php the_title(); ?></header>
                </a>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul> 
        <div class="front-page-slider-prev-next">
            <a href="#" class="arrow-link">Forrige</a>
            <a href="#" class="arrow-link left">Næste</a>
        </div>  
    </div>
</section>
<?php endif; ?>