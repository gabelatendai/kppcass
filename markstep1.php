<?php
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
 if (@$_SESSION['role'] == 'lecturer') {

   $email= $_SESSION['id'] ;
     $dep= R::findOne('staff','users_id= ? ',[$email]);
$staff_id = $dep->id;

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

                        </div>
	            </div>
            </div>
        </div>

  <!--*************************************************************************************************************************-->


	<div class="col-lg-12 col-sm-12 col-xs-12">
		<div class="white-box">

			<h4><center><strong>Enter Students Marks</strong></center></h4>
			<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
				<ul role="tablist" class="nav nav-tabs" id="myTabs">
					<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#nc">NC</a></li>
					<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#nd1" aria-expanded="false">ND1</a></li>
					<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#nd3" aria-expanded="false">ND3</a></li>
					<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#hnd" aria-expanded="false">HND</a></li>
					<!--<li class="dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
							<li class=""><a aria-controls="dropdown1" data-toggle="tab" id="dropdown1-tab" role="tab" href="#dropdown1" aria-expanded="true">@fat</a></li>
							<li class=""><a aria-controls="dropdown2" data-toggle="tab" id="dropdown2-tab" role="tab" href="#dropdown2" aria-expanded="false">@mdo</a></li>
						</ul>
					</li>-->
				</ul>
				<div class="tab-content" id="myTabContent">
					<div aria-labelledby="home-tab" id="nc" class="tab-pane fade active in" role="tabpanel">
						<table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							<thead>
							<tr>

								<th style="color: black">Subject</th>

								<th style="color: black">Enter Term 1</th>
								<th style="color: black">Enter Term  2</th>

								<th style="color: black">Enter Term 3</th>
								<!--<th style="color: black">Enter Exam Mark</th>-->
								<th style="color: black">Course Marks</th>
								<th style="color: black">Composite Marks Set</th>
							</tr>
							</thead>
                            <?php
                            $subs= R::findAll('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nc']);
                            $count= R::count('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nc']);
                            if($count){
                            foreach ($subs as $row) {
                            $sub_id= $row->subject_id;

                            $course= R::findOne('subjects', 'id=? ',[$sub_id]);
                            //  $course  = mysqli_fetch_array($user_query);
                            $id = $course ['id'];
                            ?>
							<tbody>



								<tr class="odd gradeX">
									<td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									<!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> -->
									<td >
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
										</div></td>

									</center>
								<!--	<td>

										<center><a button class="btn btn-success" title="Click here to View."
										           href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>-->

									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									</td>
									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									</td>
								</tr>


							</tbody>
                            <?php } ?>
                            <?php }else{ ?>
	                            <td>There are no Subjects registered to you</td>
                            <?php }?>
						</table>
					</div>
					<div aria-labelledby="profile-tab" id="nd1" class="tab-pane fade" role="tabpanel">
						<table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							<thead>
							<tr>

								<th style="color: black">Subject</th>

								<th style="color: black"> Term 1</th>
								<th style="color: black"> Term  2</th>

								<th style="color: black"> Term 3</th>
								<!--<th style="color: black"> Exam Mark</th>-->
								<th style="color: black">Course Marks</th>
								<th style="color: black">Composite Marks Set</th>
							</tr>
							</thead>
     <?php
     $subs= R::findAll('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nd1']);
     $count= R::count('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nd1']);
