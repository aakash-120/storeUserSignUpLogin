<?php

echo "i am inside ujpdate user page";

require "classes/User.php";

if(isset($_GET["submit_button"]))
{
  print_r($_GET);
$uid = $_GET['uid'];
$uname = $_GET["uname"];
$uemail =  $_GET["uemail"];
$upassword =  $_GET["upassword"];

User::updateUser($uid, $uname, $uemail, $upassword);

// echo $uid;
// echo $uname;
// echo $uemail;
// echo $upassword;

}



?>