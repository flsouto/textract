<?php

use PHPUnit\Framework\TestCase;

require('includes/vendor/autoload.php');

class ParsersTest extends TestCase{


	function testCommentsAreExtracted(){

		$contents = <<<CONTENT
/*
This line and
this other line
must be extracted
*/
function test(){
	return '';
}

/* 
This line should also be extracted
*/
CONTENT;
		
		$result = textract_parse($contents);
		$expected = [
			implode("\n",[
				"This line and",
				"this other line",
				"must be extracted"
			]),
			"This line should also be extracted"
		];

		$this->assertEquals($expected, $result);

	}


}