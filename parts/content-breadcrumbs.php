<?php
if (get_post_type(get_the_ID()) === 'post' ){
    
    $bc_1 = array(
        'url' => get_bloginfo('url').'/ny-viden/',
        'name' => 'Ny viden',
    );
    
    $bc_2 = array(
        'url' => get_bloginfo('url').'/ny-viden/nyheder',
        'name' => 'Nyheder',
    );
    
}

else if (get_post_type(get_the_ID()) === 'event' ){
    
    $bc_1 = array(
        'url' => get_bloginfo('url'),
        'name' => get_bloginfo('name'),
    );
    
    $bc_2 = array(
        'url' => get_bloginfo('url').'/arrangmenter/',
        'name' => 'Arrangementer',
    );
    
}

else if (get_post_type(get_the_ID()) === 'rapport' ){
    
    $bc_1 = array(
        'url' => get_bloginfo('url').'/ny-viden/',
        'name' => 'Ny viden',
    );
    
    $bc_2 = array(
        'url' => get_bloginfo('url').'/ny-viden/vejledninger-og-rapporter/',
        'name' => 'Vejledninger og rapporter',
    );
    
}

else if (get_post_type(get_the_ID()) === 'referat' ){
    
    $bc_1 = array(
        'url' => get_bloginfo('url').'/ny-viden/',
        'name' => 'Ny viden',
    );
    
    $bc_2 = array(
        'url' => get_bloginfo('url').'/ny-viden/referater/',
        'name' => 'Referater',
    );
    
}

else if (get_post_type(get_the_ID()) === 'hyperlink' ){
    
    $bc_1 = array(
        'url' => get_bloginfo('url').'/ny-viden/',
        'name' => 'Ny viden',
    );
    
    $bc_2 = array(
        'url' => get_bloginfo('url').'/ny-viden/links/',
        'name' => 'Links',
    );
    
}



else if ($post->post_parent)	{
    
    $bc_1 = array(
        'url' => get_permalink( $post->post_parent ),
        'name' => get_the_title($post->post_parent),
    );
    
    $bc_2 = array(
        'url' => get_permalink(get_the_ID()),
        'name' => get_the_title(),
    );
       
} 

else{
    
    $bc_1 = array(
        'url' => get_bloginfo('url'),
        'name' => get_bloginfo('name'),
    );
    
    $bc_2 = array(
        'url' => get_permalink(get_the_ID()),
        'name' => get_the_title(),
    );

}

?>
<div class="breadcrumbs read-width">
    <div class="bc-inner bc-left">
        <a class="arrow-link" href="<?php echo $bc_1['url'] ?>"><?php echo $bc_1['name'] ?></a>
    </div>
    <div class="bc-inner bc-right">
        <a class="reverse-arrow-link" href="<?php echo $bc_2['url']; ?>"><?php echo $bc_2['name']; ?></a>
    </div>

</div>