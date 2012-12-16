<?php

//require_once dirname(__FILE__) .'/../../../lib/base.php';
//require_once(dirname(__FILE__) . '/photo_test.php');
//require_once(dirname(__FILE__) . '/modulemanegment_test.php');
require_once(dirname(__FILE__) . '/../../../../simpletest/autorun.php');
OC_App::loadApp('facefinder');
class AllTests extends TestSuite {
	 function AllTests() {
	 	$this->TestSuite('All tests');
		$this->addFile(dirname(__FILE__)  . '/photo_test.php');
		$this->addFile(dirname(__FILE__) .'/modulemanegment_test.php');
		$this->addFile(dirname(__FILE__) .'/EXIF_module_test.php');
	}
}
?>