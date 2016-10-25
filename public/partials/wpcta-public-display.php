<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://wpeka.com
 * @since      1.0.0
 *
 * @package    WPCTA
 * @subpackage WPCTA/public/partials
 */


//function to generate shortcode
function WP_CTA_Widget_shortcode( $atts,$content=null ){
	global $wp_registered_widgets;
	$atts['echo'] = false;
	extract( shortcode_atts( array('id' => '','title' => true, /* wheather to display the widget title */
			'before_widget' => '','before_title' => '','after_title' => '','after_widget' => ''), $atts));
	if( empty( $id ) || ! isset( $wp_registered_widgets[$id] ) )
		return;

		// get the widget instance options
		preg_match( '/(\d+)/', $id, $number );
		$options = get_option( $wp_registered_widgets[$id]['callback'][0]->option_name );
		$instance = $options[$number[0]];
		$class = get_class( $wp_registered_widgets[$id]['callback'][0] );
		if( ! $instance || ! $class )
			return;

			// set this title to something arbitrary so we can remove it later on
			if( $title == false ) {
				$atts['before_title'] = '<div class="wsh-title">';
				$atts['after_title'] = '</div>';
			}

			ob_start();
			the_widget( $class, $instance, $atts );
			$content = ob_get_clean();
			if( $title == false ) $content = preg_replace( '/<div class="wsh-title">(.*?)<\/div>/', '', $content );
			return $content;
}
?>