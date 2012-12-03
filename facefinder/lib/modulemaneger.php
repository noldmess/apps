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
		/**
		 * @todo make initialise
		 */
	function __construct() {
		/*$this->ModuleClass=$this->checkCorrectModuleClass("apps/facefinder/module/");
		foreach ($this->ModuleClass as $modul){
			$modul::initialiseDB();
		}*/
		$dir=$this->getCorrectFolderName().'apps/facefinder/module/';
		 
		//$test =new OC_Filestorage_Local('');
		if(is_dir($dir)){
			$dh=opendir($dir);
			while (($file = readdir($dh)) !== false) {
				if( strpos($file,'.php')){
					//$this->ModuleClass[]=$dir . $file;
					$classname=$this->checkCorrectModuleClass($dir . $file);
					if($classname!=null){
						$this->ModuleClass[]=$classname;
						$classname::initialiseDB();
					}
				}
			}
		}else{
			/**
			 * @todo use translation funktion
		/	 */
		OCP\Util::writeLog("facefinder","No Module folder found ",OCP\Util::ERROR);
		}
	}
	/**
	 * The funktion Cheks if the Class implements the 'OC_Module_Interface' interface
	 *  and the classname is identikal to the filaname
	 * @param the Path to the class to check $classPath
	 */
	public  function checkCorrectModuleClass($classPath){
		$classname=$this->getClassName($classPath);
		require_once   $classPath;
		if(!class_exists($classname)){
			/**
			 * @todo use translation funktion
			 */
			OCP\Util::writeLog("facefinder","Class not exist or not identik like file name:".$classname,OCP\Util::ERROR);
			return  null;
		}else{
			$interfaceArray=class_implements($classname);
			if(count($interfaceArray)>=1 && $interfaceArray['OC_Module_Interface']=='OC_Module_Interface'){
					return $classname;
			}else{
				OCP\Util::writeLog("facefinder","The class:".$classname." not implements the OC_Module_Interface interface",OCP\Util::ERROR);
				return  null;
			}
				
		}
		
	}
	/**
	 *@todo fine correkt folder name 
	 */
	public  function getCorrectFolderName(){
		$string=$_SERVER['SCRIPT_NAME'];
		$help=strrpos($string,"/");
		$string=substr($string, 0, $help);
		$tok = strtok($string, "/");
		$tok = strtok("/");
		$Path_tmp="";
		$i=2;
		while ($tok !== false) {
			$i++;
			$tok = strtok("/");
			$Path_tmp.="../";
		}
		return $Path_tmp;
	} 
	
	public function getModulsOfFolder($modulpath){
		$modulaArray=array();
		$dir=$this->getCorrectFolderName().$modulpath;
		if(is_dir($dir)){
			$modulfolder=opendir($dir);
			while (($file = readdir($modulfolder)) !== false) {
				$fileinfo=pathinfo($file);
				if( $fileinfo['extension']=='php'){
					$classname=$this->getClassName($dir . $file);
					//$classname=$this->checkCorrectModuleClass($dir . $file);
					if($classname!=null){
						$modulaArray[]=$classname;
					}
				}
			}
		}else{
			/**
			 * @todo use translation funktion
			 */
			OCP\Util::writeLog("facefinder","No Module folder found ",OCP\Util::ERROR);
			$modulaArray=null;
		}
		return $modulaArray;
	}
	
	
	public function getModuleClass(){
		return $this->ModuleClass;
	}
	
	/**
	 * Funktioen get the path to a file and returns t
	 * @param  $classPath
	 * @return filename
	 */
	public  function getClassName($classPath){
		$path_parts = pathinfo($classPath);
		return  $path_parts['filename'];
	}
	
}