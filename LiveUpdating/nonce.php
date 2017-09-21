<?php
    /*
    *   Here we attach the wordpress nonce cookie authenticator to
    *   the window object. So we can access it any script.
    *   Just make sure to load this file in the hear
    */
?>
<script>
    window.nonce = <?php echo wp_create_nonce('wp_rest'); ?>
</script>
