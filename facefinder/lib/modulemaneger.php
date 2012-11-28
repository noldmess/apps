<?php
/**
 * ownCloud - faceFinder application
 *
* @author Aaron Messner
* @copyright 2012 Aaron Messner aaron.messner@stuudent.uibk.ac.at
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.	If not, see <http://www.gnu.org/licenses/>.
 *
 */



class OC_Module_Maneger {
		private $ModuleClass=array();
		
	/**
	 * The Constructor Initialize all in the Module folder store Module Classes
	 * and check the functionality and correctness
	 * @todo finde esyer losution
	 */
	function __construct() {
		
		$dir=$this->getCorelktFolderName().'apps/facefinder/module/';
		if(OC_Filestorage_Local::is_dir($dir)){
			$dh=OC_Filestorage_Local::opendir($dir);
			while (($file = readdir($dh)) !== false) {
				if( strpos($file,'.php')){
					$this->ModuleClass[]=$dir . $file;
					$this->checkKorektensModuleClass($dir . $file);
				}
			}
			/**
			 * @todo Remove belou only to test
			 *
			 */
			$s='Classes';
			foreach ($this->ModuleClass as $value) {
				$s.=" ".$value;
			}
			OCP\Util::writeLog("facefinder",count($this->ModuleClass )." ". $_SERVER['SCRIPT_NAME']." " .$s,OCP\Util::DEBUG);
			// until hear
		}else{
			/**
			 * @todo use translation funktion
			 */
		OCP\Util::writeLog("facefinder","No Module folder found ",OCP\Util::ERROR);
	}
	}
	
	private function checkKorektensModuleClass($classPaht){
		//include_once $classPaht;
		$removeType=strpos($classPaht,'.php');
		$classname=substr($classPaht,0,$removeType);
		OCP\Util::writeLog("fafffffffcefinder",$classname,OCP\Util::DEBUG);
	}
	/**
	 *@todo fine korekr folder name 
	 */
	private function getCorelktFolderName(){
		$string=$_SERVER['SCRIPT_NAME'];
		//OCP\Util::writeLog("facefinder-1",$string." ".$_SERVER['SCRIPT_NAME'],OCP\Util::DEBUG);
		$help=strrpos($string,"/");
		$string=substr($string, 0, $help);
		//OCP\Util::writeLog("facefinder0",$string." ".$_SERVER['SCRIPT_NAME'],OCP\Util::DEBUG);
		$tok = strtok($string, "/");
		//OCP\Util::writeLog("facefinder1",$tok." ".$_SERVER['SCRIPT_NAME'],OCP\Util::DEBUG);
		$tok = strtok("/");
		//OCP\Util::writeLog("facefinder2",$tok." ".$_SERVER['SCRIPT_NAME'],OCP\Util::DEBUG);
		$paht_tmp="";
		$i=2;
		while ($tok !== false) {
			$i++;
			$tok = strtok("/");
			$paht_tmp.="../";
			//OCP\Util::writeLog("facefinder".$i,$tok." ".$_SERVER['SCRIPT_NAME'],OCP\Util::DEBUG);
		}
		//OCP\Util::writeLog("facefinderAusgabe",$paht_tmp,OCP\Util::DEBUG);
		return $paht_tmp;
	} 
}