<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://wpeka.com
 * @since      1.0.0
 *
 * @package    WPCTA
 * @subpackage WPCTA/admin/partials
 */


class WP_CTA_Widget extends WP_Widget{

	function __construct(){
		parent::__construct('wp-call-to-action-widget',
				__('WP Call To Action Widget','wp-call-to-action-widget'),
				array('description'=>__('A text widget with an image or icon and a call to action button.','wp-call-to-action-widget'))
				);
	}

	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$subtitle = apply_filters('widget_subtitle', $instance['subtitle']);
		$imageurl = apply_filters('widget_imageurl', $instance['imageurl']);
		$imageplacement = apply_filters('widget_imageplacement', $instance['imageplacement']);
		$description = apply_filters('widget_description', $instance['description']);
		$buttonstyle = apply_filters('widget_buttonstyle', $instance['buttonstyle']);
		$buttontext = apply_filters('widget_buttontext', $instance['buttontext']);
		$buttonurl = apply_filters('widget_buttonurl', $instance['buttonurl']);

		echo $before_widget;

		if( !empty( $title ) ){
			echo "<div class='title'>".$title."</div>";
		}
		if( !empty( $imageurl ) ){
			?>
			<div class="content-div"><div style="float:<?php if( $imageplacement=='left') echo 'left;width:46%;padding:0 11px 0 0'; else if($imageplacement=='right') echo 'right;width:46%;padding:0 11px 0 0'; else echo 'none;margin:0 auto;width:46%;padding:0 11px 0 0;'?>;">
			<img src = "<?php echo $imageurl;?>" height='100%' width='100%'>
			</div>			
			<?php 
		}
		?>
		<div>
		<?php 
		if( !empty( $subtitle ) ){
			echo "<div class='subtitle'>".$subtitle."</div>"; 
		}
		if( !empty( $description ) ){
			echo "<div class='description'>".$description."</div>";
		}
		?>
		</div>		
		</div>		
		<div>
			<a href="<?php echo $buttonurl; ?>"><button class="<?php echo $buttonstyle;?>" style="float:<?php if($imageplacement == 'left') echo 'right'; else if($imageplacement=='left') echo 'right'?>" ><?php echo $buttontext;?></button></a>		
		</div>
		<?php
	}
	
	public function form($instance){
		$wptitle = get_option('title');
		$wpsubtitle = get_option('subtitle');
		$wpimageurl = get_option('imageurl');
		$wpimageplacement = get_option('imageplacement');
		$wpdescription = get_option('description');
		$wpbuttonstyle = get_option('buttonstyle');
		$wpbuttontext = get_option('buttontext');
		$wpbuttonurl = get_option('buttonurl');
		
		?>
		
		<p> 
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $wptitle;?>">
 		</p>
 		<p> 
		<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo $wpsubtitle;?>">
 		</p>
 		<p> 
		<label for="<?php echo $this->get_field_id( 'imageurl' ); ?>"><?php _e( 'Image url:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'imageurl' ); ?>" name="<?php echo $this->get_field_name( 'imageurl' ); ?>" type="text" value="<?php echo $wpimageurl;?>">
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id( 'imageplacement' ); ?>"><?php _e( 'Image placement:' ); ?></label><br>
 			<input type='radio' name="<?php echo $this->get_field_name( 'imageplacement' );?>" value='left' id='left' <?php if($wpimageplacement == 'left') echo 'checked'?>>
 			<label for = 'imageleft'>Left</label>
 			<input type='radio' name="<?php echo $this->get_field_name( 'imageplacement' );?>" value='center' id='center' <?php if($wpimageplacement == 'center') echo 'checked'?>>
 			<label for = 'imagecenter'>Center</label>
 			<input type='radio' name="<?php echo $this->get_field_name( 'imageplacement' );?>" value='right' id='right' <?php if($wpimageplacement == 'right') echo 'checked'?>>
 			<label for = 'imageright'>Right</label>
 		</p>
 		<p>
 		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label> 
		<textarea rows="5" cols="25" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" ><?php echo $wpdescription; ?></textarea>	
 		</p>
 		
 		<p>
 			<p>
 				<label for="<?php echo $this->get_field_id( 'buttonstyle' ); ?>"><?php _e( 'Button Style:' ); ?></label> 
 			</p>
 			<p>
 			<input type='radio' name="<?php echo $this->get_field_name('buttonstyle'); ?>" style="float:left;" value="button-round-dark" <?php if($wpbuttonstyle=='button-round-dark') echo 'checked';?>>
 			<button class='button-round-dark'></button>
 			</p>
 			<p>
 			<input type='radio' name="<?php echo $this->get_field_name('buttonstyle'); ?>" style="float:left;" value="button-round-light" <?php if($wpbuttonstyle=='button-round-light') echo 'checked';?>>
 			<button class='button-round-light'></button>
 			</p>
 			<p>
 			<input type='radio' name="<?php echo $this->get_field_name('buttonstyle'); ?>" style="float:left;" value="button-rect-dark" <?php if($wpbuttonstyle=='button-rect-dark') echo 'checked';?>>
 			<button class='button-rect-dark'></button>
 			</p>
 			<p>
 			<input type='radio' name="<?php echo $this->get_field_name('buttonstyle'); ?>" style="float:left;" value="button-rect-light" <?php if($wpbuttonstyle=='button-rect-light') echo 'checked';?>>
 			<button class='button-rect-light'></button>
 			</p>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('buttontext')?>"><?php _e('Button text:')?></label><span class="required"></span>
 			<input type='text' class="widefat button-text" name="<?php echo $this->get_field_name('buttontext')?>" id="<?php echo $this->get_field_id('buttontext')?>" value="<?php echo $wpbuttontext?>">
 			<label class='buttontext_required error' style='display:none;'><?php _e('This Field is required.')?></label>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('buttonurl')?>" ><?php _e('Button url:')?></label>
 			<input type='text' class="widefat" name="<?php echo $this->get_field_name('buttonurl')?>" id="<?php echo $this->get_field_id('buttonurl')?>" value="<?php echo $wpbuttonurl?>" >
 		</p>
		<?php
	}
	
	public function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] =  strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['imageurl']  = strip_tags($new_instance['imageurl']);
		if (isset ($new_instance['imageplacement']))
			$instance['imageplacement'] = $new_instance['imageplacement'];
		else 
			$instance['imageplacement'] = "";
		$instance['description'] = strip_tags($new_instance['description']);
		$instance['buttonstyle'] = $new_instance['buttonstyle'];
		$instance['buttontext'] = strip_tags($new_instance['buttontext']);
		$instance['buttonurl'] = strip_tags($new_instance['buttonurl']);
		
		update_option('title', $instance['title']);
		update_option('subtitle', $instance['subtitle']);
		update_option('imageurl', $instance['imageurl']);
		update_option('imageplacement', $instance['imageplacement']);
		update_option('description', $instance['description']);
		update_option('buttonstyle',$instance['buttonstyle']);
		update_option('buttontext',$instance['buttontext']);
		update_option('buttonurl', $instance['buttonurl']);
		return $instance;
	}
	
	
	
}

//function to display shortcode in the widget form
function WP_CTA_Widget_shortcode_form( $widget) {
	if($widget->id_base=='wp-call-to-action-widget')
		echo '<p>' . __( 'Shortcode' ) . ': ' . ( ( $widget->number == '__i__' ) ? __( 'Please save this first.' ) : '<code>[WP_CTA_Widget id="'. $widget->id .'"]</code>' ) . '</p>';
}

?>