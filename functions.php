<?php

// Add featured images
add_theme_support('post-thumbnails');

// stop redirection
remove_action('template_redirect', 'redirect_canonical');

// hide the admin bar (because ewwwww)
add_filter('show_admin_bar', '__return_false');

// TODO: Remove when authentication is completed
add_filter('rest_allow_anonymous_comments', '__return_true');

// Allow users to comment as much as they want :D
add_filter('comment_flood_filter', '__return_false');

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

// Redirect non-logged in users
add_action('template_redirect', function () {
    if (!is_user_logged_in()) {
        auth_redirect();
    }
});

// Redirect after login
add_filter('login_redirect', function () {
    return home_url();
});

// Auto-login users on registration
// auto log in a user who has just signed up
add_action('user_register', function ($user_id) {
    wp_set_auth_cookie($user_id, false, is_ssl());
});

// Redirect after user registration
add_filter('registration_redirect', function () {
    return home_url();
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

    return [
        $user,
        wp_generate_auth_cookie($user->id, 10000000),
        wp_create_nonce('wp_rest')
    ];
}

function user($request)
{
    return get_current_user_id();
}
