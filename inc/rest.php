<?php 

function add_meta_fields($data, $post, $context){
	$meta = get_post_meta($post->ID);

	$data->data['meta'] = $meta;

	return $data;
}
add_filter('rest_prepare_page', 'add_meta_fields', 10, 3);