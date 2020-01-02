<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 20/8/2018
 * Time: 15:24
 */?>
<ul class="nav nav-tabs">

    <?php if (@$_SESSION['role'] == 'student') {  ?>
    <li><a href="upload_assignment">Submit Assignment<img src="assets/img/import.png"></a></li>
    <li><a href="view_assignments">View Assignment <img src="assets/img/import.png"></a></li>
	    <li><a href="individual_marks">My Marks</a></li>
   <?php  }elseif (@$_SESSION['role'] == 'lecturer'){ ?>
     <li><a href="students">Add Student <img src="assets/img/new.png"> </a></li>
        <li><a href="viewstudents">  Students List <img src="assets/img/view2.png"></a></li>
         <li><a href="add_assignment">Upload Assignment<img src="assets/img/import.png"></a></li>
            <li><a href="view_uploaded_assignmnts">View Assignment <img src="assets/img/import.png"></a></li>

    <?php  }else{ ?>
	    <li><a href="students">Add Student <img src="assets/img/new.png"> </a></li>
	    <li><a href="viewstudents">  Students List <img src="assets/img/view2.png"></a></li>
	      <?php  }
    ?>
</ul>
