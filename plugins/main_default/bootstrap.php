<?php
function main_default() {

	global $home; // Call the global variable $home

	// Create an array with the HTML replacement for the placeholders
	$array = array(
		'{css}' => '<style type="text/css">
body {
	background-color: #CACAD9;
}

button {
	margin-left: -1px;
}

input[type=text], button {
	padding-left: 20px;
	padding-right: 20px;
	box-sizing: border-box;
	height: 50px;
}

input[type=text]:focus {
	border: 2px solid #0078D7;
}

a {
	color: #4292BC;
}

a:hover {
	color: #0080FF;
}

ul {

}

li {
	list-style-type: square;
}
</style>',
		'{styles}' => '<!-- style sheets -->',
		'{js}' => '<!-- Text Javascripts -->',
		'{javascript}' => '<!-- Javascript -->',
		'{link}' => LINK,
	);

	$home = strtr($home, $array); // Replace the placeholders using strtr
	return $home;

}