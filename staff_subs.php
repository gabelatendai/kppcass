<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

?>
<?php
SESSION_START();
?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">
                            
                        <?php 
                        include 'depheader.php';
                        
                        ?>
                            <br>
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
              <div class="container-fluid">
                <div class="row">
                 <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add Subjects  To Lecturers</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                          <form action="" method="POST" enctype="multipart/form-data">
                          <h4>Course Details</h4>
                            
                          Lecturer Name
	                           <select name="staff_id" class="form-control" >
                                                  <?php
                                                $records1=mysqli_query($conn,"SELECT * FROM staff where role ='lecturer'");
                                                    while($row=mysqli_fetch_array($records1))
                                                        {
                                                            ?>
                                                          <option value="<?php echo $row['id'];?>"><?php echo $row['firstname'].'  '.$row['lastname'];?></option>";
                                                        <?php
                                                          }
                                                ?>
                                          </select>
	                          Subject <select name="subject_id" class="form-control" >
                                                  <?php
                                                $records1=mysqli_query($conn,"SELECT * FROM subjects");
                                                    while($row=mysqli_fetch_array($records1))
                                                        {
                                                            ?>
                                                          <option value="<?php echo $row['id'];?>"><?php echo $row['subjectname'];?></option>";
                                                        <?php
                                                          }
                                                ?>
                                          </select>
	                          <label>Intake</label>
	                          <select  name="intake" id="level"  class="form-control" required>
		                          <option value="0">January </option>
		                          <option value="1">May </option>


	                          </select>
                                          <input type="submit" name="register" value="Save Record" class="btn btn-success">

                            </form>
<!--****************************************************************************-->

  <?php
    if (isset($_POST['register'])) {

        $subid = $_POST['subject_id'];

        $sub = R::findOne('subjects', 'id=? ', [$subid]);

        $init = R::findOne('staffsubs', 'subject_id=? ', [$subid]);
        if ($init > 2) {
            echo "<script>alert('Subject already registered !'); window.location='staff_subs'</script>";
        } else {
            $level = $sub->level;
            $staffsubs = R::dispense('staffsubs');
            $staffsubs->staff_id = $_POST['staff_id'];
            $staffsubs->subject_id = $subid;
            $staffsubs->subject_level = $level;
            $staffsubs->intake = $_POST['intake'];
            R::store($staffsubs);


            ?>


		    <script>

			    alert('Succsessfully Saved.');
			    window.location = "staff_subs";
		    </script>
            <?php
        }
    }
    ?>
 <!--*******************************try add parent's details******************************************************-->  
                        </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                 </div>
	                <div class="col-lg-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Staff Subject</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body"
			                <div class="table-responsive">
				                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

					                <thead>
					                <tr>
						                <th><center>Staff Name</center></th>
						                <th><center>Subject Name</center></th>
						                <th><center>Subject Level</center></th>
						                <th><center>Intake</center></th>
						                <th><center>Remove</center></th>
					                </tr>
					                </thead>
					                <tbody>


                                    <?php

                                    $limit = 6;
                                    @$p = $_GET['p'];
                                    $get_total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM staffsubs "));
                                    $total = ceil($get_total/$limit);
                                    if(!isset($p) || $p <= 0)
                                    {
                                        $offset = 0;
                                    }else {
                                        $offset = ceil($p - 1 ) * $limit;
                                    }

                                    $res =  mysqli_query($conn,"SELECT * FROM staffsubs LIMIT $offset,$limit ");


                                    while($row = mysqli_fetch_array($res))
                                    {
                                        $staff_id = $row['staff_id'];
                                        $subject_id = $row['subject_id'];
                                        $staff= R::findOne('staff', 'id= ? ',[$staff_id]);
                                        $subject= R::findOne('subjects','id= ? ',[$subject_id]);
                                        $id = $row['id'];
                                        $name=$staff->firstname. '  '. $staff->lastname;

                                        ?>
						                <tr>
							                <td><center><?php echo  $name; ?></center></td>
							                <td><center><?php echo $subject->subjectname; ?></center></td>
							                <td><center><?php echo $subject->level; ?></center></td>
							                <td><center><?php
									                if($row['intake']==1){
									                	echo' May Intake';
									                }
									                else{
                                                        echo' January Intake';
									                }
									                 ?></center></td>

							                <td>
								                <center><a href="removesub<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Remove</a></center>
							                </td>
						                </tr>
                                    <?php
                                    }?>
					                </tbody>
				                </table>
                                <?php

                                if ($get_total > $limit ){
                                    for($i=1; $i <= $total; $i++) {

                                        echo '<div class="pages"> ';

                                        echo ( $i == $p ) ? '<a class="active" >'. $i. '</a>' : '<a href="?p='.$i.'" style="color:black">'.$i.'</a>';
                                        echo '</div>';

                                    }


                                }
                                ?>
				                <style>
					                div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
				                </style>

	                </div>
		              </div>
                <!-- /#page-wrapper -->
            </div>

</div>
</div>
</div>
</div>
</div>



<?php
include("footer.php");
?>
