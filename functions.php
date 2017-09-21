<?php

// Add featured images
add_theme_support('post-thumbnails');

// stop redirection
remove_action('template_redirect', 'redirect_canonical');

// TODO: Remove when authentication is completed
add_filter('rest_allow_anonymous_comments', '__return_true');

// Allow users to comment as much as they want :D
add_filter('comment_flood_filter', '__return_false');

// Redirect all user-facing (non admin area) pages to '/'
// (Vue.js is handling routing now)
add_action('template_redirect', function () {
    if (!is_admin() && !is_front_page()) {
        wp_redirect(home_url());
        exit;
    }
});

// Attempted Auth Stuff
add_action('rest_api_init', function () {
    register_rest_route('auth/v1', '/signin', array(
        'methods' => 'POST',
        'callback' => 'login',
    ));
    register_rest_route('auth/v1', '/user', array(
        'methods' => 'POST',
        'callback' => 'user',
    ));
});

function login($request)
{
    //var_dump(get_current_user_id());
    $creds = array();
    $creds['user_login'] = $request["username"];
    $creds['user_password'] =  $request["password"];
    $creds['remember'] = true;
    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        echo $user->get_error_message();
    }
    wp_set_auth_cookie($user->id, true);

    return[
        wp_generate_auth_cookie($user->id, 10000000),
        wp_create_nonce('wp_rest')
    ];
}

function user($request)
{
    return get_current_user_id();
}
