<?php
/**
* Plugin Name: Whatsapp Share
* Plugin URI: http://webgensis.com/
* Description: Share Page, Post on Whatsapp.
* Version: 1.0 
* Author: webgensis
* Author URI: http://webgensis.com/
*/

  //plugin is activated
  //including function File.
  include_once( 'share/share.php' );
  
// Including JS and CSS for frontend.  
function themeslug_enqueue_script_style() {
	wp_enqueue_script( 'my-js',  plugin_dir_url( __FILE__ ) .'share/js/whatsapp-button.js', false );
	wp_enqueue_style( 'styles-watsaap',  plugin_dir_url( __FILE__ ) .'share/css/styles.css', false );
	
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script_style' );



// Including CSS for Backend.
function load_custom_wp_admin_style() {
       wp_enqueue_style( 'styles-watsaap',  plugin_dir_url( __FILE__ ) .'share/css/admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
global $title;
global $post;
$title = get_the_title();






// Including Shortcode 
function hook_watsaap(){
	$title = get_the_title();

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
	?>
	<a href="whatsapp://send" data-text="<?php echo $title; ?>" data-href="" class="wa_btn <?php echo get_option('iconoption');?>" style="display:none">Share</a>
	<?php
	}
	 add_shortcode( 'whatsappshare' , 'hook_watsaap' );
	 
	 
	 

global $post_type, $test;

// Checking enable on post type
if (get_option('post') == 'post'){ $post_enable = '1'; }else{ $post_enable = '0';}
if (get_option('page') == 'page'){ $page_enable = '1'; }else{ $page_enable = '0';}
if (get_option('excerpt') == 'excerpt'){ $excerpt_enable = '1';}else{ $excerpt_enable = '0';}



//** Including icon After Post title. **//

// Function for After post title.
function before_content_filter_post($content) {
	$title = get_the_title();
	
	 $post_type = get_post_type( get_the_ID() );

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
  $html .= $content;
 if($post_type == 'post'){
	   return $html;
 }
 else{
	 return $content;
	 }
}
// Function for After page title.
function before_content_filter_page($content) {
	$title = get_the_title();
	
	 $post_type = get_post_type( get_the_ID() );

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
  $html .= $content;
 if($post_type == 'page'){
	   return $html;
 }
 else{
	 return $content;
	 }
}
// Function for After excerpt title.
function before_content_filter($content) {
	$title = get_the_title();
	
	 $post_type = get_post_type( get_the_ID() );

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
  $html .= $content;
 
	   return $html;
 
}
// Applying filters for After title.
if (get_option('titleposition') == 'aftertitle'){
		if($post_enable == '1'){					
	
	add_filter( 'the_content', 'before_content_filter_post' );
	
		}
		if($page_enable == '1'){					
	
	add_filter( 'the_content', 'before_content_filter_page' );
		}
	if($excerpt_enable == '1'){
	add_filter( 'the_excerpt', 'before_content_filter' );
							}
	
}



//** Including After Post/Page Content. **//

// Function for After post content.
function after_content_filter_post($content) {
	$title = get_the_title();
	$post_type = get_post_type( get_the_ID() );

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 
   $html .= $content;
  $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
 
 if($post_type == 'post'){
	   return $html;
 }
 else{
	 return $content;
	 }
}

// Function for After page content.
function after_content_filter_page($content) {
	$title = get_the_title();
	$post_type = get_post_type( get_the_ID() );

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 
   $html .= $content;
  $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
 
 if($post_type == 'page'){
	   return $html;
 }
 else{
	 return $content;
	 }
}
// Function for After excerpt content.
function after_content_filter($content) {
	$title = get_the_title();

if (get_option('titleoption') == 'customtitle'){
	$title = get_option('customtitleshare');
	}
 
   $html .= $content;
  $html .= '<a href="whatsapp://send" data-text="'.$title.'" data-href="" class="wa_btn '.get_option('iconoption').'" style="display:none">Share</a>';
 
  return $html;
}

// Applying filters for After content.
if (get_option('titleposition') == 'aftercontent'){
		if($post_enable == '1'){
		add_filter( 'the_content', 'after_content_filter_post' );
								}
		if($page_enable == '1'){
		add_filter( 'the_content', 'after_content_filter_page' );
								}
		if($excerpt_enable == '1'){
			add_filter( 'the_excerpt', 'after_content_filter' );
								}
}


