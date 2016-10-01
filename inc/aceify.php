<?php

//remove admin areas
function remove_menus(){
	if(!current_user_can( 'manage_options' )){
		// remove_menu_page( 'index.php' ); //Hide Dashboard
		remove_menu_page( 'edit.php' ); //Hide Posts
		remove_menu_page( 'edit.php?post_type=world' );
	//	remove_menu_page( 'link-manager.php' ); //Hide Link Manager
		// remove_menu_page( 'upload.php' ); //Hide Media
		// remove_menu_page( 'edit.php?post_type=page' ); //Hide Pages
		remove_menu_page( 'edit-comments.php' ); //Hide Comments
		remove_menu_page( 'themes.php' ); //Hide Appearance
		remove_menu_page( 'plugins.php' ); //Hide Plugins
		remove_menu_page( 'users.php' ); //Hide Users
		remove_menu_page( 'tools.php' ); //Hide Tools
	//	remove_menu_page( 'options-general.php' ); //Hide Settings
	}
}
add_action( 'admin_menu', 'remove_menus' );

register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'twentysixteen' )
) );

//remove unwanted wordpress <head> tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link'); //Edit URI Link (xmlrpc)

//remove emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//disable admin bar on front end
add_filter('show_admin_bar', '__return_false');

add_filter('gform_init_scripts_footer', 'init_scripts');
function init_scripts() {
    return true;
}



function add_favicon() {
  	$favicon_url = get_template_directory_uri()  . '/favicon.ico?v=1';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/img/icon.png') no-repeat right scroll transparent;
		height: 40px;
		width: 100%;
		text-indent: 0px;
		background-size: auto 100%;
		padding: 0px;
		box-sizing: border-box;
		font-size: 40px;
		line-height: 44px;
		font-weight: bold;
		overflow: visible;
		color: #fff;
		text-align: left;
		letter-spacing: -1px;
	}
	// body.login #login h1:first-child{
	// 	display: none;
	// }
	body.login #login h1, .login #backtoblog a, .login #nav a{
		color: #fff;
	}
	.gold{
		color: #ffd700;
	}
	.half-field{
		display: inline-block;
		width: 50%;
		box-sizing: border-box;
	}
	body{
		background-color: #2F2933;
	}
	</style>
	";
}

// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
function add_css(){
	echo "
		<style>
		.half-field{
			display: inline-block;
			float: left;
			width: 50%;
			box-sizing: border-box;
		}
		input:disabled{
			font-family: 'Lucida Grande';
			border: none;
			font-size: 11px;
		}
		</style>
	";


}

add_action('admin_head', 'add_favicon');
add_action('admin_head', 'add_css');
