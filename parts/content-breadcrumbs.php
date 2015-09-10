<?php
if ($post->post_parent)	{
    
    $bc_1 = array(
        'url' => get_permalink( $post->post_parent ),
        'name' => get_the_title($post->post_parent),
    );
       
} 

else{
    
    $bc_1 = array(
        'url' => get_bloginfo('url'),
        'name' => get_bloginfo('name'),
    );

}

?>
<div class="breadcrumbs read-width">
    <div class="bc-inner bc-left">
        <a class="arrow-link" href="<?php echo $bc_1['url'] ?>"><?php echo $bc_1['name'] ?></a>
    </div>
    <div class="bc-inner bc-right">
        <a class="reverse-arrow-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>

</div>