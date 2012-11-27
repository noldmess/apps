<?php

class OC_Module_Maneger {
	function __construct() {
		$l = OC_L10N::get('facefinder');
		$xmlfile='lib/module/modulexml.xml';
		if (file_exists($xmlfile)) {
			$xml = simplexml_load_file($xmlfile);
		
			//print_r($xml);
		} else {
			OCP\Util::writeLog("facefinder",$l->t(array('No Module XML file found')),OCP\Util::FATAL); 
		}
	}
}