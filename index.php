<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Pattern Primer</title>
<link rel="stylesheet" href="assets/css/style.css">
<style>
body {
	padding: 3rem 5rem;
}
.pattern {
	clear: both;
	overflow: hidden;
}
.pattern .display {
	width: 65%;
	float: left;
}
.pattern .source {
	width: 30%;
	float: right;
}
.pattern .source textarea {
	width: 90%;
	font-family: "Lucida Console", Monaco, monospace;
	font-size: 0.8rem;
}
</style>
</head>

<body>

<?php
include 'config.php';

$files = array();
$handle = opendir('patterns');

while (false !== ($file = readdir($handle)))
{
	if (stristr($file, '.html'))
	{
		$files[] = $file;
	}
}

foreach ($config['file_order'] as $filename)
{
	$file = $filename . '.html';
	echo '<div class="pattern">';
	echo 	'<div class="display">';
				include('patterns/' . $file);
	echo 	'</div>';

	echo 	'<div class="source">';
	echo 		'<textarea rows="6" cols="30">';
	echo 		htmlspecialchars(file_get_contents('patterns/' . $file));
	echo 		'</textarea>';

	echo 		'<p><a href="patterns/' . $file . '">' . $file . '</a></p>';
	echo 	'</div>';

	echo '</div>';
}
?>

</body>
</html>