if($count){
     foreach ($subs as $row) {
         $sub_id= $row->subject_id;

         $course= R::findOne('subjects', 'id=? ',[$sub_id]);
         //  $course  = mysqli_fetch_array($user_query);
         $id = $course ['id'];
         ?>

		 <tbody>


								<tr class="odd gradeX">
									<td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									<!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> -->
									<td >
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
										</div></td>

									</center>
									<!--<td>

										<center><a button class="btn btn-success" title="Click here to View."
										           href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>-->

									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									</td>
									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									</td>
								</tr>
                            <?php } ?>

							</tbody>
 <?php }else{ ?>
	 <td>There are no Subjects registered to you</td>
 <?php }?>
						</table>
					</div>
					<div aria-labelledby="profile-tab" id="nd3" class="tab-pane fade" role="tabpanel">
						<table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							<thead>
							<tr>

								<th style="color: black">Subject</th>

								<th style="color: black">Enter Term 1</th>
								<th style="color: black">Enter Term  2</th>

								<th style="color: black">Enter Term 3</th>
								<!--<th style="color: black">Enter Exam Mark</th>-->
								<th style="color: black">Course Marks</th>
								<th style="color: black">Composite Marks Set</th>
							</tr>
							</thead>
                            <?php
                            $subs= R::findAll('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nd3']);
                            $count= R::count('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'nd3']);
if($count){
                            foreach ($subs as $row) {
                            $sub_id= $row->subject_id;

                            $course= R::findOne('subjects', 'id=? ',[$sub_id]);
                            //  $course  = mysqli_fetch_array($user_query);
                            $id = $course ['id'];
                            ?>
							<tbody>



								<tr class="odd gradeX">
									<td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									<!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> -->
									<td >
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
										</div></td>

									</center>
									

										<!--<td><center><a button class="btn btn-success" title="Click here to View."
										     href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>-->

									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									</td>
									<td>
										<center><a button class="btn btn-success" title="Click here to View."
										           href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									</td>
								</tr>
                            <?php } ?>

							</tbody>
<?php }else{ ?>
	<td>There are no Subjects registered to you</td>
<?php }?>
						</table>
					</div>
					<div aria-labelledby="profile-tab" id="hnd" class="tab-pane fade" role="tabpanel">
						<table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							<thead>
							<tr>

								<th style="color: black">Subject</th>

								<th style="color: black">Enter Term 1</th>
								<th style="color: black">Enter Term  2</th>

								<th style="color: black">Enter Term 3</th>
							<!--	<th style="color: black">Enter Exam Mark</th>-->
								<th style="color: black">Course Marks</th>
								<th style="color: black">Composite Marks Set</th>
							</tr>
							</thead>
                            <?php
                            $subs= R::findAll('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'hnd']);
                            $count= R::count('staffsubs', 'staff_id=? AND subject_level=? ',[$staff_id,'hnd']);
if($count){
                            foreach ($subs as $row) {
                            $sub_id= $row->subject_id;

                            $course= R::findOne('subjects', 'id=? ',[$sub_id]);
                            //  $course  = mysqli_fetch_array($user_query);
                            $id = $course ['id'];
                            ?>
							<tbody>



								<tr class="odd gradeX">
									<td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									<!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> -->
									<td >
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
									</td><td>
										<div class="input-group-btn">
											<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												<li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												<li role="separator" class="divider"></li></ul>
										</div></td>

									</center>
									<!--<td>

										<center><a button class="btn btn-success" title="Click here to View."
										           href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>-->

									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									</td>
									<td >
										<center><a button class="btn btn-success" title="Click here to View."
										           href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									</td>
								</tr>
                            <?php } ?>

							</tbody>
 <?php }else{ ?>
	 <td>There are no Subjects registered to you</td>
 <?php }?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

               
<!--****************************************************************************-->

     <?php }else { ?>

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

				 </div>
			 </div>
		 </div>
	 </div>

	 <!--*************************************************************************************************************************-->


	 <div class="col-lg-12 col-sm-12 col-xs-12">
		 <div class="white-box">
			 <h4><center><strong>View Students Marks according to their respective Subjects</strong></center></h4>
			 <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
				 <ul role="tablist" class="nav nav-tabs" id="myTabs">
					 <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#nc">NC</a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#nd1" aria-expanded="false">ND1</a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#nd3" aria-expanded="false">ND3</a></li>
					 <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#hnd" aria-expanded="false">HND</a></li>
					 <!--<li class="dropdown" role="presentation"> <a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="false">Dropdown <span class="caret"></span></a>
                         <ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
                             <li class=""><a aria-controls="dropdown1" data-toggle="tab" id="dropdown1-tab" role="tab" href="#dropdown1" aria-expanded="true">@fat</a></li>
                             <li class=""><a aria-controls="dropdown2" data-toggle="tab" id="dropdown2-tab" role="tab" href="#dropdown2" aria-expanded="false">@mdo</a></li>
                         </ul>
                     </li>-->
				 </ul>
				 <div class="tab-content" id="myTabContent">
					 <div aria-labelledby="home-tab" id="nc" class="tab-pane fade active in" role="tabpanel">
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>

								 <th style="color: black">Subject</th>

								<!-- <th style="color: black">Enter Set 1</th>
								 <th style="color: black">Enter Set  2</th>

								 <th style="color: black">Enter Set 3</th>
								 <th style="color: black">Enter Exam Mark</th>-->
								 <th style="color: black">Course Marks</th>
								 <th style="color: black">Composite Marks Set</th>
							 </tr>
							 </thead>
							 <tbody>

                             <?php
                             include "config.php";

                             $sql="SELECT * FROM subjects  Where level = 'nc'";
                             $user_query=mysqli_query($conn,$sql) or die("error getting data");
                             while($course  = mysqli_fetch_array($user_query)){
                                 $id = $course ['id'];
                                 ?>

								 <tr class="odd gradeX">
									 <td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									 <!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> ->
									 <td >
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li>
											 </ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
										 </div></td>
									 <td>

										 <center><a button class="btn btn-success" title="Click here to View."
										            href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>
-->
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									 </td>
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									 </td>
								 </tr>
                             <?php } ?>

							 </tbody>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="nd1" class="tab-pane fade" role="tabpanel">
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>

								 <th style="color: black">Subject</th>

								<!-- <th style="color: black">Enter Set 1</th>
								 <th style="color: black">Enter Set  2</th>

								 <th style="color: black">Enter Set 3</th>
								 <th style="color: black">Enter Exam Mark</th>-->
								 <th style="color: black">Course Marks</th>
								 <th style="color: black">Composite Marks Set</th>
							 </tr>
							 </thead>
							 <tbody>

                             <?php
                             include "config.php";

                             $sql="SELECT * FROM subjects  Where level = 'nd1'";
                             $user_query=mysqli_query($conn,$sql) or die("error getting data");
                             while($course  = mysqli_fetch_array($user_query)){
                                 $id = $course ['id'];
                                 ?>

								 <tr class="odd gradeX">
									 <td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									 <!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> --
									 <td >
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
										 </div></td>
									 <td>

										 <center><a button class="btn btn-success" title="Click here to View."
										            href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>
-->
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									 </td>
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									 </td>
								 </tr>
                             <?php } ?>

							 </tbody>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="nd3" class="tab-pane fade" role="tabpanel">
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>

							 <th style="color: black">Subject</th>
								 <!--
                                                              <th style="color: black">Enter Set 1</th>
                                                              <th style="color: black">Enter Set  2</th>

                                                              <th style="color: black">Enter Set 3</th>
                                                              <th style="color: black">Enter Exam Mark</th>-->
								 <th style="color: black">Course Marks</th>
								 <th style="color: black">Composite Marks Set</th>
							 </tr>
							 </thead>
							 <tbody>

                             <?php

                             $sql="SELECT * FROM subjects  Where level = 'nd3'";
                             $user_query=mysqli_query($conn,$sql) or die("error getting data");
                             while($course  = mysqli_fetch_array($user_query)){
                                 $id = $course ['id'];
                                 ?>

								 <tr class="odd gradeX">
									 <td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									 <!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> ->
									 <td >
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
										 </div></td>
									 <td>

										 <center><a button class="btn btn-success" title="Click here to View."
										            href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>
-->
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									 </td>
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									 </td>
								 </tr>
                             <?php } ?>

							 </tbody>
						 </table>
					 </div>
					 <div aria-labelledby="profile-tab" id="hnd" class="tab-pane fade" role="tabpanel">
						 <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

							 <thead>
							 <tr>

								 <th style="color: black">Subject</th>

								<!-- <th style="color: black">Enter Set 1</th>
								 <th style="color: black">Enter Set  2</th>

								 <th style="color: black">Enter Set 3</th>
								 <th style="color: black">Enter Exam Mark</th>-->
								 <th style="color: black">Course Marks</th>
								 <th style="color: black">Composite Marks Set</th>
							 </tr>
							 </thead>
							 <tbody>

                             <?php

                             $sql="SELECT * FROM subjects  Where level = 'hnd'";
                             $user_query=mysqli_query($conn,$sql) or die("error getting data");
                             while($course  = mysqli_fetch_array($user_query)){
                                 $id = $course ['id'];
                                 ?>

								 <tr class="odd gradeX">
									 <td style="color: black"><strong><?php   echo $course['subjectname'];  ?><strong></td>

									 <!--   <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="markstep2?course=<?php //echo $id ;?>">View Students</a></center></td> ->
									 <td >
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="markstep_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="markstep_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_theory?course=<?php echo $id ?>"><b>Theory</b></a></li>
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set2_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set2_test?course=<?php echo $id ?>"><b> <p>Test</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
									 </td>
									 <td>
										 <div class="input-group-btn">
											 <button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter Marks <span class="caret pull-right"></span></button>
											 <ul class="dropdown-menu dropdown-menu-right">
												 <li><a role="menuitem" tabindex="-1" class="pull-right" href="set3_prac?course=<?php echo $id ?>"><b>Practical</b></a></li>
												 <li><a class="pull-right" role="menuitem" tabindex="-1" href="set3_ittd?course=<?php echo $id ?>"><b> <p>ITTD</p></b></a></li>

												 <li role="separator" class="divider"></li></ul>
										 </div></td>
									 <td>

										 <center><a button class="btn btn-success" title="Click here to View."
										            href="final_exam?course=<?php echo $id ;?>">Enter Exam Marks</a></center></td>
-->
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="course_mark?course=<?php echo $id ;?>">View Course Mark</a></center></td>
									 </td>
									 <td >
										 <center><a button class="btn btn-success" title="Click here to View."
										            href="composite_marks?course=<?php echo $id ;?>">Composite Mark Set</a></center></td>
									 </td>
								 </tr>
                             <?php } ?>

							 </tbody>
						 </table>
					 </div>
				 </div>
			 </div>
		 </div>
	 </div>

     <?php
 }
include("footer.php");
?>