<?php
include_once('dbconnect.php');
if(isset($_GET['area']))
{
    $city=$_GET['area'];
    $query="select area_name from area where area_name LIKE '%".$city."%'";
    $result=mysql_query($query);
    $data=array();
    while($row=mysql_fetch_assoc($result))
       {    $data[]=array(
           'area_name'=>$row['area_name']
            );
        }
}
if(isset($_GET['qua']))
{
    $qualification=$_GET['qua'];
    $query="select * from specialization where category LIKE '%".$qualification."%'";
    $result=mysql_query($query);
    $data=array();
    while($row=mysql_fetch_assoc($result))
    {
        $data[]=array(
          'spl'=>$row['specialization_field']
        );
    }
}
if(isset($_GET['qualify']))
{
    $qua=$_GET['qualify'];
    $query="select * from qualification where id > ( select id from qualification where qualification_level = '".$qua."')";
    $result=mysql_query($query);
    $data=array();
    while($row=mysql_fetch_assoc($result))
    {
        $data[]=array(
          'qua'=>$row['qualification_level']
        );
    }
}
if(isset($_GET['lang']))
{
    $result=mysql_query("select * from language");
    $data=array();
    while($row=mysql_fetch_assoc($result))
    {
        $data[]=array(
          "language"=>$row['lang']
        );
    }
}
echo json_encode($data);
?>