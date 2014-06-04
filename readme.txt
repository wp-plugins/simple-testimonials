=== Plugin Name ===
Contributors: PIXELovely
Donate link: http://pixelovely.com/donate
Tags: testimonials, random testimonials, random quote, random testimonial
Requires at least: 3.0.1
Tested up to: 3.9.1
Stable tag: 4.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily manage testimonials and display them anywhere on your blog in seconds, via widgets and shortcodes. Instructions are baked right in!

== Description ==

I created this plugin to make it easy peasy for my clients to manage all the nice things that _their_ customers and clients said about them. They've loved it so much, I've decided to make it available to the world.

When you install it, you will gain a new section in your wordpress admin where you can easily create and manage all your testimonials. It's extremely similar to creating a new post or page. Just go to the testimonial section, click "Add new", and follow the on-screen prompts. That's it. When you're done, you can get a random testimonial to display each time a page loads with the handy included widget, or the shortcode [testimonial]. Phew, easy peasy!

This plugin is perfect for you if:

*	You want to establish credibility on every page, not just a single testimonials page.
*	You want to manage everything in one place, instead of having to update a separate testimonials page and various text widgets in your sidebars.
*	You want a testimonial page that is auto-formatted, so everything looks uniform and clean, without you having to futz around with copy-pasting code.

== Installation ==

1. Download the zip file, and unzip it.
1. Upload the entire folder (PIXELovely-testimonials) to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

Now, to start using it, just:

1. Add some testimonials in the new testimonial section.
1. To display the testimonials in a sidebar or other widgetized location, simply drag the widget named "Random Testimonial" to your widget area. You may open the widget panel and choose a number of testimonials to display.
1. To display the testimonials in a post or page, type the shortcode **[testimonial]** into any post or page that you like. You can display more than one testimonial at a time by specifying a number, like this: **[testimonial number=3]** Just substitute your number for my 3.
1. To create a testimonials page, where all your testimonials are shown at once, use the shortcode above, but set the number to 0. When you use 0, no limit will be used, and all of your testimonials will be shown at once.
1. If you forgot how to use the testimonial plugin at any time, I've placed a 1 page user manual directly into the testimonial section of your admin area. You're welcome! :)

== Changelog ==

= 0.0.6 =
* Changing interface from meta inputs to be their own inputs. This prevents the meta info from plugins from appearing above the main post-type inputs, such as SEO plugins.
* Updating admin icon to utilize new icon-fonts

= 0.0.5 =
* Minor fix to div structures when an attribution is not supplied.

= 0.0.4 =
* Added an optional character limit to testimonials outputted with a widget
* Added an optional "read more" link to the testimonial widget
* Made some changes to try to prevent SEO plugins from appearing on the testimonial composition page, as testimonials are not themselves intended to be stand-alone pages.
* Fixed broken image in the manual
* Updated manual to reflect new options
* Gave the testimonials section a custom icon in the admin backend

= 0.0.3 =
* Fixed an error in the shortcodes that could cause testimonials to appear in unexpected places in layouts with lots of floats.

= 0.0.2 =
* Excluded individual testimonials from search results, as they are not intended to be stand-alone pages.

= 0.0.1 =
* Plugin first released! I would very much appreciate it if you remembered to rate the plugin after trying it.