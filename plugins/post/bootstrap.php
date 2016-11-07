<?php
function post() {

	global $home; // Call the global variable $home

	// Check to make sure that the $_GET parameter exists
	if(isset($_GET['url'])) {

		$url = rtrim($_GET['url']); // Trim the existing URL so that there are no whitespaces

		// Create an array of executable web languages that people may use to add to the URL and strip those extensions out as we do not need this.
		$array = array('.asp' => '', '.aspx' => '', '.axd' => '', '.asx' => '', '.asmx' => '', '.ashx' => '', '.cfm' => '', '.yaws' => '', '.html' => '', '.htm' => '', '.xhtml' => '', '.jhtml' => '', '.xhtm' => '', '.jhtm' => '', '.jsp' => '', '.jspx' => '', '.wss' => '', '.do' => '', '.action' => '', '.pl' => '', '.php' => '', '.php3' => '', '.php4' => '', '.php5' => '', '.php7' => '', '.phtml' => '', '.phtm' => '', '.py' => '', '.rb' => '', '.rhtml' => '', '.rhtm' => '', '.xml' => '', '.rss' => '', '.svg' => '', '.cgi' => '', '.dll' => '', '.atom' => '');
		$url = strtr($url, $array); // Replace the current URL with the content in the array.

		$url = explode(DS, $url); // Explode the URL so that we have different parts of the URL.

		$replace_array = array(
			'{url}' => $url[0], // We will only use the first parameter of the array.
		);

		$home = strtr($home, $replace_array); // Replace the placeholders using strtr

		// Check to see if the form was submitted
		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Loop the result in a foreach
			foreach($_POST as $post) {

				// Check to make sure that all post values are not empty
				if(!isset($post)) {

					print('Empty field'); // The field is empty
					print('<br /><br />');
					break;

				} elseif($post == '') {

					print('Empty field'); // The field is empty
					print('<br /><br />');
					break;

				} else {

					print('<pre>');
					print_r($_POST);
					print('</pre>');
					print('<br />');
					break;

				}

			}

		} else {

			return $home; // Return the current $home variable since the form was not submitted.

		}

	}

}