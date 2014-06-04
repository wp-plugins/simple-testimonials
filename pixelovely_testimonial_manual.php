<?php
class pixelovely_testimonial_manual_page{
    public function __construct(){
	    if (is_admin()) {
		    add_action('admin_menu', array($this, 'add_pixelovely_testimonial_plugin_page'));
		}
    }
	
    public function add_pixelovely_testimonial_plugin_page(){
        // This page will be under "Settings"
		add_submenu_page('edit.php?post_type=testimonials', 'Testimonial Plugin Manual', 'Manual', 'edit_posts', 'pix-testimonial-manual', array($this, 'create_admin_page'));
		
    }

    public function create_admin_page(){
        ?>
        <style>
        .pixelovely_manual {font-size: 1.2em; line-height: 1.3em; font-family: cambria, sans-serif;}
        .pixelovely_manual ul {list-style-type: discs; margin-left: 30px;}
	    .pixelovely_manual .aside {
			float: right;
			width: 280px;
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
		}
		.pixelovely_manual .manualbody {margin-right: 300px;}
		
		.pixelovely_manual .aside p, .pixelovely_manual .aside ul {padding: 0px 15px;}
		
		.pixelovely_manual .aside ul {list-style-type: disc;}
		.pixelovely_manual h2 {padding-top: 20px;}
		
		.pixelovely_manual p {font-size: 16px;}
		
		.aside img.hello {float: right;padding: 15px;}
        </style>
	<div class="wrap pixelovely_manual">
	    <?php screen_icon(); ?>
	    <h2>How to Use This Testimonial Plugin</h2>
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
	   <div class='manualbody'>
	   <h2>Getting started</h2> 			
	   	<p>Create and customize your testimonials as you would a post or a page. Just click <em>Testimonials</em> in the left hand admin menu, and then click <em>Add New</em>.</p>
	   	<p>Enter the testimonial into the larger text area. Then in the slot labeled <em>Atrribution</em> place the name, initials, or other more anonymous identifier (such as "happy customer from Atlanta"). You can also leave the attribution blank, if you prefer.</p>
	   	<p>Remember to save, and you've created your first testimonial!</p>
	   	
	   	<h2>Displaying Testimonials</h2>
	   	
	   	<h3>In Sidebars or Other Widgetized Areas</h3>
	   	<p>If you are using a "<a href='http://codex.wordpress.org/Widgetizing_Themes'>widgetized</a>" theme - that is, one that allows you to drag widgets to a sidebar, footer, or other location - you can display any number of testimonials in the sidebar.</p>
	   	<p>Just find the widget named "Random Testimonial," and drag it to your widget area of choice. By default, this widget will show one testimonial. You may open its panel and select another number from the dropdown.</p>
	   	<p>When using a widget, you may also enter a number of characters to limit how much of a testimonial to display. This will prevent extra-long testimonials from breaking your beautiful site design.</p>
	   	<p>Want to give people a link to view the rest of a shortened testimonial, or just to see more of the nice things people have said about you? Just paste the URL to your testimonial page into the last slot on the widget, labeled "Add a read more link". A "read more" link will automatically appear at the bottom of the widget.</p>
	   	<p>Remember to save!</p>
	   	
	   	<h3>In the Body of Pages and Posts</h3>
	   	<p>To add a testimonial anywhere at all, simply place this shortcode into a page or post: <strong>[testimonial]</strong></p>
	   	<p>When the page displays, that little tag will be transformed into a beautiful testimonial!</p>
	   	<p>By default, this tag will display a single random testimonial, but you can choose any number like this: <strong>[testimonial number=3]</strong> Just subtitute your number for my 3 in this example.</p>
	   	
	   	<h3>Creating a Testimonial Page</h3>
	   	<p>To create a page where all of your testimonials display at once, simply use the above shortcode, with the number set to 0. This will cause all of your testimonials to display at once.</p>
	   		   	
	   	<h2>For Advanced Users: Styling Your Testimonials</h2>
	   	<p>This plugin deliberately employs extremely minimal default styling, to make it fit in with any theme.</p>
	   	<p>If you are an advanced user and wish to apply your own CSS styles to the testimonials this plugin outputs, the plugin follows this structure:</p>
	   	   	
	   	   	<ul>
	   	   		<li>&lt;div class='pixelovely_testimonial'&gt;
	   	   			<ul>
	   	   				<li>&lt;p&gt;Testimonial&lt;/p&gt;
	   	   				<li>&lt;span class='pixelovely_testimonial_attribution'&gt;- Attribution&lt;/span&gt;</li>
	   	   			</ul>
	   	   		</li>
	   	   		<li>&lt;/div&gt;</li>
	   	   		<li>&lt;span class='pixelovely_readmore'&gt;&lt;a href='http://www.yourlinkhere.com/'&gt;Read more&lt;/a&gt;&lt;span&gt;</li>
	   	   	</ul>	   	   	
	   	<p>Apply your CSS to div.pixelovely_testimonial, span.pixelovely_testimonial_attribution and span.pixelovely_readmore</p>
	   	</div>
	</div>
	<?php
    }
	
}

$pixtestmanual_enet = new pixelovely_testimonial_manual_page();