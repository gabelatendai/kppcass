<?php
error_reporting(0);//turning off error reporting
include("header.php");
//include 'rb.php';
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

 $init = R::findOne('students', 'id = ?', [$id]);
 $users_id=$init->users_id;
 $number=$init->admission_number;

 $in = R::findOne('users', 'id = ?', [$users_id]);

 R::trash( $init );
 R::trash( $in );
 print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('viewstudents')</script>");
?>