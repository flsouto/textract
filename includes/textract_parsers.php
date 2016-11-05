<?php


function textract_parse($contents){

	$lines = preg_split("/\r\n|\n/",$contents);
	$parsing_comment = false;
	$comment_lines = [];
	$result = [];

	foreach($lines as $line){

		$line_trimmed = trim($line);

		if(!$parsing_comment){
			if(substr($line_trimmed,0,2)=='/*'){
				$parsing_comment = true;
			}
		} else {
			if(substr($line_trimmed,0,2)=='*/'){
				$parsing_comment = false;
				$result[] = implode("\n",$comment_lines);
				$comment_lines = [];
			} else {
				$comment_lines[] = $line;
			}
		}

	}

	return $result;

}