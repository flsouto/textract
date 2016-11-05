<?php

require_once('includes/vendor/autoload.php');

if(empty($argv[1])){
	die("Usage: command <PATH>...\n");
}

$paths = array_slice($argv, 1);
$result = [];

foreach($paths as $path){
	if(!file_exists($path)){
		die("File not found: $path\n");
	}
	$contents = file_get_contents($path);
	
	$result = array_merge($result, textract_parse($contents));
}

echo implode("\n\n",$result);