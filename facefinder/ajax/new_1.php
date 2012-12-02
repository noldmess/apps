<?php
OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('facefinder');

$stmt = \OCP\DB::prepare('SELECT DISTINCT  YEAR(date) as year FROM `*PREFIX*facefinder_exif_module` inner  join oc_facefinder on (*PREFIX*facefinder_exif_module.photo_id= *PREFIX*facefinder.photo_id) Where uid_owner LIKE ? order by date  DESC');
$resultyear = $stmt->execute(array(\OCP\USER::getUser()));
$year=1970;
$month=-1;

$help=false;

$days=array();

$i=0;
$help=true;
while (($rowyear = $resultyear->fetchRow())!= false) {
		//echo $rowyear['year']."<br>";
		$stmta = \OCP\DB::prepare('SELECT DISTINCT MONTH(date) as month FROM `*PREFIX*facefinder_exif_module` inner  join oc_facefinder on (*PREFIX*facefinder_exif_module.photo_id= *PREFIX*facefinder.photo_id) Where uid_owner LIKE ? AND YEAR(date) = ? order by   date DESC');
		$resultmonth = $stmta->execute(array(\OCP\USER::getUser(),$rowyear['year']));
		$montharray=array();
		while (($rowmonth = $resultmonth->fetchRow())!= false) {
				
				$days=array();
				$day=0;
				$images=array();
				$rows=false;
				$stmta = \OCP\DB::prepare('SELECT  Day(date) as day,path FROM `*PREFIX*facefinder_exif_module` inner  join oc_facefinder on (*PREFIX*facefinder_exif_module.photo_id= *PREFIX*facefinder.photo_id) Where uid_owner LIKE ? AND YEAR(date) = ? AND MONTH(date) = ? order by date ASC');
				$resultday = $stmta->execute(array(\OCP\USER::getUser(),$rowyear['year'],$rowmonth['month']));
				while (($rowday = $resultday->fetchRow())!= false) {
					//$images[]=$rowday['path'];
					
					/*if($day==0){
						$images=array();
						//echo "ffff".$rowday['day']." ".$rowday['path']."<br>";
						
						$images[]="/owncloud/?app=gallery&getfile=ajax%2Fthumbnail.php&filepath=%2F".$rowday['path'];
						$day=$rowday['day'];
						$rows=true;
					}else{*/
						//$rows=false;
						if($day==$rowday['day']){
							$images[]="/owncloud/?app=gallery&getfile=ajax%2Fthumbnail.php&filepath=%2F".$rowday['path'];
							//echo "->".$rowday['day']." ".$rowday['path']."<br>";
						}else{
							//echo json_encode($images);
							if($day!=0)
								$days[]=array('day'=>$day,"imags"=>$images);
							//echo json_encode(array('day'=>$day,"imags"=>$images));
							$images=array();
							$day=$rowday['day'];
							$images[]="/owncloud/?app=gallery&getfile=ajax%2Fthumbnail.php&filepath=%2F".$rowday['path'];
						}
						
					//}
				
				}
				//if($rows)
			//			$days[]=array('day'=>$day,"imags"=>$images);
				//echo json_encode($days);
				$days[]=array('day'=>$day,"imags"=>$images);
				$montharray[]=array('month'=>$rowmonth['month'],"days"=>$days);
				//echo json_encode($montharray);
		}
		$yeararray[]=array('year'=>$rowyear['year'],"month"=>$montharray);
		
}
echo json_encode($yeararray);


//
//echo"sdffffffffffffffffff". json_encode($days);
//return  $id;
$images0=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC01930.jpg","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0292.jpg");
$day0=array('day'=>'10','imags'=>$images0);
$images1=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSCN0127.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0289.jpg","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0528.JPG");
$day1=array('day'=>'11',"imags"=>$images1);
$days=array($day0,$day1);
$monat0=array('month'=>'März',"days"=>$days);

$images0=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG");
$day0=array('day'=>'10','imags'=>$images0);
$images1=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG");
$day1=array('day'=>'11',"imags"=>$images1);
$days=array($day0,$day1);
$monat1=array('month'=>'April',"days"=>$days);

$images0=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG");
$day0=array('day'=>'10','imags'=>$images0);
$images1=array("/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG","/owncloud/?app=gallery&amp;getfile=ajax%2Fthumbnail.php&amp;filepath=%2FDSC_0135.JPG");
$day1=array('day'=>'11',"imags"=>$images1);
$days=array($day0,$day1);

$year=array('year'=>'2011','month'=>array($monat0,$monat1));
//echo json_encode(array($year,$year));
?>