<?php 

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	
}

function my_myme_types($mime_types){

    $mime_types['latex'] = 'application/x-latex';

    $mime_types['bibtex'] = 'application/x-bibtex';

    return $mime_types;

}

add_filter('upload_mimes', 'my_myme_types', 1, 1);
