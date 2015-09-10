<?php 
add_action( 'posts_clauses', 'smamo_filter_admin_search', 10, 2 );
function smamo_filter_admin_search( $pieces, $query ){
      global $wpdb;

     //Check if this is the main query,and is a search on the admin screen
     if( $query->is_search() & $query->is_admin() && $query->is_main_query() ){

          $post_types = $query->get('post_type');
          $search = $query->get('s');

          if( 'medlem' == $post_types 
               || ( is_array(  $post_types ) && in_array( 'medlem',  $post_types ) )
          ){

            //Set up meta query
            $meta_query = array( 
                'relation' => 'OR',
                array(
                    'key' => array('medlem_name','medlem_type','medlem_sygehus','medlem_position'),
                    'value' => $search,
                    'compare' => 'IN'
                ),
                
            );

             //Generate sql
             $meta_sql = get_meta_sql( $meta_query, 'post', $wpdb->posts, 'ID', $query );

             $pieces['join'] .= " ". $meta_sql['join'];
             $pieces['where'] .= " OR (" . $meta_sql['where'] .")";
          }
     }
     return $pieces;
}