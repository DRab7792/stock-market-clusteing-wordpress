<?php

$fields = array("colors", "font", "paper", "proposal", "bibliography", "paper-pdf", "proposal-pdf");
$ret = array("theme" => array());

foreach ($fields as $cur) {
	$ret['theme'][$cur] = get_field($cur, "options");
}

$ret['data']['clusters'] = get_field('clusters', 'options');

$menu = wp_get_nav_menu_items('main');

if ($menu){
	$ret['nav'] = $menu;
}

echo json_encode($ret);