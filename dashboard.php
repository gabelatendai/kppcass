<?php
include  'side-topbar.php';
?>
<?php

$cos= $_SESSION['course_id'];
$id =$_SESSION['id'];

//R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
if (@$_SESSION['role'] == 'student'){
$init = R::findOne('users', 'course_id  = ?', [$cos]);

$ini = R::findOne('students', 'users_id = ? AND course_id = ?', [$id, $cos]);
$s=$ini->level;
$cos_id=$ini->course_id;
$id_num= $ini->admission_number;
//$date= date();
$count = R::count('assignments', 'course_id = ? AND level = ?', [$cos, $s]);
}
  ?>
<section class="content-header">
	<marque><h4 class="text-center">
		Welcome to Kushinga Phikelela Polytechnic Continuous Assessment System

		</h4></marque>
</section>
			<?php

if (@$_SESSION['role'] == 'lecturer'){
    $staff = R::findOne('staff', 'users_id  = ?', [$id]);
    $staff_id= $staff->id;
	?>

	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class="text-center">
			Lecturer Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
           <div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><a href="markstep1" style="color: white"><i class="ion ion-edit"></i></a></h3>

							<p>Record Marks</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="markstep1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><i class="ion ion-bag"></i></h3>

							<p>Upload Assignments</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="add_assignment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><i class="ion ion-bag"></i></h3>

							<p>Students</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="viewstudents" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><i class="ion ion-stats-bars"></i></h3>

							<p>View Assignments</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-book"></i>
						</div>
						<a href="view_uploaded_assignmnts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
	           <h3>My Subjects</h3>
	           <div class="separator"></div>
               <?php
               $sub= R::findAll('staffsubs', 'staff_id = ?', [$staff_id]);

               foreach ($sub as $subs){
                   $subject_id= $subs->subject_id;
                   $subname= R::findOne('subjects', 'id = ?', [$subject_id]);

                   ?>
		           <div class="col-lg-3 col-xs-6">
			           <!-- small box -->
			           <div class="small-box bg-red">
				           <div class="inner">
					           <h3><i class="ion ion-ios-book"></i></h3>

					           <p><?php echo $subname->subjectname; ?></p>
				           </div>
				           <div class="icon">
					           <i class="ion ion-ios-book"></i>
				           </div>
				           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			           </div>
		           </div>
               <?php } ?>
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<!-- Main content -->
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Students Statistics</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-8">
								<p class="text-center">
									<strong>Registered Students 2019</strong>
								</p>

								<div class="chart">
									<!-- Sales Chart Canvas -->
									<div class="chart" id="bar-chart" style="height: 300px;"></div>									 </div>
								<!-- /.chart-responsive -->
							</div>
							<!-- /.col -->
							<div class="col-md-4">
								<p class="text-center">
									<strong>Key</strong>
								</p>
								<div class="progress-group">
									<span class="progress-text">Male Student</span>
									<div class="progress sm">
										<div class="progress-bar progress-bar-green" style="width: 100%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
								<div class="progress-group">
									<span class="progress-text">Female Students</span>
									<div class="progress sm">
										<div class="progress-bar progress-bar-red" style="width: 100%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- ./box-body -->
					<div class="box-footer">
                        <?php
                        $nc= R::count('students', 'level = ?', ['nc']);
                        $all= R::count('students', 'course_id = ?', ['1']);
                        $nd1= R::count('students', 'level =  ?', ['nd1']);
                        $nd2 = R::count('students', 'level = ? ', ['nd2']);
                        $nd3 = R::count('students', 'level = ? ', ['nd3']);
                        $hnd = R::count('students', 'level = ? ', ['hnd']);

                        ?>
						<div class="row">
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
								
									<h5 class="description-header"><?php echo $nc ?></h5>
									<span class="description-text"> N C Students</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
										 <span class="description-percentage text-yellow">
											 <i class="fa fa-caret-left"></i>  <?php
                                             $percent= $nd1/$all * 100;
                                             echo  round( $percent,0);
                                             ?>%</span>
									<h5 class="description-header"><?php echo $nd1 ?></h5>
									<span class="description-text">ND1 Students</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
										 <span class="description-percentage text-green">
											 <i class="fa fa-caret-up"></i>  <?php
                                             $percent= $nd2/$all * 100;
                                             echo  round( $percent,0);
                                             ?>%</span>
									<h5 class="description-header"><?php echo $nd2 ?></h5>
									<span class="description-text">ND2 Students</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
									<h5 class="description-header"><?php echo $nd3 ?></h5>
									<span class="description-text">ND3 Students</span>
								</div>
								<!-- /.description-block -->
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
										 <span class="description-percentage text-red">
											 <i class="fa fa-caret-down"></i>  <?php
                                             $percent= $hnd/$all * 100;
                                             echo  round( $percent,0);
                                             ?>%</span>
									<h5 class="description-header"><?php echo $hnd ?></h5>
									<span class="description-text">HND Students</span>
								</div>
								<!-- /.description-block -->
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	</section>
</div>

			<!-- /.content -->
			<!-- /.row (main row) -->
            <?php  }
            elseif(@$_SESSION['role'] == 'student') {  ?>


				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1 class="text-center">
						Student	Dashboard
							<small>Control panel</small>
						</h1>
						<ol class="breadcrumb">
							<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ol>
					</section>

					<!-- Main content -->
					<section class="content">
						<!-- Small boxes (Stat box) -->
	            <div class="row">
            <div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><i class="ion ion-stats-bars"></i></h3>

						<p>Submit Assignments</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="upload_assignment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><i class="ion ion-stats-bars"></i></h3>

						<p>My Course Work</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="individual_marks" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><i class="ion ion-stats-bars"></i></h3>

						<p>View Assignments</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="view_assignments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<h3>My Subjects</h3>
		<div class="separator"></div>
			<?php
		$subject= R::findAll('subjects', 'course_id = ? AND level = ?', [$cos, $s]);

foreach ($subject as $subs){
?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
                   <h3><i class="ion ion-ios-book"></i></h3>

						<p><?php echo $subs->subjectname; ?></p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-book"></i>
					</div>
					<a href="subject?id=<?php echo $subs->id ;?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
<?php } ?>
			<!-- ./col -->
			<!-- -->
	     </div>

					</section>
				</div>
 <?php }
 else {
     ?>

	 <div class="content-wrapper">
		 <!-- Content Header (Page header) -->
		 <section class="content-header">
			 <h1 class="text-center">
				 Administrator Dashboard
				 <small>Control panel</small>
			 </h1>
			 <ol class="breadcrumb">
				 <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
				 <li class="active">Dashboard</li>
			 </ol>
		 </section>

		 <!-- Main content -->
		 <section class="content">
			 <!-- Small boxes (Stat box) -->
			 <div class="row">
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-orange">
						 <div class="inner">
							 <h3> <a  href="divisions" style="color: white"> <i class="ion-ios-plus-outline"></i></a></i></h3>

							 <p>Divisions </p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-person-add"></i>
						 </div>
						 <a href="divisions" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-red">
						 <div class="inner">
							 <h3><a  href="departments" style="color: white"> <i class="ion-ios-plus-outline"></i></a></h3>

							 <p>Departments </p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-person-add"></i>
						 </div>
						 <a href="departments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>

				 <!-- ./col -->
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-green">
						 <div class="inner">
							 <h3><a href="courses" style="color: white"><i class="ion-ios-plus-empty"></i></a></h3>

							 <p>Displines/Courses</p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-stats-bars"></i>
						 </div>
						 <a href="courses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-aqua">
						 <div class="inner">
							 <h3><a href="subjects" style="color: white"><i class="ion-ios-plus-empty"></i></a></h3>

							 <p>Subjects</p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-bag"></i>
						 </div>
						 <a href="subjects" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <!-- ./col -->
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-yellow">
						 <div class="inner">
							 <h3> <a href="students"  style="color: white"><i class="ion ion-person-add"></i></a></h3>

							 <p>Students</p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-person-add"></i>
						 </div>
						 <a href="viewstudents" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <!-- ./col -->
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-red">
						 <div class="inner">
							 <h3> <i class="ion ion-person-add"></i></h3>

							 <p>Staff </p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-person-add"></i>
						 </div>
						 <a href="viewstaff" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-aqua">
						 <div class="inner">
							 <h3><i class="ion-android-locate"></i></h3>

							 <p>View Marks</p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-bag"></i>
						 </div>
						 <a href="markstep1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>
				 <div class="col-lg-3 col-xs-6">
					 <!-- small box -->
					 <div class="small-box bg-red">
						 <div class="inner">
							 <h3> <i class="ion ion-ios-book"></i></h3>

							 <p>Students Course Work </p>
						 </div>
						 <div class="icon">
							 <i class="ion ion-ios-book"></i>
						 </div>
						 <a href="markstep2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					 </div>
				 </div>

				 <!-- ./col -->
				 <!-- -->
			 </div>
			 <div class="row">
				 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

				 <div class="col-md-12">
					 <div class="box">
						 <div class="box-header with-border">
							 <h3 class="box-title">Students Statistics</h3>

							 <div class="box-tools pull-right">
								 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								 </button>
								 <div class="btn-group">
									 <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
										 <i class="fa fa-wrench"></i></button>
									 <ul class="dropdown-menu" role="menu">
										 <li><a href="#">Action</a></li>
										 <li><a href="#">Another action</a></li>
										 <li><a href="#">Something else here</a></li>
										 <li class="divider"></li>
										 <li><a href="#">Separated link</a></li>
									 </ul>
								 </div>
								 <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							 </div>
						 </div>
						 <!-- /.box-header -->
						 <div class="box-body">
							 <div class="row">
								 <div class="col-md-8">
									 <p class="text-center">
										 <strong>January Intake Students 2019</strong>
									 </p>

									 <div class="chart">
										 <!-- Sales Chart Canvas -->
										 <div class="chart" id="bar-chart" style="height: 300px;"></div>									 </div>
									 <!-- /.chart-responsive -->
								 </div>
								 <!-- /.col -->
								 <div class="col-md-4">
									 <p class="text-center">
										 <strong>Key</strong>
									 </p>
									 <div class="progress-group">
										 <span class="progress-text">Male Student</span>
										 <div class="progress sm">
											 <div class="progress-bar progress-bar-blue" style="width: 100%;background-color: blue"></div>
										 </div>
									 </div>
									 <!-- /.progress-group -->
									 <div class="progress-group">
										 <span class="progress-text">Female Students</span>
										 <div class="progress sm">
											 <div class="progress-bar progress-bar-skyblue" style="width: 100%;background-color: skyblue"></div>
										 </div>
									 </div>
									 <!-- /.progress-group -->
								 </div>
								 <!-- /.col -->
							 </div>
							 <!-- /.row -->
						 </div>
						 <div class="box-footer">
                             <?php
                             $nc= R::count('students', 'level = ? AND intake = ?', ['nc','0']);
                             $alljan= R::count('students', 'intake = ?', ['0']);
                             $nd1= R::count('students', 'level =  ?  AND intake = ?', ['nd1','0']);
                             $nd2 = R::count('students', 'level = ?   AND intake = ?', ['nd2','0']);
                             $nd3 = R::count('students', 'level = ?  AND intake = ?', ['nd3','0']);
                             $hnd = R::count('students', 'level = ?   AND intake = ?', ['hnd','0']);

                             ?>
							 <div class="row">
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
								
										 <h5 class="description-header"><?php echo $nc ?></h5>
										 <span class="description-text"> N C Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
										
										 <h5 class="description-header"><?php echo $nd1 ?></h5>
										 <span class="description-text">ND1 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
										 <h5 class="description-header"><?php echo $nd2 ?></h5>
										 <span class="description-text">ND2 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->

								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">
										 <h5 class="description-header"><?php echo $nd3 ?></h5>
										 <span class="description-text">ND3 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">

										 <h5 class="description-header"><?php echo $hnd ?></h5>
										 <span class="description-text">HND Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">

										 <h1 class="description-header"><?php echo $alljan ?></h1>
										 <span class="description-text">January Intake Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
							 </div>
							 <!-- /.row -->
						 </div>
						 <div class="box-body">
							 <div class="row">
								 <div class="col-md-8">
									 <p class="text-center">
										 <strong>May Intake Students 2019</strong>
									 </p>

									 <div class="chart">
										 <!-- Sales Chart Canvas -->
										 <div class="chart" id="chart" style="height: 300px;"></div>									 </div>
									 <!-- /.chart-responsive -->
								 </div>
								 <!-- /.col -->
								 <div class="col-md-4">
									 <p class="text-center">
										 <strong>Key</strong>
									 </p>
									 <div class="progress-group">
										 <span class="progress-text">Male Student</span>
										 <div class="progress sm">
											 <div class="progress-bar progress-bar-green" style="width: 100%;background-color: blue"">
										 </div>
										 </div>
								 </div>
									 <!-- /.progress-group -->
									 <div class="progress-group">
										 <span class="progress-text">Female Students</span>
										 <div class="progress sm">
											 <div class="progress-bar progress-bar-red" style="width: 100%;background-color: skyblue""></div>
										 </div>
									 </div>
									 <!-- /.progress-group -->
								 </div>
								 <!-- /.col -->

							 </div>
							 <!-- /.row -->
						 </div>
						 <!-- ./box-body -->
						 <div class="box-footer">
							 <?php
							 $nc= R::count('students', 'level = ? AND intake = ?', ['nc','1']);
							$all= R::count('students', 'intake = ?', ['1']);
							 $nd1= R::count('students', 'level =  ? AND intake = ?', ['nd1','1']);
							 $nd2 = R::count('students', 'level = ? AND intake = ?', ['nd2','1']);
							 $nd3 = R::count('students', 'level = ? AND intake = ?', ['nd3','1']);
							 $hnd = R::count('students', 'level = ? AND intake = ?', ['hnd','1']);

     ?>
							 <div class="row">
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
										 <h5 class="description-header"><?php echo $nc ?></h5>
										 <span class="description-text"> N C Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
									
										 <h5 class="description-header"><?php echo $nd1 ?></h5>
										 <span class="description-text">ND1 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block border-right">
										
										 <h5 class="description-header"><?php echo $nd2 ?></h5>
										 <span class="description-text">ND2 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <!-- /.col -->
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">
										 <h5 class="description-header"><?php echo $nd3 ?></h5>
										 <span class="description-text">ND3 Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">
									
										 <h5 class="description-header"><?php echo $hnd ?></h5>
										 <span class="description-text">HND Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
								 <div class="col-sm-2 col-xs-6">
									 <div class="description-block">

										 <h1 class="description-header"><?php echo $all ?></h1>
										 <span class="description-text">May Intake Students</span>
									 </div>
									 <!-- /.description-block -->
								 </div>
							 </div>
							 <!-- /.row -->
						 </div>
						 <!-- /.box-footer -->
					 </div>
					 <!-- /.box -->
				 </div>
				 <!-- /.col -->
			 </div>
			 <!-- /.row -->
			 <!-- Main row -->
			 <!-- Main content -->
			 <?php // }
            // if(@$_SESSION['role'] == 'gabela') {
			 ?>


			 <?php //}?>
		 </section>

	 </div>

	 <!-- /.content -->
	 <!-- /.content-wrapper -->
     <?php
}
 include 'footer.php';
	?>
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Home tab content -->
			<div class="tab-pane" id="control-sidebar-home-tab">
				<h3 class="control-sidebar-heading">Recent Activity</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-birthday-cake bg-red"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

								<p>Will be 23 on April 24th</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-user bg-yellow"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

								<p>New phone +1(800)555-1234</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

								<p>nora@example.com</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-file-code-o bg-green"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

								<p>Execution time 5 seconds</p>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

				<h3 class="control-sidebar-heading">Tasks Progress</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Custom Template Design
								<span class="label label-danger pull-right">70%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Update Resume
								<span class="label label-success pull-right">95%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-success" style="width: 95%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Laravel Integration
								<span class="label label-warning pull-right">50%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Back End Framework
								<span class="label label-primary pull-right">68%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

			</div>
			<!-- /.tab-pane -->
			<!-- Stats tab content -->
			<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
			<!-- /.tab-pane -->
			<!-- Settings tab content -->
			<div class="tab-pane" id="control-sidebar-settings-tab">
				<form method="post">
					<h3 class="control-sidebar-heading">General Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Report panel usage
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Some information about this general settings option
						</p>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Allow mail redirect
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Other sets of options are available
						</p>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Expose author name in posts
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Allow the user to show his name in blog posts
						</p>
					</div>
					<!-- /.form-group -->

					<h3 class="control-sidebar-heading">Chat Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Show me as online
							<input type="checkbox" class="pull-right" checked>
						</label>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Turn off notifications
							<input type="checkbox" class="pull-right">
						</label>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Delete chat history
							<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
						</label>
					</div>
					<!-- /.form-group -->
				</form>
			</div>
			<!-- /.tab-pane -->
		</div>
	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
	$(function () {
		"use strict";
        <?php
			//nc
        $ncjanm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'male','0']);
        $ncjanf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'female','0']);
        $ncmaym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'male','1']);
        $ncmayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'female','1']);
