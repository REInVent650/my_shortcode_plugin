<?php

//die when the file is called directly
if(!defined('WP_UNINSTALL_PLUGIN')) {

    die;

}

//not working yet/I haven't learned yet
/* function uninstall_my_shortcode_plugin() {

    $sql = "UPDATE wp_post SET post_content = REPLACE(post_content, '[shortcode]', '')";

    $wpdb->query($sql);
} */

?>
