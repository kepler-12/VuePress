<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="nonce" content="<?= wp_create_nonce('wp_rest') ?>">
    <meta name="logout-nonce" content="<?= wp_create_nonce('log-out') ?>">
    <title>VuePress</title>
    <?php wp_head(); ?>
</head>

<body>
    <!-- Our main app container and attachment point for vue -->
    <div id="app"></div>

    <!-- Nonces for everyone! -->
    <script>
    window.user = <?= json_encode(wp_get_current_user()) ?>;
    </script>

    <!-- Use this during development for HMR -->
    <script src="http://localhost:8080/dist/build.js"></script>

    <!-- Switch to this in production -->
    <!-- <script src="<?= get_stylesheet_directory_uri() ?>/dist/build.js"></script> -->
</body>

</html>
