<?php
require_once(dirname(__FILE__) . '/../../../../simpletest/autorun.php');
require_once(dirname(__FILE__) . '/photo_test.php');
require_once(dirname(__FILE__) . '/modulemanegment_test.php');

class AllTests extends TestSuite {
	function __construct() {
		parent::__construct();
	}
}
?>