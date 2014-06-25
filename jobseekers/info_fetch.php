<?php
include("../../dbconnect.php");
//$table_name="area";//table name
//$city=$GET['area'];
   $qry="select area_name from area";
   $rowdata=mysql_query($qry);
 // $data=array();
  while($data[]=mysql_fetch_assoc($rowdata)){
     // echo $data['area_name']."<br>";
   }

  //echo count($data);
//   print_r($data);

echo json_encode($data);

?>