//nd1
        $nd1janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'male','0']);
        $nd1janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'female','0']);
        $nd1maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'male','1']);
        $nd1mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'female','1']);

		//nd2
        $nd2janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'male','0']);
        $nd2janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'female','0']);
        $nd2maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'male','1']);
        $nd2mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'female','1']);
//nd3
$nd3janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'male','0']);
$nd3janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'female','0']);
$nd3maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'male','1']);
$nd3mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'female','1']);

//hnd
$hndjanm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'male','0']);
$hndjanf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'female','0']);
$hndmaym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'male','1']);
$hndmayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'female','1']);

        ?>
		var bar = new Morris.Bar({
			element: 'bar-chart',
			resize: true,
			data: [
				//nc
				{y: 'NC Jan', a: <?php echo $ncjanm ?>, b:  <?php echo $ncjanf ?>},
				//nd1
				{y: 'ND1 Jan', a: <?php echo $nd1janm ?>, b:  <?php echo $nd1janf ?>},
				//nd2
				{y: 'ND2 Jan', a: <?php echo $nd2janm ?>, b:  <?php echo $nd2janf ?>},
				//nd3
				{y: 'ND3 Jan', a: <?php echo $nd3janm ?>, b:  <?php echo $nd3janf ?>},
				//hnd
				{y: 'HND Jan', a: <?php echo $hndjanm ?>, b:  <?php echo $hndjanf ?>},
			],
			barColors: ['blue', 'skyblue'],
			xkey:   'y',
			ykeys: ['a', 'b'],
			labels: ['Male', 'Female'],
			hideHover: 'auto'
		});
	});
	$(function () {
		"use strict";
	var bar = new Morris.Bar({
		element: 'chart',
		resize: true,
		data: [
			//nc
			{y: 'NC May', a: <?php echo $ncmaym ?>, b:  <?php echo $ncmayf ?>},
			//nd1
			{y: 'ND1 May', a: <?php echo $nd1maym ?>, b:  <?php echo $nd1mayf ?>},
			//nd2
			{y: 'ND2 May', a: <?php echo $nd2maym ?>, b:  <?php echo $nd2mayf ?>},
			//nd3
			{y: 'ND3 May', a: <?php echo $nd3maym ?>, b:  <?php echo $nd3mayf ?>},
			//hnd
			{y: 'HNd May', a: <?php echo $hndmaym ?>, b:  <?php echo $hndmayf ?>},
		],
		barColors: ['blue', 'skyblue'],
		xkey:   'y',
		ykeys: ['a', 'b'],
		labels: ['Male', 'Female'],
		hideHover: 'auto'
	});
	});
