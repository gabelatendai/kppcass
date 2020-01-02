<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 19/7/2019
 * Time: 13:08
 */



include "header.php";
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$conn=mysqli_connect("localhost", "root", "","cadss_db");
$id=$_GET['id'];

$course=R::findOne('students',  'id =?',[$id]);

//$name =$user['firstname']."   ". $r['lastname'];
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


                <!--****************************************************************************-->

	<div class="container-fluid">


		<!-- Page Heading -->

		<td style="width:30px"><a button type='button'  onClick="javascript:printlayer('div-id-name')" class="btn btn-primary glyphicon  glyphicon-print"></a></td>
		<td><a button type='button' class="btn btn-primary" href="viewstudents">Back</a></td></tr>
	</div>
                    <center><h2>Manage Student<h2></center>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-1">
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
                                        <?php if (@$_SESSION['role'] == 'admin' || $_SESSION['role'] == 'hod') { ?>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>



                                        <tr>
                                            <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                            </td>
                                            <td><?php echo  $course->admission_number; ?></td>
                                            <td><?php echo  $course->lastname.'  '. $course->firstname ; ?></td>
                                            <td><?php echo  $course->gender; ?></td>
                                            <td><?php echo  $course->email; ?></td>

                                            <td><?php echo $course->mobile; ?></td>

                                            <td><?php echo  $course->address; ?></td>
                                            <td><?php echo  $course->date;  ?></td>
                                            <?php if (@$_SESSION['role'] == 'admin' || $_SESSION['role'] == 'hod') { ?>
                                                <td>
		                                        <a href="edit_student<?php echo '?id='.$id;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
                                                </td>
	                                        <td>
			                                        <a class="pull-right btn btn-danger glyphicon glyphicon-trash" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>"></a>

                                                        <?php } ?>
			                                            <!-- delete modal user -->

			                                            <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                                            <div class="modal-dialog">
					                                            <div class="modal-content">
						                                            <div class="modal-header">
							                                            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Student</h4>
						                                            </div>
						                                            <div class="modal-body">
							                                            <div class="alert alert-danger">
								                                            Are you sure you want to delete?
							                                            </div>
							                                            <div class="modal-footer">
								                                            <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
								                                            <a href="deletestudents.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
							                                            </div>
						                                            </div>
					                                            </div>
				                                            </div>
			                                            </div>
	                                            </td>


                             </tr>

                                    </tbody>
                                </table> </div>


                            </div>
                        </div>
                    </div>

            </div>
        </div>

    <!-- /#wrapper -->


    <!--*********************************************************************************-->
<?php
include "footer.php";
?>