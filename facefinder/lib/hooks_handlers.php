<?php

/**
* ownCloud - facefinder
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
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

class OC_FaceFinder_Hooks_Handlers {

	/**
	 * Secure thet only Photos are loket 
	 */
	
	public static function write($params) {
		$path = $params[OC_Filesystem::signal_param_path];
		if($path!=''){
		$tmp=new OC_FaceFinder_Photo($path);
		$tmp->insert();
		$id=$tmp->getID();
		$writemodul=new OC_Module_Maneger();
		$moduleclasses=$writemodul->getModuleClass();
			foreach ($moduleclasses as $moduleclass){
				$class=new $moduleclass($path);
				$class->setForingKey($id);
				$class->insert();
			}
			
		}
	}
	
	public static function delete($params){
		$path = $params[OC_Filesystem::signal_param_path];
		if($path!=''){
		OCP\Util::writeLog("facefinder","to delite".$path,OCP\Util::DEBUG);
		$tmp=new OC_FaceFinder_Photo($path);
		$tmp->remove();
		}
	}
	
	
	public static function update($params){
		$path = $params[OC_Filesystem::signal_param_oldpath];
		$newpath = $params[OC_Filesystem::signal_param_newpath];
		if($path!='' && $newpath!=''){
			OCP\Util::writeLog("facefinder","to update".$path,OCP\Util::DEBUG);
			$tmp=new OC_FaceFinder_Photo($path);
			$tmp->update($newpath);
		}
	}
	


}
