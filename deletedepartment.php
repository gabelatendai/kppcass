<?php
include("header.php");
//include 'rb.php';
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

 $init = R::findOne('departments', 'id = ?', [$id]);

 R::trash( $init );
 print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('departments')</script>");
?>