<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
<?php
SESSION_START();
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
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
 
<h4><center><h4><strong>View students according to their respective Courses</strong></h4></center></h4>
                        <form method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <tbody>
                                        <?php
                                                    $sql="SELECT * FROM subjects WHERE id!=5";
                                                    $user_query=mysqli_query($conn,$sql) or die("error getting data");
                                                    while($row = mysqli_fetch_array($user_query)){
                                                    $id = $row['id'];
                                         ?>
                                    
                                                <tr>
                                                <td width="30">
                                                </td>
                                                <td><strong><?php echo $row['subjectname']; ?><strong></td>
                                            
                                                <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="viewstudents.php<?php echo '?id='.$row['id'];?>">View Students</a></center></td>
                                                 <td >
                                                <center><a button class="btn btn-success" title="Click here to View."
                                                 href="viewstudents.php<?php echo '?id='.$row['id'];?>">Amend Details</a></center></td>
                                            </center>
                                            
                            </tr>
                                                <?php } ?>
                                                
                                        </tbody>
                                    </table>
                                </form>

               
<!--****************************************************************************-->
 

                </div>
                </p>

            </div>
            
        </div>
    </div>

<?php
include "footer.php";
?>