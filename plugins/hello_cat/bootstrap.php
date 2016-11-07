<?php
function hello_cat() {

	global $home; // Call the global variable $home

	// Create an array with the HTML replacement for the placeholders
	$array = array(
		'Hello Cat' => 'Hello user from the IP Address: <strong>' . REMOTE_ADDRESS . '</strong>'
	);

	$home = strtr($home, $array);  // Replace the placeholders using strtr
	return $home;

}