

<?php

$args = array( 
    'post_type' => 'post', 
    'meta_query' => array( 
        'relation' => 'AND', 
        array( 
            'key' => 'post_price', 
            'value' => 80,  //$prix
            'type' => 'numeric', 
            'compare' => '=',
         ), 
         array( 
            'key' => 'lit', 
            'value' => 2, //$adulte + $enfant
            'type' => 'numeric', 
            'compare' => '=', 
         ),
        array( 
            'key' => 'location', 
            'value' => 'Paris', //$location
        ) 
    ) 
);

$postslist = get_posts( $args );

print_r($postslist);

?>