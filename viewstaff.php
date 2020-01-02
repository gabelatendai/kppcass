
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

                     include("staff_header.php");

                     ?>

                            <br>
                            
                        </div> </div> </div> </div>

                
                       
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                              </div>
                              <div class="modal-body">
                               Are you to sure you want to delete this?
                              </div>
                              <div class="modal-footer">
                              <form method = "POST">
                                <input type="submit" name="delete" value = "Delete" class="btn btn-danger">
                                
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- block -->                      
                        <div id="block_bg" class="block">
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div class="x_content">
                                        <!-- content starts here -->
                                        <div id="div-id-name">
                                            <div class="table-responsive col-md-offset-1">
	                                            <table cellpadding="0" border="1" style="width: 100%"
	                                                   class="table  table-striped table-condensed table-hover dataTables table-bordered"
	                                                   id="myTable">
                                                <thead>
                                          <tr>
                                                <th></th>
                                                <th><center>Staff #.</center></th>
                                                <th><center>Name</center></th>
                                                <th><center>Gender</center></th>
                                                <th><center>Mobile</center></th>
                                                <th><center>ID NO.</center></th>
                                                <th><center>Email</center></th>
                                                <th><center>Role/Designation</center></th>
                                                <th><center>Edit</center></th>
                                                <th><center>Delete</center></th>
                                           </tr>
                                        </thead>
                                        <tbody>
                        <?php 
                    

                    $sql ="SELECT  * from staff";
                    $user_query=mysqli_query($conn,$sql) or die("error getting data");
                    while($row = mysqli_fetch_array($user_query)){
                    $id = $row['id'];
                  
                        ?>
                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><center><?php echo $row['id']; ?></center></td>
                                                <td><center><?php echo $row['firstname']." ".$row['lastname']; ?></center></td>
                                                <td><center><?php echo $row['gender']; ?></center></td>
                                                <td><center><?php echo $row['mobile']; ?></center></td>
                                                <td><center><?php echo $row['idno']; ?></center></td>
                                                <td><center><?php echo $row['email']; ?></center></td>

                                                <td><center><?php echo $row['role']; ?></center></td>
                                            
                                                <td>
                                                <center><a href="editstaff<?php echo '?id='. $id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center></td>
	                                                <td>
                                                <center><a href="deletestaff<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a></center></td>

                                            
                            </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                                

            </div>
                            </div>
                        </div>
                    </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
  <!--*********************************************************************************-->
<?php
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
					title: "Staff List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "Staff List",

				},
				{
					extend: 'csv',
					text: 'CSV',
					orientation: 'landscape',
					title: "Staff List",
				},
				{
					extend: 'print',
					text: 'Print',
					orientation: 'landscape',
					title: "Staff List",

				},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "Staff List",

				}],
		} );
	} );
</script>