<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>vuepress</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="app"></div>

    <script>
    window.nonce = "<?= wp_create_nonce('wp_rest') ?>"
    </script>

    <!-- Use this during development for HMR -->
    <script src="http://localhost:8080/dist/build.js"></script>

    <!-- Switch to this in production -->
    <!-- <script src="<?= get_stylesheet_directory_uri() ?>/dist/build.js"></script> -->
</body>

</html>
