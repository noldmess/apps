<?php
require_once(dirname(__FILE__) . '/../../../../simpletest/autorun.php');
//require_once (dirname(__FILE__) .'/../../../lib/base.php');
OC_App::loadApp('facefinder');
class TestOfModuleManeger extends UnitTestCase {

    
    
    function testgetClassName(){
    	$name=OC_Module_Maneger::getClassName("/sdfsd/sdfsdf/dfsdf/sepp.php");
    	$this->assertEqual($name, "sepp");
    	$name=OC_Module_Maneger::getClassName("/sdfsd/sdfsdf/dfsdf/seppdd.php");
    	$this->assertNotEqual($name, "sepp");
    }
    
 function  testgetModulsOfFolder(){
    	$arrddday=OC_Module_Maneger::getModulsOfFolder($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/");
    	$this->assertNotNull($arrddday);
    	foreach ($arrddday as $modul){
    		$this->assertTrue(file_exists(dirname(__FILE__) ."/testmodul/".$modul.".php"));
    	}
    }
    

    function  testcheckCorrectModuleClass(){
    	$classname=OC_Module_Maneger::checkCorrectModuleClass($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/moduletest_interface.php");
    		$this->assertNotNull($classname);
    		$this->assertEqual($classname, "moduletest_interface");
    	$classname=OC_Module_Maneger::checkCorrectModuleClass($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/moduletest_nointerface.php");
    		$this->assertNull($classname);
    		$this->assertNotEqual($classname, "moduletest_nointerface");
    	$classname=OC_Module_Maneger::checkCorrectModuleClass($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/moduletest_notcorrektclass.php");
    		$this->assertNull($classname);
    		$this->assertNotEqual($classname, "moduletest_notcorrektclass");
    }
    
    function  testCheckClass(){
    	$classname=OC_Module_Maneger::checkCorrectModuleClass($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/moduletest_interface.php");
    	$test=OC_Module_Maneger::CheckClass($classname);
    	$this->assertTrue($test);
    	$classname=OC_Module_Maneger::checkCorrectModuleClass($_SERVER['DOCUMENT_ROOT']."/owncloud/apps/facefinder/tests/testmodul/moduletest_interfacenocange.php");
    	$test=OC_Module_Maneger::CheckClass($classname);
    	$this->assertTrue($test);
    }
    
     
}