<?php
include("header.php");
//include 'rb.php';
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
$id = $_GET['id'];
 $init = R::findOne('subjects', 'id = ?', [$id]);
 R::trash( $init );
 print ("<script>window.alert('Successfully Deleted ')</script>");
print ("<script>window.location.assign('subject_list')</script>");
?>