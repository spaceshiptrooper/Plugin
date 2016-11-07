<?php
function plugin_hook($bootstrap, $name) {

	require_once($bootstrap); // Now we will require the item value and pretend it's a file.

	// Check to see if the function exists or not.
	if(function_exists($name)) {

		$name(); // Call for the file's default function which should always be the name of the file.

	} else {

		// Die a message explaining that the function does not exist in the current specified file.
		die('<!DOCTYPE html>
<head>
<title>Function does not exist</title>
</head>

<body>
<p>There seems to be a problem with the plugin <strong>' . $bootstrap . '</strong>. It doesn\'t have the function <strong>' . $name . '</strong>. Please make sure that the plugin does not have any kind of typos or different name usage.</p>
</body>
</html>');

	}

}