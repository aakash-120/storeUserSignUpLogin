<?php
require "./classes/User.php";
print_r($_GET);
echo $_GET['id'];
User::delete($_GET['id']);

?>