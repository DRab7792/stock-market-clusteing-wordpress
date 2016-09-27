<?php

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Interactives', 'portfilo' ),
		"singular_name" => __( 'Interactive', 'portfilo' ),
		);

	$args = array(
		"label" => __( 'Interactives', 'portfilo' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "world", "with_front" => true ),
		"query_var" => true,
				
		"supports" => array( "title" ),				
	);
	register_post_type( "world", $args );

// End of cptui_register_my_cpts()
}
