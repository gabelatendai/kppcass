<?php
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">

                            <?php

                            include('mark_header.php');
                            ?>
                            <br>

                        </div></div></div></div>
                        
  <!--*************************************************************************************************************************-->
 
<h4><center><h4 style="color: black"><strong>View students according to their respective Courses</strong></h4></center></h4>
                <div class="x_content">
                    <!-- content starts here -->
                    <div id="div-id-name">
                        <div class="table-responsive col-md-offset-1">
	                       <td><a button type='button' class="btn btn-primary" href="markstep_nc.php">NC</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="markstep1.php">ND1</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="markstep_nd3.php">ND3</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="markstep_hnd.php">HND</a></td></tr>
                            <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>
                                                            <tr>

                                                                <th style="color: black">Subject</th>

                                                                <th style="color: black">Record Set 1</th>
                                                                <th style="color: black">Record Set  2</th>

                                                                <th style="color: black">Record Set 3</th>
                                                                <th style="color: black">Record Exam Mark</th>
                                                                <th style="color: black">Course Marks</th>
	                                                            <th style="color: black">Composite Mark Set</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                        include "config.php";

                                        $sql="SELECT * FROM subjects  Where level = 'nd3'";
                                                    $user_query=mysqli_query($conn,$sql) or die("error getting data");
                                                    while($course  = mysqli_fetch_array($user_query)){
                                                    $id = $course ['id'];
                                         ?>

                                            <tr class="odd gradeX">
                                                <td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>
                                            
                                             <!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2.php?course=<?php //echo $id ;?>">View Students</a></center></td> -->
                                                    <td >
	                                                    <div class="input-group-btn">
		                                                    <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Record Marks <span class="caret pull-right"></span></button>
		                                                    <ul class="dropdown-menu dropdown-menu-right">
			                                                    <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory.php?course=<?php echo $id ?>"><b>Theory</b></a></li>
			                                                    <li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac.php?course=<?php echo $id ?>"><b>Practical</b></a></li>
			                                                    <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd.php?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
			                                                    <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test.php?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

			                                                    <li role="separator" class="divider"></li></ul>
                                                    </td><td>
		                                            <div class="input-group-btn">
			                                            <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Record Marks <span class="caret pull-right"></span></button>
			                                            <ul class="dropdown-menu dropdown-menu-right">
				                                            <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory.php?course=<?php echo $id ?>"><b>Theory</b></a></li>
				                                            <li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac.php?course=<?php echo $id ?>"><b>Practical</b></a></li>
				                                            <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd.php?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
				                                            <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test.php?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

				                                            <li role="separator" class="divider"></li></ul>
                                                </td><td>
		                                            <div class="input-group-btn">
			                                            <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Record Marks <span class="caret pull-right"></span></button>
			                                            <ul class="dropdown-menu dropdown-menu-right">
				                                             <li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac.php?course=<?php echo $id ?>"><b>Practical</b></a></li>
				                                            <li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd.php?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

				                                            <li role="separator" class="divider"></li></ul>
		                                            </div></td>

                                            </center>
                                                <td>

                                                    <center><a button class="btn btn-success" title="Click here to View."
                                                               href="exam_marks.php?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>

                                                <td >
                                                    <center><a button class="btn btn-success" title="Click here to View."
                                                               href="course_mark.php?course=<?php echo $id ;?>">View Course Mark</a></center></td>
                                                </td>
	                                            <td >
		                                            <center><a button class="btn btn-success" title="Click here to View."
		                                                       href="composite_marks.php?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
	                                            </td>
                            </tr>
                                       <?php } ?>
                                                
                                        </tbody>
                                    </table>
                                </form>
<table cellpadding="0" cellspacing="0" border="1" class="table">
<tbody>
<tr>
<td style="text-align:center; background:orange">
<a href="packages_list.php">Enter marks for packages</a>
</td>
</tr>
</tbody>
</table> 
               
<!--****************************************************************************-->
 

                </div>
                </p>

            </div>
            
        </div>
    </div>

<?php
include("footer.php");
?>
