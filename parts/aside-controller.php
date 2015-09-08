


<?php 

$aside_control = get_post_meta(get_the_ID(),'add_section',true);

if (is_array($aside_control)) : foreach($aside_control as $key => $aside) :

    if($aside['add_type'] === 'quick_links') :  // -- QUICK LINKS --  //  ?>
        
        <section class="quick-links">
            <div class="inner">
                <ul class="post-list list-quick-links">
                
                <?php $i = 1; while ($i < 5 ) {
                
                    $ql = 'ql_'.$i;
        
                    $post = get_post($aside[$ql]); 
                    setup_postdata($post);
                    
                    get_template_part('parts/list','item');
        
                    wp_reset_postdata();
        
                    $i++;
                } ?>
                    
                </ul>
            </div>
        </section>
        
    <?php elseif ($aside['add_type'] === 'newsletter') : // -- NYHEDSBREV  --  //?
        get_template_part('parts/newsletter','subscribe') ?>
    
    
    <?php elseif ($aside['add_type'] === 'list') : // -- LISTER  --  //
        

        // Post list klasse
        $post_list_class = 'post-list';
        if($aside['list_show_as'] === '1'){$post_list_class .=' list-wide list-split';}
        elseif($aside['list_show_as'] === '2'){$post_list_class .=' list-split';}
        
        // Post list vars
        $list_args = array();
        $list_header = 'Indlæg';
        $list_args['post_type'] = 'post';
        $list_args['posts_per_page'] = -1;


        // Kommende begivenheder
        if($aside['list_show_type'] === 'events_new'){
            $list_header = 'Kommende Arrangementer';
            $list_args['post_type'] = 'event';
            $list_args['orderby']  = 'meta_value';
            $list_args['meta_key']  = 'start_date';
            $list_args['order'] = 'ASC';
            $list_args['meta_type'] = 'DATETIME';
            $list_max = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: 999;
        }

        // Undersider
        if($aside['list_show_type'] === 'underside'){
            $list_header = get_the_title();
            $list_args['post_type'] = 'page';
            $list_args['orderby']  = 'menu_order';
            $list_args['order'] = 'DESC';
            $list_args['post_parent'] = get_the_ID();
        }   
        
    ?>
    <?php $i= 0; $list_loop = new WP_Query($list_args); if ($list_loop->have_posts()) : ?>
    <section class="list-events-new">
       <div class="inner read-width">
           <header class="post-list-header">
               <a href="#" class="arrow-link"><?php echo $list_header ?></a>
           </header>
            <ul class="<?php echo $post_list_class; ?>">
                <?php while($list_loop->have_posts()) : $list_loop->the_post(); 
                if ( 'event' !== get_post_type(get_the_ID()) || strtotime(get_post_meta(get_the_ID(),'start_date',true)) >= time() && $i < $list_max ) : 
                ?>
               <?php get_template_part('parts/list','item'); ?>
               <?php endif; $i ++ ; endwhile; wp_reset_postdata(); ?>
           </ul>
       </div>
    </section>
    <?php endif; ?>
    
    <?php elseif ( $aside['add_type'] === 'member_list' ) : // -- MEDLEMMER --  // ?>
    
    <?php 

    echo '<pre>';
    print_r($aside_control[$key]);
    echo '</pre>';
    ?>
    
    <?php endif; endforeach; endif;?>