</script>




<script type="text/javascript">
    <?php
    //nc
    $ncjanm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'male','0']);
    $ncjanf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'female','0']);
    $ncmaym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'male','1']);
    $ncmayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nc', 'female','1']);
    //nd1
    $nd1janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'male','0']);
    $nd1janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'female','0']);
    $nd1maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'male','1']);
    $nd1mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd1', 'female','1']);

    //nd2
    $nd2janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'male','0']);
    $nd2janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'female','0']);
    $nd2maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'male','1']);
    $nd2mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd2', 'female','1']);
    //nd3
    $nd3janm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'male','0']);
    $nd3janf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'female','0']);
    $nd3maym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'male','1']);
    $nd3mayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['nd3', 'female','1']);

    //hnd
    $hndjanm = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'male','0']);
    $hndjanf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'female','0']);
    $hndmaym = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'male','1']);
    $hndmayf = R::count('students', 'level = ? AND gender = ? AND intake = ?', ['hnd', 'female','1']);

    ?>
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Students Statistics'
		},
		subtitle: {
			text: 'Source: January and May Students Statistics'
		},
		xAxis: {
			categories: [
				'National Certificate ',
				'National Diploma 1',
				'National Diploma 2',
				'National Diploma 3',
				'Higher National Diploma'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Number of Students/level '
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
				}
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table >',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y} students</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			},
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},
		series: [{
			name: 'January Male',
			data: [<?php echo $ncjanm ?>, <?php echo $nd1janm ?>, <?php echo $nd2janm ?>, <?php echo $nd3janm ?>, <?php echo $hndjanm ?>]

		}, {
			name: 'January Female',
			data: [<?php echo $ncjanf ?>, <?php echo $nd1janf ?>, <?php echo $nd2janf ?>, <?php echo $nd3janf ?>, <?php echo $hndjanf ?>]

		}, {
			name: 'May Male',
			data: [<?php echo $ncmaym ?>, <?php echo $nd1maym ?>, <?php echo $nd2maym ?>, <?php echo $nd3maym ?>, <?php echo $hndmaym ?>]

		}, {
			name: 'May Female',
			data: [<?php echo $ncmayf ?>, <?php echo $nd1mayf ?>, <?php echo $nd2mayf ?>, <?php echo $nd3mayf ?>, <?php echo $hndmayf ?>]

		}]
	});
</script>
</body>
</html>
