<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 20/8/2018
 * Time: 15:49
 */
?> <ul class="nav nav-tabs">
    <?php if (@$_SESSION['role'] == 'lecturer'){  ?>


    <li ><a href="edit_staff">My Account <img src="assets/img/import.png"></a></li>
    <li ><a href="add_assignment">Add Assignment <img src="assets/img/import.png"></a></li>
    <li><a href="view_uploaded_assignmnts">Submitted Assignments <img src="assets/img/import.png"></a></li>
    <?php }if (@$_SESSION['role'] != 'lecturer'){  ?>

		<li class=""><a href="staff">New Staff Member <img src="assets/img/new.png"> </a></li>
	    <li><a href="viewstaff.php">View List<img src="assets/img/view2.png"></a></li>
    <?php }

    ?>
</ul>