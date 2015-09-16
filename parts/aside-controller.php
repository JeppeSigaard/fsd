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
        $list_section_class = 'list';
        $list_header_link_class = '';
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
            $list_section_class=" list-events-new";
            $list_args['post_type'] = 'event';
            $list_args['orderby']  = 'meta_value';
            $list_args['meta_key']  = 'start_date';
            $list_args['order'] = 'ASC';
            $list_args['meta_type'] = 'DATETIME';
            $list_max = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: 999;
        }

        // Tidligere begivenheder
        if($aside['list_show_type'] === 'events_old'){
            $list_header = 'Tidligere Arrangementer';
            $list_header_link_class = ' grey';
            $list_section_class=" list-events-old";
            $list_args['post_type'] = 'event';
            $list_args['orderby']  = 'meta_value';
            $list_args['meta_key']  = 'start_date';
            $list_args['order'] = 'DESC';
            $list_args['meta_type'] = 'DATETIME';
            $list_max = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: 999;
        }

        // Undersider
        if($aside['list_show_type'] === 'underside'){
            $list_section_class = ' list-sub-pages';
            $list_args['post_type'] = 'page';
            $list_args['orderby']  = 'menu_order';
            $list_args['order'] = 'DESC';
            $list_args['post_parent'] = get_the_ID();
        }

        // Seneste nyheder
        if($aside['list_show_type'] === 'post'){
            $list_section_class = ' list-latest-news';
            $list_args['post_type'] = 'post';
            $list_header = 'Seneste nyt';
            $list_args['posts_per_page'] = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: -1;
        }
        
    
    $i= 0; $list_loop = new WP_Query($list_args); if ($list_loop->have_posts()) : ?>
    <section class="post-list-section<?php echo $list_section_class; ?>">
       <div class="inner read-width">
            <?php if ($aside['list_show_type'] !== 'underside') : ?>
            <header class="post-list-header">
               <a href="#" class="arrow-link<?php echo $list_header_link_class ?>"><?php echo $list_header ?></a>
            </header>
            <?php endif;  ?>
            <ul class="<?php echo $post_list_class; ?>">
                <?php while($list_loop->have_posts()) : $list_loop->the_post(); 
                if ( 'event' !== get_post_type(get_the_ID()) 
                     || $aside['list_show_type'] === 'events_new' && strtotime(get_post_meta(get_the_ID(),'start_date',true)) >= time() && $i < $list_max 
                     || $aside['list_show_type'] === 'events_old' && strtotime(get_post_meta(get_the_ID(),'start_date',true)) <= time() && $i < $list_max ) : 
                ?>
               <?php get_template_part('parts/list','item'); ?>
               <?php endif; $i ++ ; endwhile; wp_reset_postdata(); ?>
           </ul>
       </div>
    </section>
    <?php endif; ?>
    
    
    
    <?php elseif ( $aside['add_type'] === 'member_list' ) : // -- MEDLEMMER --  // 
    $post_list_class = 'post-list';
    if($aside['member_list_show_as'] === '1'){
        $post_list_class .= ' list-wide list-split';
    }

    if($aside['member_list_show_as'] === '2'){
        $post_list_class .= ' list-split';
    }

    $list_args = array(
        'post_type' => 'medlem',
        'posts_per_page' => ($aside['list_num_posts'] !== '') ? $aside['list_num_posts'] : -1,
        'orderby'   => 'menu_order',
        'order' => 'ASC',
    );

    if(is_array($aside['member_list_show_type'])){
        
        $list_args['tax_query'] = array(
            array(
                'taxonomy' => 'gruppe',
                'field'    => 'term_id',
                'terms' => $aside['member_list_show_type'],
                'operator'  => 'IN',
            ),
        );
    }

    $list_loop = new WP_Query($list_args); if ($list_loop->have_posts()) : ?>
    <section class="post-list-section post-list-members">
       <div class="inner read-width">
            <ul class="<?php echo $post_list_class; ?>">
                <?php while($list_loop->have_posts()) : $list_loop->the_post(); ?>
                <?php get_template_part('parts/list','item'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
           </ul>
       </div>
    </section>
    <?php endif; ?>
    
    <?php endif; endforeach; endif; ?>








