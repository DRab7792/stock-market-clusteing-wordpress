<?php
/**
   Portfilo theme functions and definitions
 * @package Portfilo
 * @author August Infotech
 */


define('PORTFILO_THEME_DIR', get_template_directory());
define('PORTFILO_THEME_URI', get_template_directory_uri());
define('PORTFILO_SITE_URL', site_url());

define('PORTFILO_LIBS_DIR', PORTFILO_THEME_DIR. '/inc');


require_once( PORTFILO_THEME_DIR. '/inc/aceify.php' );

require_once( PORTFILO_THEME_DIR. '/inc/post_types.php' );

require_once( PORTFILO_THEME_DIR. '/inc/fields.php' );
