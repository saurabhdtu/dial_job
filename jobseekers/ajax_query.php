<?php
include_once('../../dbconnect.php');
$city=$_GET['area'];
$query="select area_name from area where area_name LIKE '%".$city."%'";
$result=mysql_query($query);
$data=array();
while($row=mysql_fetch_assoc($result))
   {    $data[]=array(
       'area_name'=>$row['area_name']
        );
    }
echo json_encode($data);
?>