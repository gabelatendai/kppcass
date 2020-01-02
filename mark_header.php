<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 20/8/2018
 * Time: 14:14
 */

$me= $_SESSION['sess_user'];
?>
<ul class="nav nav-tabs">
	<?php
if (@$_SESSION['role'] != 'student'){?>
    <li ><a href="markstep1">Select Subject <img src="assets/img/new.png"> </a></li>
    <li ><a href="markstep2">View Students Performance<img src="assets/img/view2.png"></a></li><!--
    <li><a href="markstep6.php"> Assignment</a></li>
    <li><a href="markstep7.php">Print Transcript<img src="assets/img/print.png"> </a></li>--

    <li><a href="markstep1">Composite Mark Set <img src="assets/img/delete2.png"></a></li>
    <li><a href="markstep4">View Marks <img src="assets/img/import.png"></a></li>
    <li ><a href="course_perfomance"> Course Work Performance<img src="assets/img/view2.png"></a></li>-->
	<?php }
    if (@$_SESSION['role'] == 'student'){?>


	<li><a href="individual_marks<?php echo  '?id='.$me;  ?>">My Marks</a></li>
  <?php } ?>
   </ul>
