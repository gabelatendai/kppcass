<?php
//error_reporting(0);//turning off error reporting
include("header.php");
include('config.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
//$id=$_GET['id'];
?>
 <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">

                            <?php include "mark_header.php"; ?>
                            <br>
                            
                        </div></div></div>
                        
  <!--*************************************************************************************************************************-->

	 <div class="col-lg-12 col-sm-12 col-xs-12">
		 <div class="white-box">
			 <h3 class="box-title m-b-30">Students  Marks.</h3>
			 <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
				 <ul role="tablist" class="nav nav-tabs" id="myTabs">
					 <li class="dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">Dropdown <span class="caret"></span></a>
						 <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
							 <li class=""><a aria-controls="dropdown1" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nc" aria-expanded="true">NC</a></li>
							 <li class=""><a aria-controls="dropdown2" data-toggle="tab" id="dropdown2-tab" role="tab" href="#nd1" aria-expanded="false">ND1</a></li>
							 <li class=""><a aria-controls="dropdown2" data-toggle="tab" id="dropdown2-tab" role="tab" href="#nd3" aria-expanded="false">ND3</a></li>
							 <li class=""><a aria-controls="dropdown2" data-toggle="tab" id="dropdown2-tab" role="tab" href="#hnd" aria-expanded="false">HND</a></li>
						 </ul>
					 </li>
					 <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#set1">Set 1 </a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#set2" aria-expanded="false">Set 2</a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#set3" aria-expanded="false">Set 3</a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#exam" aria-expanded="false">Exam </a></li>
				 </ul>
				 <div class="tab-content" id="myTabContent">
					 <div aria-labelledby="dropdown1-tab" id="nc" class="tab-pane fade " role="tabpanel">
						 <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
					 </div>
					 <div aria-labelledby="dropdown2-tab" id="nd1" class="tab-pane fade" role="tabpanel">
						 <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
					 </div>
					 <div aria-labelledby="dropdown1-tab" id="nd3" class="tab-pane fade " role="tabpanel">
						 <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
					 </div>
					 <div aria-labelledby="dropdown2-tab" id="hnd" class="tab-pane fade" role="tabpanel">
						 <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
					 </div>
					 <div aria-labelledby="home-tab" id="set1" class="tab-pane fade active in" role="tabpanel">
						 <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Set 1 Marks. </label></div>
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>

								 <th><center>Adm No.</center></th>
								 <th><center>Student Name</center></th>
								 <th><center>Course</center></th>
								 <th><center>Year</center></th>
								 <th><center>Theory</center></th>
								 <th><center>Practical</center></th>
								 <th><center>ITTD</center></th>
								 <th><center>Test</center></th>
								 <!--  <th><center>Total</center></th>
                                 <th><center>Average</center></th>
                                 <th><center>Grade</center></th>
                                 <th><center>Area Of Concern</center></th>


                                   <th><center>Rank</center></th> -->


							 </tr>
							 </thead>
							 <tbody>
							 <!--Calculating the totals marks************************************************************************************-->
                             <?php

                             $user_query=mysqli_query($conn,"SELECT * from studentmarks ");
                             while($row=mysqli_fetch_array($user_query)) {
                                 $id=$row['id'];
                                 $admission_number=$row['admission_number'];
                                 $subject_id=$row['course'];
                                 // $average=  $row['total'] / 4;

                                 $cat_query = mysqli_query($conn,"select * from subjects where id = '$subject_id'")or die(mysql_error());
                                 $cat_row = mysqli_fetch_array($cat_query);
                                 $cat = mysqli_query($conn,"select * from students where admission_number = '$admission_number'")or die(mysql_error());
                                 $catrow = mysqli_fetch_array($cat);
                                 $cate=$cat_row['subjectname'];
                                 $name=$catrow['firstname'].'  '.$catrow['lastname'];
                                 /*
                                                                               if ( $average > 80 ){
                                                                                   $msg = "DISTINCTION";
                                                                                   $area = "Programmer, Software Engineer";
                                                                               }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                   $msg = "Database Administrator, System Analyst";

                                                                               }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                   $msg = "Hardware Technician ";
                                                                               }else if ( $average < 50 ){

                                                                                   $msg = "Typist";
                                                                               }
                                 */
                                 ?>

								 <tr>


									 <td>
										 <center><?php echo $row['admission_number']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $name; ?></center>
									 </td>
									 <td>
										 <center><?php echo $cate ; ?></center>
									 </td>

									 <td>
										 <center><?php echo $row['year']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['theory1']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['practical1']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['ittd1']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['test1']; ?></center>
									 </td>

								 </tr>
                                 <?php
                             }
                             ?>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="set2" class="tab-pane fade" role="tabpanel">
						 <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Set 2 Marks. </label></div>
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>
								 <th></th>
								 <th><center>Adm No.</center></th>
								 <th><center>Course</center></th>
								 <th><center>Year</center></th>
								 <th><center>Theory</center></th>
								 <th><center>Practical</center></th>
								 <th><center>ITTD</center></th>
								 <th><center>Test</center></th>
								 <!--  <th><center>Total</center></th>
                                 <th><center>Average</center></th>
                                 <th><center>Grade</center></th>
                                 <th><center>Area Of Concern</center></th>


                                 <th><center>Rank</center></th> -->


							 </tr>
							 </thead>
							 <tbody>
							 <!--Calculating the totals marks************************************************************************************-->
                             <?php

                             $user_query=mysqli_query($conn,"SELECT * from studentmarks ");
                             while($row=mysqli_fetch_array($user_query)) {
                                 $id=$row['id'];
                                 //  $path=$row['book_path'];
                                 $subject_id=$row['course'];
                                 // $average=  $row['total'] / 4;

                                 $cat_query = mysqli_query($conn,"select * from subjects where id = '$subject_id'")or die(mysql_error());
                                 $cat_row = mysqli_fetch_array($cat_query);
                                 $cate=$cat_row['subjectname'];
                                 /*
                                                                               if ( $average > 80 ){
                                                                                   $msg = "DISTINCTION";
                                                                                   $area = "Programmer, Software Engineer";
                                                                               }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                   $msg = "Database Administrator, System Analyst";

                                                                               }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                   $msg = "Hardware Technician ";
                                                                               }else if ( $average < 50 ){

                                                                                   $msg = "Typist";
                                                                               }
                                 */
                                 ?>

								 <tr>
									 <td width="30">
										 <input id="optionsCheckbox" class="uniform_on" name="selector[]"
										        type="checkbox" value="<?php echo $id; ?>">

									 </td>

									 <td>
										 <center><?php echo $row['admission_number']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $cate ; ?></center>
									 </td>

									 <td>
										 <center><?php echo $row['year']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['theory2']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['practical2']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['ittd2']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['test2']; ?></center>
									 </td>
									 </td>
								 </tr>
                                 <?php
                             }
                             ?>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="set3" class="tab-pane fade" role="tabpanel">
						 <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Set 3 Marks. </label></div>
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>
								 <th></th>
								 <th><center>Adm No.</center></th>
								 <th><center>Course</center></th>
								 <th><center>Year</center></th>
								 <th><center>Practical</center></th>
								 <th><center>ITTD</center></th>

								 <!--  <th><center>Total</center></th>
                                 <th><center>Average</center></th>
                                 <th><center>Grade</center></th>
                                 <th><center>Area Of Concern</center></th>


                              <th><center>Rank</center></th> -->

							 </tr>
							 </thead>
							 <tbody>
							 <!--Calculating the totals marks************************************************************************************-->
                             <?php

                             $user_query=mysqli_query($conn,"SELECT * from studentmarks ");
                             while($row=mysqli_fetch_array($user_query)) {
                                 $id=$row['id'];
                                 //  $path=$row['book_path'];
                                 $subject_id=$row['course'];
                                 // $average=  $row['total'] / 4;

                                 $cat_query = mysqli_query($conn,"select * from subjects where id = '$subject_id'")or die(mysql_error());
                                 $cat_row = mysqli_fetch_array($cat_query);
                                 $cate=$cat_row['subjectname'];
                                 /*
                                                                               if ( $average > 80 ){
                                                                                   $msg = "DISTINCTION";
                                                                                   $area = "Programmer, Software Engineer";
                                                                               }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                   $msg = "Database Administrator, System Analyst";

                                                                               }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                   $msg = "Hardware Technician ";
                                                                               }else if ( $average < 50 ){

                                                                                   $msg = "Typist";
                                                                               }
                                 */
                                 ?>

								 <tr>
									 <td width="30">
										 <input id="optionsCheckbox" class="uniform_on" name="selector[]"
										        type="checkbox" value="<?php echo $id; ?>">

									 </td>

									 <td>
										 <center><?php echo $row['admission_number']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $cate ; ?></center>
									 </td>

									 <td>
										 <center><?php echo $row['year']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['practical3']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['ittd3']; ?></center>
									 </td>

									 </td>
								 </tr>
                                 <?php
                             }
                             ?>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="exam" class="tab-pane fade" role="tabpanel">
						 <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Exam Marks. </label></div>
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>
								 <th></th>
								 <th><center>Adm No.</center></th>
								 <th><center>Subject</center></th>
								 <th><center>Year</center></th>
								 <th><center>Exam Mark</center></th>


								 <!--  <th><center>Total</center></th>
                                 <th><center>Average</center></th>
                                 <th><center>Grade</center></th>
                                 <th><center>Area Of Concern</center></th>


                                 <!--  <th><center>Rank</center></th> -->

							 </tr>
							 </thead>
							 <tbody>
							 <!--Calculating the totals marks************************************************************************************-->
                             <?php

                             $user_query=mysqli_query($conn,"SELECT * from marks ");
                             while($row=mysqli_fetch_array($user_query)) {
                                 $id=$row['id'];
                                 //  $path=$row['book_path'];
                                 $subject_id=$row['subject_id'];
                                 // $average=  $row['total'] / 4;

                                 $cat_query = mysqli_query($conn,"select * from subjects where id = '$subject_id'")or die(mysql_error());
                                 $cat_row = mysqli_fetch_array($cat_query);
                                 $cate=$cat_row['subjectname'];
                                 /*
                                                                               if ( $average > 80 ){
                                                                                   $msg = "DISTINCTION";
                                                                                   $area = "Programmer, Software Engineer";
                                                                               }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                   $msg = "Database Administrator, System Analyst";

                                                                               }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                   $msg = "Hardware Technician ";
                                                                               }else if ( $average < 50 ){

                                                                                   $msg = "Typist";
                                                                               }
                                 */
                                 ?>

								 <tr>
									 <td width="30">
										 <input id="optionsCheckbox" class="uniform_on" name="selector[]"
										        type="checkbox" value="<?php echo $id; ?>">

									 </td>

									 <td>
										 <center><?php echo $row['admission_number']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $cate ; ?></center>
									 </td>

									 <td>
										 <center><?php echo $row['year']; ?></center>
									 </td>
									 <td>
										 <center><?php echo $row['exam_mark']; ?></center>
									 </td>

									 </td>
								 </tr>
                                 <?php
                             }
                             ?>
						 </table>
					 </div>

					 </div>
			 </div>
		 </div>
	 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
  <!--*********************************************************************************-->
<?php
include("footer.php");
?>
