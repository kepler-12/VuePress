<?php

// Add featured images
add_theme_support('post-thumbnails');

// stop redirection
remove_action('template_redirect', 'redirect_canonical');
