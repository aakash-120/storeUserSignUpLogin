<?php
require "./classes/PRODUCT.php";
print_r($_GET);
echo $_GET['id'];
PRODUCT::delete($_GET['id']);

?>