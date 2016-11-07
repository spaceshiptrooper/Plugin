<?php
function bootstrap() {

	global $home; // Call the global variable $home

	// Check to make sure that the $_GET parameter exists
	if(isset($_GET['url'])) {

		$url = rtrim($_GET['url']); // Trim the existing URL so that there are no whitespaces

		// Create an array of executable web languages that people may use to add to the URL and strip those extensions out as we do not need this.
		$array = array('.asp' => '', '.aspx' => '', '.axd' => '', '.asx' => '', '.asmx' => '', '.ashx' => '', '.cfm' => '', '.yaws' => '', '.html' => '', '.htm' => '', '.xhtml' => '', '.jhtml' => '', '.xhtm' => '', '.jhtm' => '', '.jsp' => '', '.jspx' => '', '.wss' => '', '.do' => '', '.action' => '', '.pl' => '', '.php' => '', '.php3' => '', '.php4' => '', '.php5' => '', '.php7' => '', '.phtml' => '', '.phtm' => '', '.py' => '', '.rb' => '', '.rhtml' => '', '.rhtm' => '', '.xml' => '', '.rss' => '', '.svg' => '', '.cgi' => '', '.dll' => '', '.atom' => '');
		$url = strtr($url, $array); // Replace the current URL with the content in the array.

		$url = explode(DS, $url); // Explode the URL so that we have different parts of the URL.

		$url = $url[0]; // We will only use the first parameter of the array.

		// Check to make sure that the file exists
		if(file_exists(ROOT . THEMES . CURRENT_THEME . $url . '.tpl')) {

			// Append the $home variable to the current file
			$home = file_get_contents(ROOT . THEMES . CURRENT_THEME . $url . '.tpl');

		} else {

			// Check to make sure that the 404 file exists
			if(file_exists(ROOT . THEMES . CURRENT_THEME . '404.tpl')) {

				// Append the $home variable to the default 404.tpl file since the file doesn't exist.
				$home = file_get_contents(ROOT . THEMES . CURRENT_THEME . '404.tpl');

			} else {

				// Die a message explaining that the function does not exist in the current specified file.
				die('<!DOCTYPE html>
	<head>
	<title>404 file doesn\'t exist</title>
	</head>

	<body>
	<p>Please make sure that the <strong>404.tpl</strong> file exists within the folder <strong>' . ROOT . THEMES . CURRENT_THEME . '</strong>. If it doesn\'t exist, please create one and place it in <strong>' . ROOT . THEMES . CURRENT_THEME . '</strong>.</p>
	</body>
	</html>');

			}

		}

	} else {

		// Check to make sure that home.tpl exists
		if(file_exists(ROOT . THEMES . CURRENT_THEME . 'home.tpl')) {

			$home = file_get_contents(ROOT . THEMES . CURRENT_THEME . 'home.tpl'); // Get the home file and append the $home varible to it.

		} else {

			// Append the $home variable to the default 404.tpl file since the file doesn't exist.
			$home = file_get_contents(ROOT . THEMES . CURRENT_THEME . '404.tpl');

		}

	}

}