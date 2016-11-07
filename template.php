<?php
function template() {

	global $home; // Call the global variable $home

	// Replace the {title}, {hook}, and {author} placeholder
	$array = array(
		'{title}' => TITLE,
		'{hook}' => '',
		'{author}' => '<a href="https://sitepoint.com/community/users/spaceshiptrooper" onmousedown="return false;" target="_new">@spaceshiptrooper</a>',
	);

	$home = strtr($home, $array);  // Replace the placeholders using strtr

	print($home); // Print/ display the home contents

}