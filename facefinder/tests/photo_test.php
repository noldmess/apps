<?php
//require_once(dirname(__FILE__) . '/../../../../simpletest/autorun.php');

class TestOfPhoto extends UnitTestCase {

	private $photoclass;
	private $path;
	private $id;
	 function  getNumnberResult($path){
		$stmt = \OCP\DB::prepare('SELECT * FROM `*PREFIX*facefinder` WHERE `uid_owner` LIKE ? AND `path` LIKE ?');
		$result = $stmt->execute(array(\OCP\USER::getUser(), $path));
		$rownum=0;
		while (($row = $result->fetchRow())!= false) {
			$rownum++;
			$this->id=$row['photo_id'];
		}
		return  $rownum;
	}
	
	function __construct() {
		$this->path=dirname(__FILE__)."/testphoto/DSC01930.jpg";
		OC_User::setUserId 	('test');
		$this->photoclass=new OC_FaceFinder_Photo($this->path);
		
	}
	
	function testinsert() {
		$rownum=$this->getNumnberResult($this->path);
		$this->assertEqual($rownum,0);
		$this->photoclass->insert();
		$rownum=$this->getNumnberResult($this->path);
		$this->assertEqual($rownum,1);
	}
	
	function testgetid(){
		$id_tmp=$this->photoclass->getID();
		$this->assertEqual($id_tmp,$this->id);
	}
	
	function testupdate(){
		$rownum=$this->getNumnberResult($this->path);
		$this->assertEqual($rownum,1);
		$newpath=dirname(__FILE__)."/testphoto/DSC01930.jpg_test";
		$this->photoclass->update($newpath);
		$this->path=$newpath;
		$rownum=$this->getNumnberResult($this->path);
		$this->assertEqual($rownum,1);
	}
	
	function testremove() {
			$rownum=$this->getNumnberResult($this->path);
			$this->assertEqual($rownum,1);
			$this->photoclass->remove();
			$rownum=$this->getNumnberResult($this->path);
			$this->assertEqual($rownum,0);
		}
		

		


	 
}