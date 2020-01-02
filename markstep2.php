<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 14:24
 */
?>
<?php include ('header.php');
include 'config.php';
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
///$id = $_GET['course'];
//$cos= mysql_query("select * from course where id = '$id' ");
//$cosy= mysql_fetch_array ($cos);

//$student = $_GET['student'];
?>
<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

              <?php include "mark_header.php"; ?>
                <br>

            </div></div>
        <h3 align="center"> Select Student </h3>
    </div>
    <div class="x_content">
        <!-- content starts here -->

        <div id="div-id-name">
	        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
		        <ul role="tablist" class="nav nav-tabs" id="myTabs">
			        <li class=" active dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">NC Students <span class="caret"></span></a>
				        <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nc-jan" aria-expanded="true">January</a></li>
					        <li class=""><a aria-controls="female" data-toggle="tab" id="dropdown2-tab" role="tab" href="#nc-may" aria-expanded="false"> May</a></li>
				        </ul>
			        </li>
			        <li class=" dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">ND1 Students <span class="caret"></span></a>
				        <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd1-jan" aria-expanded="true">January</a></li>
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd1-may" aria-expanded="true">May </a></li>
				        </ul>
			        </li>
			        <li class=" dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">ND2 Students <span class="caret"></span></a>
				        <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd2-jan" aria-expanded="true">January</a></li>
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd2-may" aria-expanded="true">May </a></li>
				        </ul>
			        </li>
			        <li class=" dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">ND3 Students <span class="caret"></span></a>
				        <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd3-jan" aria-expanded="true">January</a></li>
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#nd3-may" aria-expanded="true">May </a></li>
				        </ul>
			        </li>
			        <li class=" dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">HND Students <span class="caret"></span></a>
				        <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#hnd-jan" aria-expanded="true">January</a></li>
					        <li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab" href="#hnd-may" aria-expanded="true">May </a></li>
				        </ul>
			        </li>

		        </ul>
		        <div class="tab-content" id="myTabContent">
			        <!----national certificate--->
			        <div aria-labelledby="dropdown1-tab" id="nc-jan" class="tab-pane fade active in " role="tabpanel">
				        <h3 class="text-center"> NATIONAL CERTIFICATE January Intake (NC) Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#home5">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile5" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="home5" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nc','male','0']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nc','male','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                  <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="profile5" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nc','female','0']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nc','female','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>
			        <div aria-labelledby="dropdown1-tab" id="nc-may" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL CERTIFICATE May Intake (NC) Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nc-may">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nc-may" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nc-may" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nc','male','1']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nc','male','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nc-may" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nc','female','1']);

                                    ?>                              <h3 class="text-center">Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nc','female','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>

			        <!----national Diploma 1--->
			        <div aria-labelledby="dropdown1-tab" id="nd1-jan" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL Diploma 1(ND1) January Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd1-jan">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd1-jan" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd1-jan" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','male','0']);

                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','male','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd1-jan" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','female','0']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','female','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>
			        <div aria-labelledby="dropdown1-tab" id="nd1-may" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL DIPLOMA 1(ND1) May Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd1-may">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd1-may" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd1-may" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','male','1']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','male','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd1-may" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','female','1']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd1','female','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>

			        <!----national Diploma 2--->
			        <div aria-labelledby="dropdown1-tab" id="nd2-jan" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL Diploma 2(ND2) January Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd2-jan">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd2-jan" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd2-jan" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','male','0']);

                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','male','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd2-jan" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','female','0']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','female','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>
			        <div aria-labelledby="dropdown1-tab" id="nd2-may" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL DIPLOMA 2(ND2) May Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd2-may">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd2-may" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd2-may" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','male','1']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','male','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd2-may" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','female','1']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd2','female','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>

			        <!---- national Diploma 3--->
			        <div aria-labelledby="dropdown1-tab" id="nd3-jan" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL Diploma 3(ND3) January Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd3-jan">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd3-jan" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd3-jan" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','male','0']);

                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','male','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd3-jan" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','female','0']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','female','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>
			        <div aria-labelledby="dropdown1-tab" id="nd3-may" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center"> NATIONAL DIPLOMA 3(nd3) May Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd3-may">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd3-may" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-nd3-may" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','male','1']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','male','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-nd3-may" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','female','1']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['nd3','female','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>

			        <!----Higher national Diploma --->
			        <div aria-labelledby="dropdown1-tab" id="hnd-jan" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center">Higher NATIONAL Diploma (hnd) January Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-hnd-jan">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-hnd-jan" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-hnd-jan" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','male','0']);

                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','male','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-hnd-jan" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','female','0']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','female','0']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
													<?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>
			        <div aria-labelledby="dropdown1-tab" id="hnd-may" class="tab-pane fade " role="tabpanel">
				        <h3 class="text-center">Higher NATIONAL DIPLOMA (HND) May Intake Students List </h3>

				        <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					        <ul role="tablist" class="nav nav-tabs" id="myTabs">
						        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-hnd-may">Male</a></li>
						        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-hnd-may" aria-expanded="false">Female</a></li>
					        </ul>
					        <div class="tab-content" id="myTabContent">
						        <div aria-labelledby="home-tab" id="male-hnd-may" class="tab-pane fade active in" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','male','1']);

                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                              <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>View</center></th>
	                                                <th><center>Print</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','male','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
						        <div aria-labelledby="profile-tab" id="female-hnd-may" class="tab-pane fade" role="tabpanel">
                                    <?php
                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','female','1']);

                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

							        <div class="table-responsive col-md-offset-1">
								        <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

									        <thead>
									        <tr>
										        <th></th>
										        <th><center>Adm No.</center></th>
										        <th><center>Name</center></th>
										        <th><center>Gender</center></th>
										        <th><center>Email Address</center></th>
										        <th><center>Mobile</center></th>
										        <th><center>Address</center></th>
										        <th><center>Reg. Date</center></th>
                                                <?php  if(@$_SESSION['role'] != 'student' ){ ?>
											        <th><center>Edit</center></th>
											        <th><center>Delete</center></th>
                                                <?php } ?>
									        </tr>
									        </thead>
									        <tbody>
                                            <?php
                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                            $courses = R::findAll('students', 'level = ? AND gender = ? AND intake =? ', ['hnd','female','1']);


                                            foreach ($courses as $course) {
                                                $id= $course->id;
                                                ?>

										        <tr>
											        <td width="30">
												        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											        </td>
											         <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                       
											        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
											        <td><center><?php echo  $course->gender; ?></center></td>
											        <td><center><?php echo  $course->email; ?></center></td>

											        <td><center><?php echo $course->mobile; ?></center></td>

											        <td><center><?php echo  $course->address; ?></center></td>
											        <td><center><?php echo  $course->date;  ?></center></td>
                                                   <?php  if(@$_SESSION['role'] != 'student' ){ ?>
												        <td>
													        <center>
														        <a href="stud_marks?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link">View Marks</a>
													        </center></td>
												        <td>
													        <center><a href="markstep7<?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                                                    <?php } ?>

										        </tr>
                                            <?php } ?>
									        </tbody>
								        </table> </div>
						        </div>
					        </div>
				        </div>

			        </div>








		        </div>
	        </div>
           <!-- <div class="table-responsive col-md-offset-1">
                <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                    <thead>

                        <th><center>Adm No.</center></th>
                        <th><center>Stdent Name</center></th>
                        <th><center>Gender</center></th>
                        <th><center>Email Address</center></th>
                        <th><center>Mobile</center></th>
                        <th><center>Address</center></th>
                        <th><center>Reg. Date</center></th>
                        <th><center>Edit</center></th>
                        <th><center>print</center></th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $courses = R::findAll('students');

                    foreach ($courses as $course) {
                    $id= $course->id;
                    ?>

                    <tr>

                        <td><a href="stud_marks.php?admission_number=<?php echo $course->admission_number;?>" class="btn btn-link"><?php echo $course->admission_number; ?></a></center></td>
                        <td><center><?php echo  $course->firstname. "  ". $course->lastname ; ?></center></td>
                        <td><center><?php echo  $course->gender; ?></center></td>
                        <td><center><?php echo  $course->email; ?></center></td>

                        <td><center> <?php echo $course->mobile; ?></center></center></td>

                        <td><center><?php echo  $course->address; ?></center></td>
                        <td><center><?php echo  $course->date;  ?></center></td>

                        <td>
                            <center><a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></center></td>
                        <td>
                        <center><a href="markstep7.php <?php echo  '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Print Transcript</a></center></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>-->
        </div>

        <!-- content ends here -->
    </div>
</div>
</div>
</div>

<?php include ('footer.php'); ?>
<script language="javascript" type="text/javascript">
    $(window).load(function()
    {
        $('#loading').hide();
    });
</script>