<?php
class pixelovely_testimonial_manual_page{
    public function __construct(){
	    if (is_admin()) {
		    add_action('admin_menu', array($this, 'add_pixelovely_testimonial_plugin_page'));
		}
    }
	
    public function add_pixelovely_testimonial_plugin_page(){
        // This page will be under "Settings"
		add_submenu_page('edit.php?post_type=testimonials', __( 'Testimonial Plugin Manual', 'pixelovely-simple-testimonials' ), __( 'Manual', 'pixelovely-simple-testimonials' ), 'edit_posts', 'pix-testimonial-manual', array($this, 'create_admin_page'));	
    }

    public function create_admin_page(){
        ?>
        <style>
        .pixelovely_manual {font-size: 1.2em; line-height: 1.3em; font-family: cambria, sans-serif;}
        .pixelovely_manual ul {list-style-type: discs; margin-left: 30px;}
        
        .pixelovely_manual .aside, .pixelovely_manual .manualbody {
        background: #f5f5f5;
			background-image: -webkit-gradient(linear,left bottom,left top,from(#f5f5f5),to(#f9f9f9));
			background-image: -webkit-linear-gradient(bottom,#f5f5f5,#f9f9f9);
			background-image: -moz-linear-gradient(bottom,#f5f5f5,#f9f9f9);
			background-image: -o-linear-gradient(bottom,#f5f5f5,#f9f9f9);
			background-image: linear-gradient(to top,#f5f5f5,#f9f9f9);
			border: 1px solid #dfdfdf;
			-webkit-box-shadow: inset 0 1px 0 #fff;
			box-shadow: inset 0 1px 0 #fff;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			box-sizing: border-box;
        }
	    .pixelovely_manual .aside {
			float: right;
			width: 25%;
		}
		.pixelovely_manual .manualbody {float: left; width: 70%;     padding: 0px 15px}
		
		.pixelovely_manual .aside p, .pixelovely_manual .aside ul {padding: 0px 15px;}
		
		.pixelovely_manual .aside ul {list-style-type: disc;}
		.pixelovely_manual h2 {padding-top: 20px;}
		
		.pixelovely_manual p {font-size: 16px;}
		
		.aside img.hello {float: right;padding: 15px;}
		
		@media screen and (max-width: 700px) {
			    .pixelovely_manual .aside,.pixelovely_manual .manualbody {float: none; width: 100%;}
		}
		
		@media screen and (max-width: 500px) {
			   .aside img.hello {float: none;padding: 15px 0px; display: block;}
		}
        </style>
	<div class="wrap pixelovely_manual">
	    <?php screen_icon(); ?>
	    <h2>How to Use This Testimonial Plugin</h2>
	   <div class='manualbody'>
	   <h2><?php _e( 'Getting started', 'pixelovely-simple-testimonials' ); ?></h2> 			
	   	<p><?php _e( 'Create and customize your testimonials as you would a post or a page. Just click "Testimonials" in the left hand admin menu, and then click "Add New".', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'Enter the testimonial into the larger text area. Then in the slot labeled <em>Atrribution</em> place the name, initials, or other more anonymous identifier (such as "happy customer from Atlanta"). You can also leave the attribution blank, if you prefer.', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( "Remember to save, and you've created your first testimonial!", 'pixelovely-simple-testimonials' ); ?></p>
	   	
	   	<h2><?php _e( 'Displaying testimonials', 'pixelovely-simple-testimonials' ); ?></h2>
	   	
	   	<h3><?php _e( 'In sidebars or other widgetized areas', 'pixelovely-simple-testimonials' ); ?></h3>
	   	<p><?php echo sprintf( wp_kses( __( 'If you are using a "<a href="%s">widgetized</a>" theme - that is, one that allows you to drag widgets to a sidebar, footer, or other location - you can display any number of testimonials in the sidebar.', 'pixelovely-simple-testimonials' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( 'http://codex.wordpress.org/Widgetizing_Themes' ) ); ?></p>
	   	<p><?php _e( 'Just find the widget named "Random Testimonial," and drag it to your widget area of choice. By default, this widget will show one testimonial. You may open its panel and select another number from the dropdown.', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'When using a widget, you may also enter a number of characters to limit how much of a testimonial to display. This will prevent extra-long testimonials from breaking your beautiful site design.', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'Want to give people a link to view the rest of a shortened testimonial, or just to see more of the nice things people have said about you? Just paste the URL to your testimonial page into the last slot on the widget, labeled "Add a read more link". A "read more" link will automatically appear at the bottom of the widget.', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'Remember to save!', 'pixelovely-simple-testimonials' ); ?></p>
	   	
	   	<h3><?php _e( 'In the Body of Pages and Posts', 'pixelovely-simple-testimonials' ); ?></h3>
	   	<p><?php _e( 'To add a testimonial anywhere at all, simply place this shortcode into a page or post:', 'pixelovely-simple-testimonials' ); ?> <strong>[testimonial]</strong></p>
	   	<p><?php _e( 'When the page displays, that little tag will be transformed into a beautiful testimonial, randomly chosen from your collection!', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'By default, this tag will display a single random testimonial, but you can choose any number like this:', 'pixelovely-simple-testimonials' ); ?> <strong>[testimonial number=3]</strong> <?php _e( 'Just subtitute your number for my 3 in this example.', 'pixelovely-simple-testimonials' ); ?></p>
	   	
	   	<h3><?php _e( 'Creating a Testimonial Page', 'pixelovely-simple-testimonials' ); ?></h3>
	   	<p><?php _e( 'To create a page where all of your testimonials display at once, simply use the above shortcode, with the number set to 0. This will cause all of your testimonials to display at once. Their order will be random.', 'pixelovely-simple-testimonials' ); ?></p>
	   		   	
	   	<h2><?php _e( 'For Advanced Users: Styling Your Testimonials', 'pixelovely-simple-testimonials' ); ?></h2>
	   	<p><?php _e( 'This plugin deliberately employs extremely minimal default styling, to make it fit in with any theme.', 'pixelovely-simple-testimonials' ); ?></p>
	   	<p><?php _e( 'If you are an advanced user and wish to apply your own CSS styles to the testimonials this plugin outputs, the plugin follows this structure:', 'pixelovely-simple-testimonials' ); ?></p>
	   	   	
	   	   	<ul>
	   	   		<li>&lt;div class='pixelovely_testimonial'&gt;
	   	   			<ul>
	   	   				<li>&lt;p&gt;<?php _e( 'Testimonial', 'pixelovely-simple-testimonials' ); ?>&lt;/p&gt;
	   	   				<li>&lt;span class='pixelovely_testimonial_attribution'&gt;- <?php _e( 'Attribution', 'pixelovely-simple-testimonials' ); ?>&lt;/span&gt;</li>
	   	   			</ul>
	   	   		</li>
	   	   		<li>&lt;/div&gt;</li>
	   	   		<li>&lt;span class='pixelovely_readmore'&gt;&lt;a href='http://www.yourlinkhere.com/'&gt;<?php _e( 'Read more', 'pixelovely-simple-testimonials' ); ?>&lt;/a&gt;&lt;span&gt;</li>
	   	   	</ul>	   	   	
	   	<p><?php _e( 'Apply your CSS to', 'pixelovely-simple-testimonials' ); ?> div.pixelovely_testimonial, span.pixelovely_testimonial_attribution <?php _e( 'and', 'pixelovely-simple-testimonials' ); ?> span.pixelovely_readmore</p>
	   	</div>
	   	
	   	 <div class='aside'>
	    <?php
echo '<img src="' .plugins_url( 'simple-testimonials/images/headshot2.png' , dirname(__FILE__) ). '" class="hello"> ';
?>
		    <p>Hi! I'm Kim, lead programmer and project manager at <a href='http://www.pixelovely.com'>PIXELovely</a>. I created this plugin to make it easy peasy for my clients to manage all the nice things that <em>their</em> customers and clients said about them. They've loved it so much, I've decided to make it available to the world.</p>
		    <p>This plugin is perfect for you if:</p>
		    <ul>
		    	<li>You want to establish credibility on every page, not just a single testimonials page.</li>
		    	<li>You want to manage everything in one place, instead of having to update a separate testimonials page and various text widgets in your sidebars.</li>
		    	<li>You want a testimonial page that is auto-formatted, so everything looks uniform and clean, without you having to futz around with copy-pasting code.</li>
		    </ul>
	    </div>
	</div>
	<?php
    }
	
}

$pixtestmanual_enet = new pixelovely_testimonial_manual_page();