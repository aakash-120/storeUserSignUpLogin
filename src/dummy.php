<?php

require "classes/PRODUCT.php";

if(isset($_POST["submit_button"]))
{

print_r($_POST);
print_r($_FILES);
print_r($_GET);

$pid = $_POST["pid"];
$pname =  $_POST["pname"];
$pprice =  $_POST["pprice"];
$pquantity =  $_POST["pquantity"];
$pcategory =  $_POST["pcategory"];
$file_name = $_FILES['pimage']['name'];
$file_tmp_name = $_FILES['pimage']['tmp_name'];
move_uploaded_file($file_tmp_name , "uploads/".$file_name);
$dprice =  $_POST["dprice"];
$ptags =  $_POST["ptags"];
$pdescription =  $_POST["pdescription"];




PRODUCT::updateProduct($pid ,$pname, $pprice, $pquantity ,$pcategory,$file_name,$dprice,$ptags,$pdescription);

// echo $pid;
// echo $pname;
// echo $pprice;
// echo $pquantity;
// echo $pcategory;



}

?>