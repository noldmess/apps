<?php
//require_once(dirname(__FILE__) . '/../../../../simpletest/autorun.php');
//require_once('apps/facefinder/lib/modulemaneger.php');
//require_once('apps/facefinder/lib/moduleinterface.php');

class TestOfModuleManeger extends UnitTestCase {

    
    
    function testgetClassName(){
    	$mm=new OC_Module_Maneger();
    	$name=$mm->getClassName("/sdfsd/sdfsdf/dfsdf/sepp.php");
    	$this->assertEqual($name, "sepp");
    	$name=$mm->getClassName("/sdfsd/sdfsdf/dfsdf/seppdd.php");
    	$this->assertNotEqual($name, "sepp");
    }
    
   function  testgetModulsOfFolder(){
    	$mm=new OC_Module_Maneger();
    	$arrddday=$mm->getModulsOfFolder(dirname(__FILE__) ."/testmodul/");
    	$this->assertNotNull($arrddday);
    	foreach ($arrddday as $modul){
    		$this->assertTrue(file_exists(dirname(__FILE__) ."/testmodul/".$modul.".php"));
    	}
    }
    

    function  testcheckCorrectModuleClass(){
    	$mm=new OC_Module_Maneger();
    	$classname=$mm->checkCorrectModuleClass(dirname(__FILE__) ."/testmodul/moduletest_interface.php");
    		$this->assertNotNull($classname);
    		$this->assertEqual($classname, "moduletest_interface");
    	$classname=$mm->checkCorrectModuleClass(dirname(__FILE__) ."/testmodul/moduletest_nointerface.php");
    		$this->assertNull($classname);
    		$this->assertNotEqual($classname, "moduletest_nointerface");
    	$classname=$mm->checkCorrectModuleClass(dirname(__FILE__) ."/testmodul/moduletest_notcorrektclass.php");
    		$this->assertNull($classname);
    		$this->assertNotEqual($classname, "moduletest_notcorrektclass");
    }
    
     
}