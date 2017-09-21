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
add_filter('template_redirect', function () {
    if (!is_admin()) {
        wp_redirect(home_url());
        exit;
    }
});
