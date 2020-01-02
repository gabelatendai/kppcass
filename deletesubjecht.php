<?php
error_reporting(0);//turning off error reporting
include("header.php");
//include 'rb.php';
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

 $init = R::findOne('courses', 'id = ?', [$id]);

 R::trash( $init );
 print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('courses')</script>");
?>