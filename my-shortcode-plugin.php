<?php
/**
 * Plugin Name: My Shortcode Plugin
 * Description: To display a custom message do: [my_shortcode_plugin name="name here"] or maybe it's [shortcode]description[shortcode]
 * Version: 1.1.0
 * Author: REInVent
 */

//register our shortcode
add_shortcode('shortcode', 'my_shortcode');

//register uninstall.php
register_uninstall_hook(plugin_dir_url(__FILE__).'uninstall.php', 'uninstall_my_shortcode_plugin');

function my_shortcode_init() {

 function my_shortcode( $atts = array(), $content = null, $tag ) {

  //array of allowed html for tags wp_kses
    $allow = array(
      'br' => array(),
      'em' => array(),
      'strong' => array(),
    );

    //check if name or url set otherwise assign them a default value
    $atts_array = shortcode_atts( array( 
      'name' => 'World',
      'url' => '#'
    ), $atts );

    //create a custom string to greet the user - don't trust the user - EXCELLENT!
    $text = "
    <style>
    .card {
      max-width: 400px;
      margin: 20px;
      text-align: left;
    }
    .card-border {
      border-style: double;
      max-width: 450px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    .image {
      float: right;
      width: 150px;
    }
    </style>

    <div class='wrap'>
      <div class='card-border'>
        <div class='card'>
          <h2>" . esc_attr($atts_array['name']) . "</h2>
          <img src='" . esc_url($atts_array['url']) . "' class='image' alt='profile picture' />
          <p>" . esc_attr($content) . "</p>
        </div>
      </div>
    </div>
    <br />
    ";

    //return our custom string
    return $text;
  }
  
}


function shortcode_options_page() {
    add_menu_page(
        'Shortcode',
        'Shortcode',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null,
        plugin_dir_url(__FILE__) . 'css/icon.png',
        20
    );
}

add_action( 'admin_menu', 'shortcode_options_page' );
add_action('init', 'my_shortcode_init');
 ?>