<?php
/**
 * Plugin Name: My Shortcode Plugin
 * Description: To display a custom message do: 
 * Version: 0.0.1
 * Author: REInVent
 */

 function my_shortcode( $atts = array() ) {

   //check if name has been set otherwise set the value to world
   $atts_array = shortcode_atts( array( 'name' => 'World' ), $atts );
   
   //create a custom string to greet the user - don't trust the user
   $text = "Hello " .htmlspecialchars($atts_array['name'])."!"."<br>";
   
   //return our custom string
   return $text;
 }

 //register our shortcode
 add_shortcode('my_shortcode_plugin', 'my_shortcode');