<?php
/**
 * Plugin Name: My Shortcode Plugin
 * Description: To display a custom message do: [my_shortcode_plugin name="name here"]
 * Version: 1.1.0
 * Author: REInVent
 */

//register our shortcode
add_shortcode('shortcode', 'my_shortcode');

//register uninstall.php
register_uninstall_hook(plugin_dir_url(__FILE__).'uninstall.php', 'uninstall_my_shortcode_plugin');

function my_shortcode_stylesheet() {

  wp_register_style('styles', plugin_dir_url(__FILE__).'styles.css');
  
  wp_enqueue_style('styles');
  
}

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

    //create a custom string to greet the user - don't trust the user
    $text = "<p class='text'>";
    
    $text .= "Hello ";

    $text .= esc_attr($atts_array['name']);
    
    $text .= "!"; 

    $text .= "<div><img src='";

    $text .= esc_url($atts_array['url']);
    
    $text .= "' class='image' alt='my image'/></div><div class='text'>";

    $text .= esc_attr($content);

    $text.= "</div>";

    $text .= "<br/>"; 

    //return our custom string
    return $text;
  }
  
}


add_action('init', 'my_shortcode_init');
 ?>