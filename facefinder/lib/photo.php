<?php

class OC_FaceFinder_Photo implements OC_Module_Interface{
	
	private  $paht;

	/**
	 * 
	 * @param Insert the $paht in the facefinder tabel in the db
	 */
	public  function __construct($paht) {
		$this->paht=$paht;
	}
	
	public function insert(){
			$stmt = OCP\DB::prepare('INSERT INTO `*PREFIX*facefinder` ( `uid_owner`, `path`) VALUES (?, ?)');
			$stmt->execute(array(\OCP\USER::getUser(),$this->paht));
			$this->existe=true;
	}
	
	/**
	 * @return return the primary key sql table 
	 */
	public function getID(){
			$stmt = \OCP\DB::prepare('SELECT * FROM `*PREFIX*facefinder` WHERE `uid_owner` LIKE ? AND `path` LIKE ?');
			$result = $stmt->execute(array(\OCP\USER::getUser(), $this->paht));
			$id=-1;
				while (($row = $result->fetchRow())!= false) {
					 $id=$row['photo_id'];
				}
				return  $id;
			}
		
	
	
	public function remove(){
		$id=$this->getID();
		if($id!=-1){
			$stmt = OCP\DB::prepare('DELETE FROM `*PREFIX*facefinder` WHERE `uid_owner` LIKE ? AND `photo_id` = ?');
			$stmt->execute(array(\OCP\USER::getUser(),$id));
		}else{
			/**
			 * @todo use translation funktion
			 */
			OCP\Util::writeLog("facefinder","No such file".$id,OCP\Util::ERROR);
		}
	}
	
	public function  update($newpaht){
		$id=$this->getID();
		if($id!=-1){
			$stmt = OCP\DB::prepare('UPDATE `ocsdf`.`oc_facefinder` SET `path` = ? WHERE `uid_owner` LIKE ? AND `photo_id` = ? ');
			$stmt->execute(array($newpaht,\OCP\USER::getUser(),$id));
		}
	}
	
	public function search($query){
		/**
		 * @todo
		 */
	}

	
	public function equivalent(){
		/**
		 * @todo
		 */
	}
	
	
	public function  setForingKey($key){
		/**
		 * @todo
		 */
	}
	
	public static function initialiseDB(){
		/**
		 * @todo
		 */
	}
	
}