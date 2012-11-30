<?php

class EXIF_Module implements OC_Module_Interface{
	
		private  $paht;
		private  static $version='0.0.2';
		private $ForingKey=null;
		private $exif;
		public  function __construct($path) {
			$this->paht=$path;
			// 
			
			
			//EXIF.DateTimeOriginal
			//OCP\Util::writeLog("facefinder",$arr = DatabaseManager::getInstance()->getFileData($this->paht),OCP\Util::DEBUG);
		}
		
		public static function getVersion(){
			return self::$version;
		}
	
		public function insert(){
			/**
			 * @todo change name of data element
			 */
			if (\OC_Filesystem::file_exists($this->paht)) {
				if($this->ForingKey!=null){
					OCP\Util::writeLog("facefinder","key>".$this->ForingKey,OCP\Util::ERROR);
					$stmt = OCP\DB::prepare('INSERT INTO `*PREFIX*facefinder_exif_module` (`dasdfsdfsf`, `photo_id`) VALUES ( ?, ?)');
					$exif=exif_read_data(OC_Filesystem::getLocalFile($this->paht),'FILE', true);
					$exifheader=$exif['EXIF']['DateTimeOriginal'];
					$stmt->execute(array($exifheader,$this->ForingKey));
				}else{
					OCP\Util::writeLog("facefinder","No id set",OCP\Util::ERROR);
				}
			}
			$this->existe=true;
		}
	
		/**
		 * @return return the primary key sql table
		 */
		public function getID(){
				/**
			 * @todo
			 */
		}
	
	
	
		public function remove(){
				/**
			 * @todo
			 */
		}
	
		public function  update($newpaht){
			/**
			 * @todo
			 */
			}
		}
	
		public function search($query){
			/**
			 * @todo
			 */
			//SELECT YEAR(dasdfsdfsf),MONTH(dasdfsdfsf),DAY(dasdfsdfsf),HOUR(dasdfsdfsf),SECOND(dasdfsdfsf),MINUTE(dasdfsdfsf),path FROM `oc_facefinder_exif_module` inner  join oc_facefinder on (oc_facefinder_exif_module.photo_id= oc_facefinder.photo_id) Where uid_owner LIKE 'Aaron' order by dasdfsdfsf 
		}
	
	
		public function equivalent(){
			/**
			 * @todo
			 */
		}
	
	
		public function  setForingKey($key){
			$this->ForingKey=$key;
		}

		private static function createDBtabels($classname){
			$stmt = OCP\DB::prepare('DROP TABLE IF EXISTS`*PREFIX*facefinder_exif_module`');
			$stmt->execute();
			OC_DB::createDbFromStructure(OC_App::getAppPath('facefinder').'/module/'.$classname.'.xml');
			$stmt = OCP\DB::prepare('ALTER TABLE`*PREFIX*facefinder_exif_module` ADD FOREIGN KEY (photo_id) REFERENCES *PREFIX*facefinder(photo_id) ON DELETE CASCADE');
			$stmt->execute();
		}
		
		public static  function  initialiseDB(){
			$classname="EXIF_Module";
			if(OC_Appconfig::hasKey('facefinder',$classname)){
				$appkeyarray=OC_Appconfig::getValues('facefinder',$classname);
				/**
				 * @todo check korektnes
				 */
				if (version_compare($appkeyarray, self::getVersion(), '>')) {
						OCP\Util::writeLog("facefinder","need update",OCP\Util::DEBUG);
						OC_Appconfig::setValue('facefinder',$classname,self::getVersion());
						self::createDBtabels($classname);
				}
			}else{
				/**
				 * @todo 
				 */
				OCP\Util::writeLog("facefinder","not jet used ".self::getVersion(),OCP\Util::INFO);
				OC_Appconfig::setValue('facefinder',$classname,self::getVersion());
				self::createDBtabels($classname);
			}
		}
		
		

	}