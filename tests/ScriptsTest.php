<?php

use PHPUnit\Framework\TestCase;

require_once('includes/vendor/autoload.php');

class ScriptsTest extends TestCase{

	function testProcess(){

		$argv = [
			__FILE__,
			__DIR__.'/resources/source1.php',
			__DIR__.'/resources/source2.php'
		];

		ob_start();
		require(__DIR__.'/../process.php');
		$result = ob_get_clean();

		$this->assertEquals(
			file_get_contents(__DIR__.'/resources/output1'),
			$result
		);

	}

}