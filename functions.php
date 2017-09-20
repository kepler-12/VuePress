<?php

// Add featured images
add_theme_support('post-thumbnails');

// stop redirection
remove_action('template_redirect', 'redirect_canonical');

// Allow anyone to comment as much as they want :D
add_filter('rest_allow_anonymous_comments', '__return_true');
add_filter('comment_flood_filter', '__return_false');
