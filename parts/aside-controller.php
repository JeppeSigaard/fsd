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
        if($aside['list_show_as'] === '1'){$post_list_class .=' list-wide list-split';}
        elseif($aside['list_show_as'] === '2'){$post_list_class .=' list-split';}
        
        // Post list vars
        $list_args = array();
        $list_args['post_type'] = 'post';
        $list_args['posts_per_page'] = -1;

        // Header
        $list_header = (isset($aside['add_header'])) ? $aside['add_header'] : false;
        $list_header_link = (isset($aside['add_header_link'])) ? get_permalink($aside['add_header_link']) : false;
        if(!$list_header_link) {
            $list_header_link = (isset($aside['add_header_link_special'])) ? $aside['add_header_link_special'] : false;
        }

        if(!$list_header_link) {
            $list_header_link = '#';
        }


        // Kommende begivenheder
        if($aside['list_show_type'] === 'events_new'){
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
            $list_args['post_type'] = 'page';
            $list_args['orderby']  = 'menu_order';
            $list_args['order'] = 'DESC';
            $list_args['post_parent'] = get_the_ID();
        }

        // Seneste nyheder
        if($aside['list_show_type'] === 'post'){
            $list_args['post_type'] = 'post';
            $list_args['posts_per_page'] = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: -1;
        }

        // Referater
        if($aside['list_show_type'] === 'referat') {
            $list_args['post_type'] = 'referat';
            $list_args['posts_per_page'] = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: -1;
            $post_list_class .= ' type-file';
        }

        // Rapport
        if($aside['list_show_type'] === 'rapport') {
            $list_args['post_type'] = 'rapport';
            $list_args['posts_per_page'] = ($aside['list_num_posts'] !== '') ? $aside['list_num_posts']: -1;
            $post_list_class .= ' type-file';
        }
        
    
    $i= 0; $list_loop = new WP_Query($list_args); if ($list_loop->have_posts()) : ?>
    <section class="post-list-section<?php echo $list_section_class; ?>">
       <div class="inner read-width">
            <?php if ($list_header) : ?>
            <header class="post-list-header">
               <a href="<?php echo $list_header_link ?>" class="arrow-link"><?php echo $list_header ?></a>
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








