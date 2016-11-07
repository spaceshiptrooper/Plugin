<?php
function server() {

	// Check to see what URL scheme the current URL uses
	if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {

		$protocol = 'https://'; // The current URL scheme uses https

	} else {

		$protocol = 'http://'; // The current URL scheme uses http

	}

	define('HTTP', $protocol); // Create a constant called HTTP and append the $protocol variable to it.
	define('SERVER_NAME', $_SERVER['SERVER_NAME']); // Create a constant called SERVER_NAME and append $_SERVER['SERVER_NAME'] to it
	define('REQUEST_URI', $_SERVER['REQUEST_URI']); // Create a constant called REQUEST_URI and append $_SERVER['REQUEST_URI'] to it

	define('LINK', HTTP . SERVER_NAME); // Create a constant called LINK and append both HTTP and SERVER_NAME
	define('REMOTE_ADDRESS', $_SERVER['REMOTE_ADDR']); // Create a constant called REMOTE_ADDRESS and append $_SERVER['REMOTE_ADDR'] to it

}