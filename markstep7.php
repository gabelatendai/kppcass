<?php
//error_reporting(0);//turning off error reporting
include("header.php");
?> <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">
                            <?php

                            include("mark_header.php");
                            ?>

                            <br>
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
 <?php
 $conn=mysqli_connect("localhost", "root", "","cadss_db");
$id=$_GET['id'];

$sql="SELECT * FROM  students 
            WHERE
             id='$id' ";

$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
    {
        $admission_number=$row['admission_number'];
        $studaname=$row['firstname'].'  '. $row['lastname'];
        $department_id=$row['course_id']; //can change
    }
 ?>



<h4><center><h4><strong>Generate Transcript for  <?php echo $studaname ;?></strong></h4></center></h4>
         
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                     <div class="col-sm-6" >


                        <form method="get" action="reports_all/pdftranscript.php">

                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">                                      
                            
                                    <tr>
                                            <td>
                                                <label>Enter admission to generate Transcript</label>                   
                                            <input type="text" name="admission_number" class="form-control"
                                             value="<?php echo $admission_number ;?>"  readonly>
                                        </td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="course_id" class="form-control"
                                                value="<?php echo $department_id ;?>"  readonly>
                                            </td>
                                        </tr>
                                        <td>
                                                <label>Year</label>

                                                <?php
                                                // set start and end year range
                                                $yearArray = range(2019, 2023);
                                                ?>
                                                <!-- displaying the dropdown list -->
                                               <select name="year" class="form-control" >
                                                    <?php
                                                        foreach ($yearArray as $year) {
                                                            // if you want to select a particular year
                                                            $selected = ($year == 2017) ? 'selected' : '';
                                                            echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                        }
                                                ?> </select>
                                            </td>
                                        </tr>

                                        <input type="HIDDEN" name="date" value="<?php echo date('D-M-Y')  ;   ?>">

                                        <tr>
                                            <td><input type="submit" name="submit" value="Generate" class="btn btn-info" ></td>
                                        </tr>                                       
                                    </table>
                                </form>

               
<!--****************************************************************************-->
 

                </div>
                </p>

            </div>
            
        </div>
    </div>
<?php

include("footer.php");
?>
