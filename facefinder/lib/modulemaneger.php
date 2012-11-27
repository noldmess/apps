<?php
class OC_Module_Maneger {
	function __construct() {
		$l = OC_L10N::get('facefinder');
		$dir="owncloud";
		//OCP\Util::writeLog("facefinder",$_SERVER['SCRIPT_NAME'],OCP\Util::FATAL);
		$file=OCP\Util::linkTo('facefinder', 'module/modulxml.xml');
		//OC_Files::newFile($file,'sfsd','dir');
			if (is_file($file)) {
		    
		    	OCP\Util::writeLog("facefinder",$file." yes ".$_SERVER['SCRIPT_NAME'],OCP\Util::FATAL);
		    	
		}else{
			OCP\Util::writeLog("facefinder",$file."   no".$_SERVER['SCRIPT_NAME'],OCP\Util::FATAL);
		}
	}
}