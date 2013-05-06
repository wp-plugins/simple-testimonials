<?php
/*
	Plugin Name: Simple Testimonials
	Plugin URI: http://www.pixelovely.com/resources/simple-testimonials-wordpress-plugin/
	Description: Easily manage testimonials and display them anywhere on your blog in seconds, via widgets and shortcodes. Instructions are baked right in -- couldn't be simpler!
	Author: PIXELovely
	Version: 0.0.1
	Author URI: http://www.PIXELovely.com/
 */

/*  Copyright 2013  Kimberly Genly (email : kim@pixelovely.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

	You may find a copy of the GNU General Public License at http://www.gnu.org/licenses/gpl.html
*/
 

//Include the help files
include_once("pixelovely_testimonial_manual.php");

add_action( 'wp_enqueue_scripts', 'pixelovely_testimonial_stylesheet' );

function pixelovely_testimonial_stylesheet() {
    wp_register_style( 'testimonial-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'testimonial-style' );
}
	
function pixelovely_testimonials_create_post_type() {
	register_post_type( 'testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' ),
				'all_items' => __( 'All Testimonials' )
			),
		'public' => true,
		'has_archive' => false,
		'register_meta_box_cb' => 'add_testimonial_pages_metaboxes',
		'supports' => array('')
		)
	);
}
add_action( 'init', 'pixelovely_testimonials_create_post_type' );

function add_testimonial_pages_metaboxes() {
	add_meta_box('pixelovely_testimonialSettings', 'Testimonial', 'pixelovely_testimonial_settings', 'testimonials', 'normal', 'high');
}

$optionsForPIXELovelyTestimonials = array(
		array(
			'name' => 'Testimonial',
			'type' => 'textarea',
			'optionname' => 'quote'
		),
		array(
		 	'name' => 'Attribution',
		 	'type' => 'text',
		 	'optionname' => 'post_title',
			'description' => 'A name, initials, title, nickname or other handle to identify who is being quoted.')
);

function pixelovely_testimonial_settings() {
	global $optionsForPIXELovelyTestimonials;
	printPIXELovelyTestimonialPostMeta($optionsForPIXELovelyTestimonials);
	echo "<div style='clear: left'></div>";
}

function pixelovely_save_testimonial_page_meta($post_id, $post) {
	global $optionsForPIXELovelyTestimonials;
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}
	
	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
	return $post->ID;
	
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	
	foreach ($optionsForPIXELovelyTestimonials as $option) {
		$optionName = "_".$option['optionname'];
		switch ($option['type']) {
		   case "text":
		   		if ($option['optionname'] == 'post_title') {
					$optionName = $option['optionname'];   			
		   		}
				$input[$optionName] = wp_filter_post_kses( $_POST[$optionName] );
				break;
			case "textarea":
				$input[$optionName] = wp_filter_post_kses( $_POST[$optionName] );
			break;
			case "checkbox":
				$input[$optionName] = $_POST[$optionName];
				if ($input[$optionName] != 1) {
					$input[$optionName] = 0;
				}
			break;
		}
	}
	// Add values of $events_meta as custom fields
	
	foreach ($input as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}
add_action('save_post', 'pixelovely_save_testimonial_page_meta', 1, 2); // save the custom fields

