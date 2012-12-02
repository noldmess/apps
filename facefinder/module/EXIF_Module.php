<?php
class EXIF_Module implements OC_Module_Interface{
	
		private  $paht;
		private  static $version='0.0.2';
		private $ForingKey=null;
		private $exif;
		public  function __construct($path) {
			$this->paht=$path;
		}
		
		public static function getVersion(){
			return self::$version;
		}
		/**
		 * Insert the exif data in the EXIF module Table in the db 
		 * If there is no "DateTimeOriginal" the "FileDateTime" will be  insert 
		 */
		public function insert(){
			/**
			 * @todo change name of data element
			 */
			if (\OC_Filesystem::file_exists($this->paht)) {
				if($this->ForingKey!=null){
					OCP\Util::writeLog("facefinder","key>".$this->ForingKey,OCP\Util::ERROR);
					$stmt = OCP\DB::prepare('INSERT INTO `*PREFIX*facefinder_exif_module` (`date`, `photo_id`) VALUES ( ?, ?)');
					$exif=exif_read_data(OC_Filesystem::getLocalFile($this->paht),'FILE', true);
					$exifheader=$exif['EXIF']['DateTimeOriginal'];
					if($exifheader==null)
						$exifheader=date('Y:m:d H:i:s',$exif['FILE']['FileDateTime']);
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
	
		/**
		 * Uset to set the ForingKey for the module tables
		 * @param ForingKey
		 */
		public function  setForingKey($key){
			$this->ForingKey=$key;
		}
		/**
		 * Help Funktioen to create  module DB Tables
		 * @param String of $classname
		 */
		private static function createDBtabels($classname){
			$stmt = OCP\DB::prepare('DROP TABLE IF EXISTS`*PREFIX*facefinder_exif_module`');
			$stmt->execute();
			OC_DB::createDbFromStructure(OC_App::getAppPath('facefinder').'/module/'.$classname.'.xml');
			$stmt = OCP\DB::prepare('ALTER TABLE`*PREFIX*facefinder_exif_module` ADD FOREIGN KEY (photo_id) REFERENCES *PREFIX*facefinder(photo_id) ON DELETE CASCADE');
			$stmt->execute();
		}
		
		/**
		 * Create the DB of the Module the if the module hase an new Version numper
		 */
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