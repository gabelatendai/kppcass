<head>

	<!-- DataTables -->
	<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" >
		function printlayer(layer)
		{
			var generator =window.open(",'name,");
			var layetext =document.getElementById(layer);
			generator.document.write(layetext.innerHTML.replace("Print Me"));

			generator.document.close();
			generator.print();
			generator.close();
		}
		function myFunction() {
			var d = new Date();
			document.getElementById("demo").innerHTML = Date();
		}
	</script>


</head>
<body onLoad="myFunction()">

<?php
include("header.php");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">

                            <?php
                            include("stud_header.php");
                            ?>
                            <br>
                            
                        </div> </div> </div> </div>
                        
  <!--*************************************************************************************************************************-->
<?php if (@$_SESSION['role'] == 'hod') {
$dprt = $_SESSION['dprt']; ?>

  <div id="page-wrapper">

  <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-30">Students List </h3>
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
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#ncs">All </a></li>
				                                <li role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#home5">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile5" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="ncs" class="tab-pane fade active in" role="tabpanel">
					                                <div id="div-id-all">
					                                <?php
                                                    $all = R::count('students', 'level = ? AND intake =? AND department_id =?', ['nc','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> All NC Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0"  border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable">

						                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level  = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table>
				                                </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="home5" class="tab-pane fade " role="tabpanel">
					                            
					                                <div id="div-id-male">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nc','male','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable2">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','male','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="profile5" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-female">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nc','female','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">

						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable3">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','female','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <div aria-labelledby="dropdown1-tab" id="nc-may" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL CERTIFICATE May Intake (NC) Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nc-may">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nc-may">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nc-may" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nc-may" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-ncmay">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND intake =? AND department_id =?', ['nc','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> All NC May Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable4">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nc-may" class="tab-pane fade " role="tabpanel">
					                                <div id="div-id-ncm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nc','male','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable5">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>

									                                <td>
										                                <a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></a>
									                                </td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nc-may" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-ncf">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['nc','female','1',$dprt]);

                                                    ?>                              <h3 class="text-center">Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable30">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nc','female','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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

	                                <!----national Diploma 1--->
	                                <div aria-labelledby="dropdown1-tab" id="nd1-jan" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL Diploma 1(ND1) January Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd1-jan">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd1-jan">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd1-jan" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd1-jan" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd1j">
                                                    <?php
                                                    $all = R::count('students', 'level  = ? AND intake =? AND department_id =? ', ['nd1','0',$dprt]);

                                                    ?>                              <h3 class="text-center">All ND1 January Students  (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable6">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd1-jan" class="tab-pane fade active in" role="tabpanel">
					                               <div id="div-id-nd1jm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd1','male','0',$dprt]);

                                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable7">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','male','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd1-jan" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd1f">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd1','female','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable8">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','female','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <div aria-labelledby="dropdown1-tab" id="nd1-may" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL DIPLOMA 1(ND1) May Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd1-may">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd1-may">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd1-may" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd1-may" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd1may">
                                                    <?php
                                                    $all = R::count('students', 'level  = ? AND intake =? AND department_id =? ', ['nd1','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> All ND1 May Intake Students  (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable9">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd1-may" class="tab-pane fade " role="tabpanel">
					                               <div id="div-id-nd1mm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['nd1','male','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable10">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd1-may" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd1ff">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['nd1','female','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable11">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd1','female','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <!----national Diploma 2--->
	                                <div aria-labelledby="dropdown1-tab" id="nd2-jan" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL Diploma 2(ND2) January Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd2-jan">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd2-jan">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd2-jan" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd2-jan" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd2j">
                                                    <?php
                                                    $all = R::count('students', 'level  = ? AND intake =? AND department_id =? ', ['nd2','0',$dprt]);

                                                    ?>                              <h3 class="text-center">ND2 January Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable12">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd2-jan" class="tab-pane fade" role="tabpanel">
					                             <div id="div-id-nd2m">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd2','male','0',$dprt]);

                                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable13">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','male','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd2-jan" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd2f">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd2','female','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable14">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','female','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <div aria-labelledby="dropdown1-tab" id="nd2-may" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL DIPLOMA 2(ND2) May Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd2-may">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd2-may">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd2-may" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd2-may" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd2may">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND intake =? AND department_id =?', ['nd2','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> ND2 May Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable15">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level =? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd2-may" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd2mm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd2','male','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable16">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd2-may" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd2fm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['nd2','female','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable17">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd2','female','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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

									 <!---- national Diploma 3--->
									 <div aria-labelledby="dropdown1-tab" id="nd3-jan" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL Diploma 3(ND3) January Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd3-jan">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd3-jan">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd3-jan" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd3-jan" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd3">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND intake =? AND department_id =? ', ['nd3','0',$dprt]);

                                                    ?>                              <h3 class="text-center">ND3) January Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable18">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd3-jan" class="tab-pane fade " role="tabpanel">
					                                 <div id="div-id-nd3m">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd3','male','0',$dprt]);

                                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable19">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','male','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd3-jan" class="tab-pane fade" role="tabpanel">
					                                <div id="div-id-nd3f">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd3','female','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable20">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','female','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <div aria-labelledby="dropdown1-tab" id="nd3-may" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center"> NATIONAL DIPLOMA 3(nd3) May Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-nd3-may">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-nd3-may">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-nd3-may" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-nd3-may" class="tab-pane fade active in" role="tabpanel">
					                            
					                                <div id="div-id-nd3may">
                                                    <?php
                                                    $all = R::count('students', 'level  = ? AND intake =? AND department_id =?', ['nd3','1',$dprt]);

                                                    ?>                              <h3 class="text-center">ND3 May Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable21">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-nd3-may" class="tab-pane fade " role="tabpanel">
					                                <div id="div-id-nd3mm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['nd3','male','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable22">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-nd3-may" class="tab-pane fade" role="tabpanel">
					                                 <div id="div-id-nd3fm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['nd3','female','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable23">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['nd3','female','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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

	                                <!----Higher national Diploma --->
	                                <div aria-labelledby="dropdown1-tab" id="hnd-jan" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center">Higher NATIONAL Diploma (hnd) January Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-hnd-jan">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-hnd-jan">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-hnd-jan" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-hnd-jan" class="tab-pane fade active in" role="tabpanel">
					                            
					                            <div id="div-id-hnd">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND intake =? AND department_id =?', ['hnd','0',$dprt]);

                                                    ?>                              <h3 class="text-center">HND January Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable24">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level  = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-hnd-jan" class="tab-pane fade" role="tabpanel">
					                                 <div id="div-id-hndm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['hnd','male','0',$dprt]);

                                                    ?>                              <h3 class="text-center">Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable25">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','male','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-hnd-jan" class="tab-pane fade" role="tabpanel">
					                                  <div id="div-id-hndf">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =? ', ['hnd','female','0',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable26">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','female','0',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
	                                <div aria-labelledby="dropdown1-tab" id="hnd-may" class="tab-pane fade " role="tabpanel">
		                                <h3 class="text-center">Higher NATIONAL DIPLOMA (HND) May Intake Students List </h3>

		                                <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
			                                <ul role="tablist" class="nav nav-tabs" id="myTabs">
				                                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#all-hnd-may">All</a></li>
				                                <li class="" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#male-hnd-may">Male</a></li>
				                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#female-hnd-may" aria-expanded="false">Female</a></li>
			                                </ul>
			                                <div class="tab-content" id="myTabContent">
				                                <div aria-labelledby="home-tab" id="all-hnd-may" class="tab-pane fade active " role="tabpanel">
					                            
					                                <div id="div-id-hndmay">
                                                    <?php
                                                    $all = R::count('students', 'level  = ? AND intake =? AND department_id =?', ['hnd','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> (HND) May Intake Students (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable27">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level  = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="home-tab" id="male-hnd-may" class="tab-pane fade" role="tabpanel">
					                                 <div id="div-id-hndmm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['hnd','male','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Male Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable28">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','male','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
                                                                    <?php } ?>

								                                </tr>
                                                            <?php } ?>
							                                </tbody>
						                                </table> </div>
					                                </div>
				                                </div>
				                                <div aria-labelledby="profile-tab" id="female-hnd-may" class="tab-pane fade" role="tabpanel">
					                               <div id="div-id-hndfm">
                                                    <?php
                                                    $all = R::count('students', 'level = ? AND gender = ? AND intake =? AND department_id =?', ['hnd','female','1',$dprt]);

                                                    ?>                              <h3 class="text-center"> Female Students List (<?php echo $all ;?>)</h3>

					                                <div class="table-responsive col-md-offset-1">
						                                 <table cellpadding="0" border="1"  style="width: 100%" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable29">

							                                <thead>
							                                <tr>
								                                <th></th>
								                                <th>Adm No.</th>
								                                <th>Name</th>
								                                <th>Gender</th>
								                                <th>Email Address</th>
								                                <th>Mobile</th>
								                                <th>Address</th>
								                                <th>Reg. Date</th>
                                                               <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
									                                <th>Edit</th>
									                                <th>Delete</th>
                                                                <?php } ?>
							                                </tr>
							                                </thead>
							                                <tbody>
                                                            <?php
                                                            //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                            $courses = R::findAll('students',' level = ? AND gender = ? AND intake =? AND department_id =? ORDER BY lastname ', ['hnd','female','1',$dprt]);


                                                            foreach ($courses as $course) {
                                                                $id= $course->id;
                                                                ?>

								                                <tr>
									                                <td width="30">
										                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									                                </td>
									                                <td><?php echo  $course->admission_number; ?></td>
									                                <td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
									                                <td><?php echo  $course->gender; ?></td>
									                                <td><?php echo  $course->email; ?></td>

									                                <td><?php echo $course->mobile; ?></td>

									                                <td><?php echo  $course->address; ?></td>
									                                <td><?php echo  $course->date;  ?></td>
                                                                   <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
										                                <td>
											                                                           <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></td>
   </td>
										                                <td>
											                                <a href="deletestudents<?php echo  '?id='.$id;  ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
										                                </td>
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
                            </div>
                        </div>
                    </div>

        </div>


<?php  } if (@$_SESSION['role'] == 'admin') {
    ?>
	<div id="page-wrapper">

		<div class="col-lg-12 col-sm-12 col-xs-12">
			<div class="white-box">
				<h3 class="box-title m-b-30">Students List</h3>
				<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
					<ul role="tablist" class="nav nav-tabs" id="myTabs">
						<li class=" active dropdown" role="presentation"><a aria-controls="myTabDrop1-contents"
						                                                    data-toggle="dropdown"
						                                                    class="dropdown-toggle" id="myTabDrop1"
						                                                    href="#" aria-expanded="false">NC Students
								<span class="caret"></span></a>
							<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nc-jan" aria-expanded="true">January</a></li>
								<li class=""><a aria-controls="female" data-toggle="tab" id="dropdown2-tab" role="tab"
								                href="#nc-may" aria-expanded="false"> May</a></li>
							</ul>
						</li>
						<li class=" dropdown" role="presentation"><a aria-controls="myTabDrop1-contents"
						                                             data-toggle="dropdown" class="dropdown-toggle"
						                                             id="myTabDrop1" href="#" aria-expanded="false">ND1
								Students <span class="caret"></span></a>
							<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd1-jan" aria-expanded="true">January</a></li>
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd1-may" aria-expanded="true">May </a></li>
							</ul>
						</li>
						<li class=" dropdown" role="presentation"><a aria-controls="myTabDrop1-contents"
						                                             data-toggle="dropdown" class="dropdown-toggle"
						                                             id="myTabDrop1" href="#" aria-expanded="false">ND2
								Students <span class="caret"></span></a>
							<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd2-jan" aria-expanded="true">January</a></li>
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd2-may" aria-expanded="true">May </a></li>
							</ul>
						</li>
						<li class=" dropdown" role="presentation"><a aria-controls="myTabDrop1-contents"
						                                             data-toggle="dropdown" class="dropdown-toggle"
						                                             id="myTabDrop1" href="#" aria-expanded="false">ND3
								Students <span class="caret"></span></a>
							<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd3-jan" aria-expanded="true">January</a></li>
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#nd3-may" aria-expanded="true">May </a></li>
							</ul>
						</li>
						<li class=" dropdown" role="presentation"><a aria-controls="myTabDrop1-contents"
						                                             data-toggle="dropdown" class="dropdown-toggle"
						                                             id="myTabDrop1" href="#" aria-expanded="false">HND
								Students <span class="caret"></span></a>
							<ul id="myTabDrop1-contents" aria-labelledby="myTabDrop1" class="dropdown-menu">
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#hnd-jan" aria-expanded="true">January</a></li>
								<li class=""><a aria-controls="male" data-toggle="tab" id="dropdown1-tab" role="tab"
								                href="#hnd-may" aria-expanded="true">May </a></li>
							</ul>
						</li>

					</ul>
					<div class="tab-content" id="myTabContent">
						<!----national certificate--->
						<div aria-labelledby="dropdown1-tab" id="nc-jan" class="tab-pane fade active in "
						     role="tabpanel">

							<h3 class="text-center"> NATIONAL CERTIFICATE January Intake (NC) Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#ncs">All </a></li>
									<li role="presentation"><a aria-expanded="true" aria-controls="home"
									                           data-toggle="tab" role="tab" id="home-tab" href="#home5">Male</a>
									</li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab" href="#profile5"
									                                    aria-expanded="false">Female</a></li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="ncs" class="tab-pane fade active in"
									     role="tabpanel">
										<div id="div-id-all">
                                            <?php
                                            $all = R::count('students', 'level = ? AND intake =?', ['nc', '0']);

                                            ?> <h3 class="text-center"> All NC Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level  = ? AND intake =? ORDER BY lastname ', ['nc', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="home5" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-male">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =?', ['nc', 'male', '0']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable2">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nc', 'male', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="profile5" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-female">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =?', ['nc', 'female', '0']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">

												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable3">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nc', 'female', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div aria-labelledby="dropdown1-tab" id="nc-may" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL CERTIFICATE May Intake (NC) Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nc-may">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nc-may">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nc-may" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nc-may" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-ncmay">
                                            <?php
                                            $all = R::count('students', 'level = ? AND intake =?', ['nc', '1']);

                                            ?> <h3 class="text-center"> All NC May Students (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable4">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND intake =? ORDER BY lastname ', ['nc', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nc-may" class="tab-pane fade "
									     role="tabpanel">
										<div id="div-id-ncm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =?', ['nc', 'male', '1']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable5">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nc', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nc-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-ncf">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nc', 'female', '1']);

                                            ?> <h3 class="text-center">Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable30">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nc', 'female', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!----national Diploma 1--->
						<div aria-labelledby="dropdown1-tab" id="nd1-jan" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL Diploma 1(ND1) January Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd1-jan">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd1-jan">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd1-jan" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd1-jan" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd1j">
                                            <?php
                                            $all = R::count('students', 'level  = ? AND intake =? ', ['nd1', '0']);

                                            ?> <h3 class="text-center">All ND1 January Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable6">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND intake =? ORDER BY lastname ', ['nd1', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd1-jan" class="tab-pane fade active in"
									     role="tabpanel">
										<div id="div-id-nd1jm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =?', ['nd1', 'male', '0']);

                                            ?> <h3 class="text-center">Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable7">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd1', 'male', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd1-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd1f">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =?', ['nd1', 'female', '0']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable8">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd1', 'female', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div aria-labelledby="dropdown1-tab" id="nd1-may" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL DIPLOMA 1(ND1) May Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd1-may">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd1-may">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd1-may" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd1-may" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd1may">
                                            <?php
                                            $all = R::count('students', 'level  = ? AND intake =? ', ['nd1', '1']);

                                            ?> <h3 class="text-center"> All ND1 May Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable9">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd1', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd1-may" class="tab-pane fade "
									     role="tabpanel">
										<div id="div-id-nd1mm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1', 'male', '1']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable10">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd1', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd1-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd1ff">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd1', 'female', '1']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable11">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd1', 'female', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!----national Diploma 2--->
						<div aria-labelledby="dropdown1-tab" id="nd2-jan" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL Diploma 2(ND2) January Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd2-jan">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd2-jan">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd2-jan" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd2-jan" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd2j">
                                            <?php
                                            $all = R::count('students', 'level  = ? AND intake =? ', ['nd2', '0']);

                                            ?> <h3 class="text-center">ND2 January Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable12">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND intake =? ORDER BY lastname ', ['nd2', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd2-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd2m">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2', 'male', '0']);

                                            ?> <h3 class="text-center">Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable13">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd2', 'male', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd2-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd2f">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2', 'female', '0']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable14">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd2', 'female', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div aria-labelledby="dropdown1-tab" id="nd2-may" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL DIPLOMA 2(ND2) May Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd2-may">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd2-may">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd2-may" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd2-may" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd2may">
                                            <?php
                                            $all = R::count('students', 'level = ? AND intake =? ', ['nd2', '1']);

                                            ?> <h3 class="text-center"> ND2 May Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable15">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level =? AND intake =? ORDER BY lastname ', ['nd2', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd2-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd2mm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2', 'male', '1']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable16">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd2', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd2-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd2fm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd2', 'female', '1']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable17">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd2', 'female', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<!---- national Diploma 3--->
						<div aria-labelledby="dropdown1-tab" id="nd3-jan" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL Diploma 3(ND3) January Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd3-jan">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd3-jan">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd3-jan" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd3-jan" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd3">
                                            <?php
                                            $all = R::count('students', 'level = ? AND intake =? ', ['nd3', '0']);

                                            ?> <h3 class="text-center">ND3) January Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable18">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND intake =? ORDER BY lastname ', ['nd3', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd3-jan" class="tab-pane fade "
									     role="tabpanel">
										<div id="div-id-nd3m">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3', 'male', '0']);

                                            ?> <h3 class="text-center">Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable19">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd3', 'male', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd3-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd3f">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3', 'female', '0']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable20">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd3', 'female', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div aria-labelledby="dropdown1-tab" id="nd3-may" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center"> NATIONAL DIPLOMA 3(nd3) May Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-nd3-may">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-nd3-may">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-nd3-may" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-nd3-may" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-nd3may">
                                            <?php
                                            $all = R::count('students', 'level  = ? AND intake =? ', ['nd3', '1']);

                                            ?> <h3 class="text-center">ND3 May Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable21">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND intake =? ORDER BY lastname ', ['nd3', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-nd3-may" class="tab-pane fade "
									     role="tabpanel">
										<div id="div-id-nd3mm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3', 'male', '1']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable22">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd3', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-nd3-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-nd3fm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['nd3', 'female', '1']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable23">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['nd3', 'female', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<!----Higher national Diploma --->
						<div aria-labelledby="dropdown1-tab" id="hnd-jan" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center">Higher NATIONAL Diploma (hnd) January Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-hnd-jan">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-hnd-jan">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-hnd-jan" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-hnd-jan" class="tab-pane fade active in"
									     role="tabpanel">

										<div id="div-id-hnd">
                                            <?php
                                            $all = R::count('students', 'level = ? AND intake =? ', ['hnd', '0']);

                                            ?> <h3 class="text-center">HND January Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable24">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level  = ? AND intake =? ORDER BY lastname ', ['hnd', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-hnd-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-hndm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd', 'male', '0']);

                                            ?> <h3 class="text-center">Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable25">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['hnd', 'male', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-hnd-jan" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-hndf">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd', 'female', '0']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable26">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['hnd', 'female', '0']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div aria-labelledby="dropdown1-tab" id="hnd-may" class="tab-pane fade " role="tabpanel">
							<h3 class="text-center">Higher NATIONAL DIPLOMA (HND) May Intake Students List </h3>

							<div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
								<ul role="tablist" class="nav nav-tabs" id="myTabs">
									<li class="active" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                          data-toggle="tab" role="tab" id="home-tab"
									                                          href="#all-hnd-may">All</a></li>
									<li class="" role="presentation"><a aria-expanded="true" aria-controls="home"
									                                    data-toggle="tab" role="tab" id="home-tab"
									                                    href="#male-hnd-may">Male</a></li>
									<li role="presentation" class=""><a aria-controls="profile" data-toggle="tab"
									                                    id="profile-tab" role="tab"
									                                    href="#female-hnd-may" aria-expanded="false">Female</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div aria-labelledby="home-tab" id="all-hnd-may" class="tab-pane fade active "
									     role="tabpanel">

										<div id="div-id-hndmay">
                                            <?php
                                            $all = R::count('students', 'level  = ? AND intake =? ', ['hnd', '1']);

                                            ?> <h3 class="text-center"> (HND) May Intake Students (<?php echo $all; ?>
												)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable27">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level  = ? AND intake =? ORDER BY lastname ', ['hnd', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="home-tab" id="male-hnd-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-hndmm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd', 'male', '1']);

                                            ?> <h3 class="text-center"> Male Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable28">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['hnd', 'male', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div aria-labelledby="profile-tab" id="female-hnd-may" class="tab-pane fade"
									     role="tabpanel">
										<div id="div-id-hndfm">
                                            <?php
                                            $all = R::count('students', 'level = ? AND gender = ? AND intake =? ', ['hnd', 'female', '1']);

                                            ?> <h3 class="text-center"> Female Students List (<?php echo $all; ?>)</h3>

											<div class="table-responsive col-md-offset-1">
												<table cellpadding="0" border="1" style="width: 100%"
												       class="table  table-striped table-condensed table-hover dataTables table-bordered"
												       id="myTable29">

													<thead>
													<tr>
														<th></th>
														<th>Adm No.</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Email Address</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Reg. Date</th>
                                                        <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
															<th>Edit</th>
															<th>Delete</th>
                                                        <?php } ?>
													</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    //$courses = R::findAll('students', 'level = ? AND gender = ?', ['nc','male']);
                                                    $courses = R::findAll('students', ' level = ? AND gender = ? AND intake =? ORDER BY lastname ', ['hnd', 'female', '1']);


                                                    foreach ($courses as $course) {
                                                        $id = $course->id;
                                                        ?>

														<tr>
															<td width="30">
																<input id="optionsCheckbox" class="uniform_on"
																       name="selector[]" type="checkbox"
																       value="<?php echo $id; ?>">
															</td>
															<td><?php echo $course->admission_number; ?></td>
															<td><a href="studentdetails<?php echo  '?id='.$id;  ?>" class=""><?php echo  $course->lastname.'  '. $course->firstname ; ?></a></td>
															<td><?php echo $course->gender; ?></td>
															<td><?php echo $course->email; ?></td>

															<td><?php echo $course->mobile; ?></td>

															<td><?php echo $course->address; ?></td>
															<td><?php echo $course->date; ?></td>
                                                            <?php if (@$_SESSION['role'] == 'gab' || $_SESSION['role'] == 'ten') { ?>
																<td>
																	<a href="edit_student<?php echo '?id=' . $id; ?>"
																	   class="btn btn-success"><i
																				class="glyphicon glyphicon-pencil"></i>Edit</a>
																</td>
																</td>
																<td>
																	<a href="deletestudents<?php echo '?id=' . $id; ?>"
																	   class="btn btn-danger"><i
																				class="glyphicon glyphicon-trash"></i>Delete</a>
																</td>
                                                            <?php } ?>

														</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>


					</div>
				</div>
			</div>
		</div>

	</div>
	<!--*********************************************************************************-->
    <?php
}
include "footer.php";
?>


<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/cdn/dataTables.buttons.min.js"></script>
<script src="js/cdn/buttons.flash.min.js"></script>
<script src="js/cdn/jszip.min.js"></script>
<script src="js/cdn/pdfmake.min.js"></script>
<script src="js/cdn/vfs_fonts.js"></script>
<script src="js/cdn/buttons.html5.min.js"></script>
<script src="js/cdn/buttons.print.min.js"></script>
</body>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC January Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC January Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC January Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC January Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC January Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable2').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC January Intake Male Students",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC January Intake Male Students",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC January Intake Male Students",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC January Intake Male Students",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC January Intake Male Students",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable3').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC January Intake Female Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC January Intake Female Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC January Intake Female Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC January Intake Female Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC January Intake Female Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable4').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC May Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC May Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC May Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC May Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable5').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC Male May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC Male May Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC Male May Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC Male May Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC Male May Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable6').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1 January Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1 January Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1 January Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1 January Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1 January Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable7').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1 Male January Intake List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1 Male January Intake List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1 Male January Intake List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1 Male January Intake List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1 Male January Intake List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable8').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1 Female January Intake List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1 Female January Intake List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1 Female January Intake List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1 Female January Intake List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1 Female January Intake List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable9').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1  May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1  May Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1  May Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1  May Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1  May Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable10').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1  May Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1  May Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1  May Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1  May Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1  May Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable11').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND1  May Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND1  May Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND1  May Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND1  May Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND1  May Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable12').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  January Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  January Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  January Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  January Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  January Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable13').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  January Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  January Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  January Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  January Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  January Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable14').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  January Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  January Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  January Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  January Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  January Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable15').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  May Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  May Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  May Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  May Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable16').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  May Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  May Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  May Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  May Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  May Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable17').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND2  May Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND2  May Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND2  May Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND2  May Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND2  May Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable19').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  January Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  January Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  January Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  January Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  January Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable18').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  January Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  January Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  January Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  January Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  January Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable20').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  January Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  January Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  January Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  January Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  January Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable21').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  May Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  May Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  May Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  May Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable22').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  May Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  May Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  May Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  May Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  May Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable23').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "ND3  May Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "ND3  May Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "ND3  May Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "ND3  May Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "ND3  May Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable24').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  Janaury Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  Janaury Intake Class List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  Janaury Intake Class List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  Janaury Intake Class List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  Janaury Intake Class List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable25').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  Janaury Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  Janaury Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  Janaury Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  Janaury Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  Janaury Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable26').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  Janaury Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  Janaury Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  Janaury Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  Janaury Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  Janaury Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable27').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  May Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  May Intake Class List",
				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  May Intake Class List",	
				},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  May Intake Class List",
		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  May Intake Class List",
				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable28').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  May Intake Male List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  May Intake Male List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  May Intake Male List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  May Intake Male List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  May Intake Male List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable29').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "HND  May Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "HND  May Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "HND  May Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "HND  May Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "HND  May Intake Female List",

				}],
		} );
	} );
	$(document).ready(function() {
		$('#myTable30').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC  May Intake Female List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC  May Intake Female List",

				},
		 {
			extend: 'csv',
				text: 'CSV',
			orientation: 'landscape',
			title: "NC  May Intake Female List",
		},
		{
			extend: 'print',
				text: 'Print',
			orientation: 'landscape',
			title: "NC  May Intake Female List",

		},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC  May Intake Female List",

				}],
		} );
	} );
</script>
