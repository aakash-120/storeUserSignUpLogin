<?php
require "./classes/DB.php";
$uid = $_GET['uid'];
$btnid = $_GET['btnid'];
if($btnid == '0')
{
   
  $sql = "UPDATE users SET approved = '1' WHERE id = '$uid';";
$data = DB::getInstance()->query($sql);  

}
else{
    $sql = "UPDATE users SET approved = '0' WHERE id = '$uid';";
    $data = DB::getInstance()->query($sql); 
}
header("location:customers.php");
?>
