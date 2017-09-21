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
    <!-- Use this during development for HMR -->
    <script src="http://localhost:8080/dist/build.js"></script>
    <!-- Switch to this in production -->
    <!-- <script src="<?= get_stylesheet_directory_uri() ?>/dist/build.js"></script> -->

    <?php wp_footer(); ?>
</body>

</html>
