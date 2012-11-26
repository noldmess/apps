<?php
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
$monat3=array('month'=>'Mai',"days"=>$days);
//echo json_encode($monat);
echo json_encode(array($monat0,$monat1,$monat3));
?>