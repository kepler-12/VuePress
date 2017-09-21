<?php

// Add featured images
add_theme_support('post-thumbnails');

// stop redirection
remove_action('template_redirect', 'redirect_canonical');

// Allow anyone to comment as much as they want :D
add_filter('rest_allow_anonymous_comments', '__return_true');
add_filter('comment_flood_filter', '__return_false');

add_action( 'rest_api_init', function () {
  register_rest_route( 'auth/v1', '/signin', array(
    'methods' => 'POST',
    'callback' => 'login',
  ) );
  register_rest_route( 'auth/v1', '/user', array(
    'methods' => 'POST',
    'callback' => 'user',
  ) );
} );
function login($request){
    //var_dump(get_current_user_id());
    $creds = array();
    $creds['user_login'] = $request["username"];
    $creds['user_password'] =  $request["password"];
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) ) {
        echo $user->get_error_message();
    }
    wp_set_auth_cookie( $user->id, true);
    return[
        wp_generate_auth_cookie($user->id, 10000000),
        wp_create_nonce( 'wp_rest' )
    ];
}

function user($request){
    return get_current_user_id();
}
