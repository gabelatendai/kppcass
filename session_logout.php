<?php
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
<?php

session_start();
session_destroy();
header('location:index');
?>