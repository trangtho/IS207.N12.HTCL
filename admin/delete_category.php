<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM menu WHERE mn_id = '".$_GET['cat_del']."'");
header("location:add_category.php");  

?>
