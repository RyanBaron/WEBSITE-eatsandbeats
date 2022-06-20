<?php

add_action('pre_get_posts',function($query){
  // gets the global query var object
  global $wp_query;

  if ( !$query->is_main_query() )
    return;

  // we remove the actions hooked on the '__after_loop' (post navigation)
  // remove_all_actions ( '__after_loop');
}, 999, 1);
