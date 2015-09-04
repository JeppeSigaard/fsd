<?php 

$aside_control = get_post_meta(get_the_ID(),'add_section',true); 

echo '<pre>';
print_r($aside_control);
echo '</pre>';

foreach($aside_control as $aside) :

    if($aside['add_type'] === 'quick_links') : ?>
        
        <section class="quick-links">
            <div class="inner">
                <ul class="post-list list-quick-links">
                
                <?php $i = 1; while ($i < 5 ) {
                
                    $ql = 'ql_'.$i;
        
                    $post = get_post($aside['quick_links_field_group'][$ql]); 
                    setup_postdata($post);
                    
                    get_template_part('parts/list','item');
        
                    wp_reset_postdata();
        
                    $i++;
                } ?>
                    
                </ul>
            </div>
        </section>
    
    <?php elseif ($aside['add_type'] === 'list') : ?>
    <section class="list-events-new">
       <div class="inner read-width">
           <header class="post-list-header">
               <a href="#" class="arrow-link">Kommende arrangementer</a>
           </header>
            <ul class="post-list list-wide list-split">
               <?php $i= 0; while ($i < 4) : $i++;?>
               <?php get_template_part('parts/list','item'); ?>
               <?php endwhile; ?>
           </ul>
       </div>
    </section>
    
    <?php endif; endforeach; ?>