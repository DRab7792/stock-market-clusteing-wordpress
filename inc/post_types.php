<?php

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Visualizations', '' ),
		"singular_name" => __( 'Visualization', '' ),
		);

	$args = array(
		"label" => __( 'Visualizations', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "visual", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),					);
	register_post_type( "visual", $args );

// End of cptui_register_my_cpts()
}