function printPIXELovelyTestimonialPostMeta($optionsForPIXELovelyTestimonials) {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
			wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
			echo "<table>";
			foreach ($optionsForPIXELovelyTestimonials as $option) {
				echo "<tr>";
				if ($option['type'] == "header") {
					echo "<td colspan='2' style='border-bottom: 1px solid #000;'><h1 style='margin-top: 25px;'>".$option['name']."</h1></td>";
				}elseif ($option['type'] == "subheader") {
					echo "<td colspan='2'><h2 style='font-size: 1.5em; color:#21759B;'>".$option['name']."</h2></td>";
				} else {
					echo "<td style='width: 125px; text-align: right; font-weight: bold; padding-right: 15px;'>".$option['name']."</td>";
					echo "<td>";

					//Get the current value of this setting
					$optionname = '_'.$option['optionname'];
					$currentValue = get_post_meta($post->ID, $optionname, true);					
					
					switch ($option['type']) {
					    case "text":
					    	if ($option['optionname'] == 'post_title') {
					    		$currentValue = get_post_meta($post->ID, $option['optionname'], true);
					    		echo "<input type='text' name='".$option['optionname']."' style='width: 500px;' value='".htmlspecialchars($currentValue)."'>";
					    	} else {
					       		echo "<input type='text' name='_".$option['optionname']."' style='width: 500px;' value='".htmlspecialchars($currentValue)."'>";
					    	}
					        break;
					    case "textarea":
					        echo "<textarea name='_".$option['optionname']."' style='width: 500px; height: 200px'>".htmlspecialchars($currentValue)."</textarea>";
					        break;
					    case "checkbox":
					        echo "<input type='checkbox' value='1' name='_".$option['optionname']."'";
					        
					        if ($currentValue == 1) {
					        	echo " checked";
					        }
					        echo ">";
					        break;
					}
				
					if (isset($option['description']) && $option['description'] != "") {
						echo "<p style='clear: both; font-size: .9em; font-style: italic;'>".$option['description']."</p>";
					}
					echo "</td>";
				}
				
				
				echo "</tr>";
			}
			?>	
			
			
			</table>
<?php }

function displayRandomPIXELovelyTestimonials($numberOfQuotes = 1, $limit = "0") {
	if ($numberOfQuotes == 0) {
		$numberOfQuotes = -1;
	}
	$args = array( 'numberposts' => $numberOfQuotes, 'orderby' => 'rand', 'post_type' =>'testimonials');
	$rand_posts = get_posts( $args );
	
	foreach ($rand_posts as $post ) {
		setup_postdata($post);
		echo "<div class='pixelovely_testimonial'><p>".nl2br(get_post_meta($post->ID, '_quote', true))."</p>";
		$attribution = trim(get_post_meta($post->ID, 'post_title', true));
		if (!empty($attribution)) {
			echo "<span class='pixelovely_testimonial_attribution'>- $attribution</span></div>";
		}
	}
}


class PIXELovely_Testimonials_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
				'pix_testimonials_widget', // Base ID
				'Testimonial', // Name
				array( 'description' => __( 'Display one or more random testimonials', 'text_domain' ), ) // Args
		);
	}

	public function form( $instance ) {
		// outputs the options form on admin
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		}
		if ( isset( $instance[ 'num_display' ] ) ) {
			$num_display = $instance[ 'num_display' ];
		}
		else {
			$num_display = __( '', 'text_domain' );
		}
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num_display' ); ?>"><?php _e( 'Number to display:' ); ?></label>
			<select id="<?php echo $this->get_field_id('num_display'); ?>" name="<?php echo $this->get_field_name('num_display'); ?>" class="widefat" style="width:100%;">
    		<?php
    			$i = 0;
    			while ($i < 10) { ?>
       	 		<option <?php selected( $i, $num_display ); if (!determineIfValidNumberOfPIXELovelyTestimonials($num_display) && $i ==1) {echo "selected";} ?> value="<?php echo $i; ?>"><?php if ($i == 0) {echo "All";} else {echo $i;}; ?></option>
       	 		
    		<?php 
    			$i++;
    			} ?>      
			</select>
		</p>
		
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_display'] = strip_tags( $new_instance['num_display'] );
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$num_display = apply_filters( 'widget_title', $instance['num_display'] );

		if (!determineIfValidNumberOfPIXELovelyTestimonials($num_display)) {
			$num_display = 1;
		}
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
			
			
			//Output all special widget stuff here
			displayRandomPIXELovelyTestimonials($num_display);
			
			
			echo $after_widget;
			
		}
}

function custom_testi_register() {
	register_widget( 'PIXELovely_Testimonials_Widget' );

}

function create_pixelovely_testimonial_shortcode($atts){
	extract( shortcode_atts( array(
		'number' => '1'
	), $atts ) );
	
	if (!determineIfValidNumberOfPIXELovelyTestimonials($number)) {
		$number = 1;
	}
	displayRandomPIXELovelyTestimonials($number);
}

function determineIfValidNumberOfPIXELovelyTestimonials($number) {
	
	if (trim($number) === "" || !is_numeric($number) || $number < 0) {
		return false;
	}
	return true;
}


add_action( 'widgets_init', 'custom_testi_register' );
add_shortcode('testimonial','create_pixelovely_testimonial_shortcode');

?>