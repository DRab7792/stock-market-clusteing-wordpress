<?php 

function add_meta_fields($data, $post, $context){
	$meta = get_post_meta($post->ID);

	$adjMeta = new stdClass();
	$adjMeta->misc = new stdClass();
	foreach ($meta as $key => $val) {
		if ($key[0] != "_"){
			//Flatten array to object if there is only one object in it
			$adjVal = (is_array($val) && count($val) === 1) ? $val[0] : $val;

			//Split meta into sections
			if (stristr($key, "_") !== FALSE){
				$pair = explode("_", $key);
				if (count($pair) > 2){
					print_r($pair);
				}
				if (!isset($adjMeta->{$pair[0]})){
					$adjMeta->{$pair[0]} = new stdClass();
				}
				$adjMeta->{$pair[0]}->{$pair[1]} = $adjVal;
			}else{
				$adjMeta->misc->{$key} = $adjVal;
			}
		}
	}

	$data->data['meta'] = $adjMeta;

	return $data;
}
add_filter('rest_prepare_page', 'add_meta_fields', 10, 3);