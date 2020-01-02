<?php
include("connect.php");
?>
<!--*****************Analysis data*****************************-->

<?php
include "header.php";
$cos= $_SESSION['course_id'];
$email =$_SESSION['id'];
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
if (@$_SESSION['role'] == 'student'){
$init = R::findOne('users', 'course_id  = ?', [$cos]);

$ini = R::findOne('students', 'email = ? AND course_id = ?', [$email, $cos]);
$s=$ini->level;
$cos_id=$ini->course_id;
//$date= date();
$count = R::count('assignments', 'course_id = ? AND level = ?', [$cos, $s]);
}
  ?>
	<div class="col-md-offset-1">

	<?php

		if (@$_SESSION['role'] == 'lecturer'){  ?>

		<h1 class="text-center">Lecturer Dashboard</h1>
                    <div class="col-lg-3 col-xs-3">

                        <div class="span6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="span3 inner">
                                                <i class="fa fa-users fa-5x pull-right ">
                                                </i>
                                            </div>
                                            <div class="span8 ">
                                                <!--<div  style="font-size: large"><?php #echo $num_rows; ?></div>-->
                                                <strong>Students</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="viewstudents">
                                    <div class="modal-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right">
                                    <div class="clearfix"></div>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd -->
                    <div class="col-lg-3 col-xs-3">

                        <div class="span6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <i class="fa fa-users fa-5x pull-right">
                                                </i>
                                            </div>
                                            <div class="span8 ">
                                                <!--<div  style="font-size: large"></div>-->
                                                <strong>Upload Assignment </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="add_assignment">
                                    <div class="modal-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- third -->

                    <div class="col-lg-3 col-xs-3">

                        <div class="span6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <i class="fa fa-book fa-5x pull-right" >
                                                </i>
                                            </div>
                                            <div class="span8 ">
                                                <!--<div  style="font-size: large"></div>-->
                                                <strong>View Assignments</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="view_uploaded_assignmnts">
                                    <div class="modal-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- 4th -->


                    <div class="col-lg-3 col-xs-3">

                        <div class="span6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <i class="fa fa-tasks fa-5x pull-right">
                                                </i>
                                            </div>
                                            <div class="span8 ">
                                                <!--<div  style="font-size: large"></div>-->
                                                <strong> Record Marks</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="markstep1">
                                    <div class="modal-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h3>Other Options</h3>
                    <div class="separator"></div>

                    

                    <!-- 7th-->
                    <div class="col-lg-3 col-xs-3" >
                        <div class="span6">
                            <div class="panel panel-primary " >
                                <div class="panel-heading">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <i class="fa fa-pencil fa-5x pull-right"></i>
                                            </div>
                                            <div class="span8 ">

                                                <strong>View Students Marks </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="markstep2">
                                    <div class="modal-footer">
                                        <span class="pull-left">More Information</span>
                                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

        <?php }elseif (@$_SESSION['role'] == 'student') {
		?>
		<h1 class="text-center">Student Dashboard</h1>
		<div class="col-lg-4 col-xs-4" >
			<div class="span6">
				<div class="panel panel-primary " >
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-pencil fa-5x pull-right"></i>
								</div>
								<div class="span8 ">

									<strong>Submit Assignment</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="upload_assignment">
						<div class="modal-footer">
							<span class="pull-left">More Information</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xs-4" >
			<div class="span6">
				<div class="panel panel-primary " >
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-pencil fa-5x pull-right"></i>
								</div>
								<div class="span8 ">

									<strong>View My Course Work</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="individual_marks">
						<div class="modal-footer">
							<span class="pull-left">More Information</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xs-4" >
			<div class="span6">
				<div class="panel panel-primary " >
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
								<?php echo $count; ?>	<i class="fa fa-pencil fa-5x pull-right"></i>
								</div>
								<div class="span8 ">

									<strong>Assignments</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="view_assignments">
						<div class="modal-footer">
							<span class="pull-left">More Information</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	
		<h3>My Subjects</h3>
		<div class="separator"></div>
		<?php 
		$subject= R::findAll('subjects', 'course_id = ? AND level = ?', [$cos, $s]);

foreach ($subject as $subs){
?>
		<div class="col-lg-3 col-xs-3"   >
			<div class="span6" >
				<div class="panel panel-primary "  >
					<div class="panel-heading" style="background-color:green" >
						<div class="container-fluid" >
							<div class="row-fluid">
								<div class="span3">
								<i class="fa fa-pencil fa-5x pull-right"></i>
								</div>
								<div class="span8 ">

									<strong><?php echo $subs->subjectname; ?>	</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="subject?id=<?php echo $subs->id ;?>">
						<div class="modal-footer">
							<span class="pull-left">More Information</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
                    <!--    8th -->
		<?php
}
	}else{ ?>

			<h1 class="text-center">Administrator Dashboard</h1>
		<div class="col-lg-3 col-xs-3">

			<div class="span6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3 inner">
									<i class="fa fa-users fa-5x pull-right ">
									</i>
								</div>
								<div class="span8 ">
									<!--<div  style="font-size: large"><?php #echo $num_rows; ?></div>-->
									<strong>Students</strong>
								</div>
							</div>
						</div>
					</div>

					<a href="viewstudents">
						<div class="modal-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right">
                                    <div class="clearfix"></div>
						</div>

					</a>
				</div>
			</div>
		</div>
		<!-- 2nd -->
		<div class="col-lg-3 col-xs-3">

			<div class="span6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-users fa-5x pull-right">
									</i>
								</div>
								<div class="span8 ">
									<!--<div  style="font-size: large"></div>-->
									<strong>Staff </strong>
								</div>
							</div>
						</div>
					</div>
					<a href="viewstaff">
						<div class="modal-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
    
		<!-- third -->
		<div class="col-lg-3 col-xs-3">

			<div class="span6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-book fa-5x pull-right" >
									</i>
								</div>
								<div class="span8 ">
									<!--<div  style="font-size: large"></div>-->
									<strong>Assignments</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div class="modal-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- 4th -->


		<div class="col-lg-3 col-xs-3">

			<div class="span6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-tasks fa-5x pull-right">
									</i>
								</div>
								<div class="span8 ">
									<!--<div  style="font-size: large"></div>-->
									<strong> Courses</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="courses">
						<div class="modal-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<h3>Other Options</h3>
		<div class="separator"></div>

		<!-- 5th -->


		<div class="col-lg-3 col-xs-3">
			<div class="span6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-tasks fa-5x pull-right">
									</i>
								</div>
								<div class="span8">
									<!--<div  style="font-size: large"><?php #echo $num_rows; ?></div>-->
									<strong>Departments</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="departments">
						<div class="modal-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div> </div>
		<!-- 6th -->
		<div class="col-lg-3 col-xs-3">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span3">
								<i class="fa fa-pencil fa-5x  pull-right">
								</i>
							</div>
							<div class="span8">
								<!--<div  style="font-size: large"><?php #echo $num_rows; ?></div>-->
								<strong>Record Marks</strong>
							</div>
						</div>
					</div>
				</div>
				<a href="markstep1.php">
					<div class="modal-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="icon-chevron-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>

		</div>


		<!-- 7th-->
		<div class="col-lg-3 col-xs-3" >
			<div class="span6">
				<div class="panel panel-primary " >
					<div class="panel-heading">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span3">
									<i class="fa fa-pencil fa-5x pull-right"></i>
								</div>
								<div class="span8 ">

									<strong>Student Perfomace</strong>
								</div>
							</div>
						</div>
					</div>
					<a href="markstep2">
						<div class="modal-footer">
							<span class="pull-left">More Information</span>
							<span class="pull-right"><i class="icon-chevron-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
        <?php } ?>

                </div>
  <!--*********************************************************************************-->
                <?php

                include "footer.php";
                ?>

