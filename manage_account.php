<?php
include("connect.php"); 
?>
<?php
require_once('session1.php');
?>
<!--*****************Analysis data*****************************-->
<?php
SESSION_START();
?>
<?php

include "header.php";
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                    <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li ><a href="register_form.php">New user <img src="assets/img/new.png"> </a></li>
                                  <li class="active"><a href="manage_account.php">View users<img src="assets/img/view2.png"></a></li>
                              
                                </ul>
                            <br>
                            
                        </div>
<!--****************************************************************************-->
                        
<nav>
	<center><h2>Manage Account<h2></center>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1">
                <?php

                                    $limit = 20;
                                    @$p = $_GET['p'];
                                    $get_total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users "));
                                    $total = ceil($get_total/$limit);
                                    if(!isset($p) || $p <= 0)
                                    {
                                        $offset = 0;
                                    }else {
                                        $offset = ceil($p - 1 ) * $limit;
                                    }

                                    $res =  mysqli_query($conn,"SELECT * FROM users LIMIT $offset,$limit ");
                                    ?>
<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>Course</th>
                        <th>role</th>

                        <th>Delete</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($res))

                    {
                        $dep=  $row['course_id'];
                        $id=  $row['id'];
                        $staff= R::findOne('courses', 'id= ? ',[$dep]);

                    ?>
	                <tr>

		                <td><?php echo $row['email']; ?></td>

		                <td><?php echo $staff->coursename; ?></td>
		                <td><?php echo $row['role']; ?></td>

		                <!--<td class="col-md-1">
			                <a href="admin_edit.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
		                </td>-->
		                <td class="col-md-1">
			                <a href="deleteuser.php <?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
		                </td>
	                </tr>
                    <?php
                }
                ?>

                    </tbody>
</table>

				<ul class="pager">
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
				</ul>

			</div>
		</div>
	</div>
	<style>
		.pager li .active_link{

			background: black !important;
		}

	</style>
    </div>
    </div>
    </div>
  </nav>
    <!-- /#wrapper -->


  <!--*********************************************************************************-->
<?php
include "footer.php";
?>