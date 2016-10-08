<?php 

function add_meta_fields($data, $post, $context){
	$meta = get_post_meta($post->ID);

	$adjMeta = new stdClass();
	foreach ($meta as $key => $val) {
		if ($key[0] != "_"){
			$adjMeta->{$key} = $val;
		}
	}

	$data->data['meta'] = $adjMeta;

	return $data;
}
add_filter('rest_prepare_page', 'add_meta_fields', 10, 3);