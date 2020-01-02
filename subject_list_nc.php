<?php include ('header.php'); 
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>

	<div class="row">
		<div class="col-lg-12">
			<br />
			<ol class="breadcrumb">
				<li ><a href="homepage">Home</a>
				</li> <li class="active"><a href="#">Subjects</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">


				<br />
				<br />
				<div class="x_title">
					<h2><i class="fa fa-book"></i> Subjects List</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li>
                            <?php
                            if (@$_SESSION['role'] != 'student'){  ?>
								<a href="subjects" style="background:none;">
									<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Subjects</button>
								</a>
                            <?php } ?>
						</li>
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<!-- If needed
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                        -->
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
				<div class="x_content">
					<!-- content starts here -->
					<div id="div-id-name">
						<div class="table-responsive">
						<td><a button type='button' class="btn btn-primary" href="subject_list_nc">NC</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="subject_list_nd1">ND1</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="subject_list_nd3">ND3</a></td></tr>
	                        <td><a button type='button' class="btn btn-primary" href="subject_list_hnd">HND</a></td></tr>
	                    
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

								<thead>
								<tr>

									<th>No</th>
									<th>Subject Name</th>
									<th>Subject Code</th>
									<th>Level</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody>

                                <?php
                                $result= mysqli_query($conn,"select * from subjects where level = 'nc'  ") or die (mysql_error());
                                while ($row= mysqli_fetch_array ($result) ){
                                    $id=$row['id'];
                                  //  $path=$row['book_path'];
                                    $category=$row['id'];

                                  $cat_query = mysqli_query($conn,"select * from departments where id = '$category'")or die(mysql_error());
                                  $cat_row = mysqli_fetch_array($cat_query);
                                  $dep = $cat_row['departmentname'];
                                    ?>
									<tr>
										<!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
										<td style="word-wrap: break-word; width: 10em;"><?php echo $row['id']; ?></td>
										<td style="word-wrap: break-word; width: 10em;"><?php echo $row['subjectname']; ?></td>
										<td style="word-wrap: break-word; width: 10em;"><?php echo $row['subject_code'];?></td>
										<td style="word-wrap: break-word; width: 10em;"><?php echo $row['level'];?></td>

										<td>
										<center><a href="editsubject?id=<?php echo $id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit" name="register"></i>Edit</a></center></td>

										<td><center><a href="deletesubject?id=<?php echo $id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" name="register"></i>delete</a></center></td>



									</tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>
					</div>

					<!-- content ends here -->
				</div>
			</div>
		</div>
	</div>

<?php include ('footer.php'); ?>