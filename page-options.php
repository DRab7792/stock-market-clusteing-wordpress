<?php

$fields = array("colors", "font", "paper", "proposal", "bibli");
$meta = array();

foreach ($fields as $cur) {
	$meta[$cur] = get_field($cur, "options");
}


echo json_encode($meta);