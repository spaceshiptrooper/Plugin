<?php
define('DS', '/'); // Define the Directory Separator
define('ROOT', realpath(__DIR__) . DS); // Define the root folder and append DS after it
define('THEMES', 'themes' . DS); // Define the themes folder and append DS after it
define('CURRENT_THEME', 'default' . DS); // Define the current themes folder and append DS after it
define('PLUGINS', 'plugins' . DS); // Define the plugins folder and append DS after it
define('TITLE', 'Project'); // Define the title

global $home; // Call the global variable $home

require_once(ROOT . 'server.php'); // Require the HTTP server file
server(); // Call the server() function

require_once(ROOT . 'bootstrap.php'); // Require the current bootstrap file
bootstrap(); // Call the bootstrap() function

require_once(ROOT . 'hook.php'); // Require the hook file

// Search through all the folders within the plugin folder for the bootstrap files.
$bootstraps = glob(ROOT . PLUGINS . '*' . DS . 'bootstrap.php');

// Since glob is an array, you'll need foreach for this.
// So throw it in a foreach loop and append an item value to it.
foreach($bootstraps as $bootstrap) {

	// Check to see if the file exists first. If it doesn't, we are not going to require/ include it.
	if(file_exists($bootstrap)) {

		// Explode the bootstrap file by the directory separator.
		$explode = explode(DS, $bootstrap);

		// Go to the end of the array.
		$end = end($explode);

		// Go back one from the end of the array.
		// This should go from /bootstrap.php to /{function_name}.
		$name = prev($explode);

		// This method is a lot easier to implement than the older one
		// since there is no need for any manual character stripping.

		// The plugin_hook function works as is.
		// {full_path_to_file}, {function+filename}
		plugin_hook($bootstrap, $name);

	}

}

require_once(ROOT . 'template.php'); // Require the template file. This file is needed to actually display the layout.
template(); // Call the template function.
