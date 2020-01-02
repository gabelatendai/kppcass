<?php
error_reporting(0);
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>

<?php
}
$session_id=$_SESSION['id'];
$user_query = mysqli_query($conn,"select * from admin where id = '$session_id'")or die('error in connecting');
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['username'];
?>