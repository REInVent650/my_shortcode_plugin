<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  exit; // Exit if accessed directly
}

//not working yet/I haven't learned yet
/* function uninstall_my_shortcode_plugin() {

    $sql = "UPDATE wp_post SET post_content = REPLACE(post_content, '[shortcode]', '')";

    $wpdb->query(sql);
} */

?>