<?php
//error_reporting(0);//turning off error reporting
include("header.php");
require_once('session1.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
<?php
$id = $_GET['id'];
    $select = "SELECT * FROM 
            studentstable WHERE admission_number='$id'";
             $result = mysqli_fetch_array(mysqli_query($conn,$select));
    $qry=mysqli_query($conn,$select);
        if($qry)
        {
        while($rec = mysqli_fetch_array($qry)){
            $sirname = "$rec[sirname]";
            $firstname = "$rec[firstname]";
            $lastname = "$rec[lastname]";
            $gender = "$rec[gender]";
            $mobile = "$rec[mobile]";
            $email = "$rec[email]";
            $address = "$rec[address]";
            $zipcode = "$rec[zipcode]";
            $course_id = "$rec[course_id]";
        }}
  ?>

<?php
SESSION_START();
?>
<!--end of heading section-->
        <div class="tab-content">
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
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Marks</div>                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                <form action="marks_packages.php" method="POST" enctype="multipart/form-data">
                     <div style="float:left; position:relative" >
                        <h4><font color="green">Marks Entry</font></h4>
                        <table>
                        <tr>                          
                        <td><label>Student ID</label></td>                        
                        <td><input type="text" name="admission_number" readonly  value="<?php echo $id?>" class="form-control"></td>
                       <td><label>Course</label></td>
                        <td><select class="form-control" name="course_id">
                             <?php

                             $records1=mysqli_query($conn,"SELECT * FROM subjects");
                                                 while($row=mysqli_fetch_array($records1)){
                                                     $id=$row['id'];
                             ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['subjectname']; ?></option>
                                <?php } ?>
                            </select></td></tr>
                        <td><label>Year</label></td> 
                                                <?php
                                                // set start and end year range
                                                $yearArray = range(2016, 2050);
                                                ?>
                                                <!-- displaying the dropdown list -->
                                              <td>  <select name="year" class="form-control">                                                        
                                                    <?php
                                                        foreach ($yearArray as $year) {
                                                            // if you want to select a particular year
                                                            $selected = ($year == 2018) ? 'selected' : '';
                                                            echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                        }
                                                ?> </select></td> </tr>
                        </table>
                    
                    </div>
                    
                    <div style="float:left; position:relative">
                    <h4><font color="green">Record Course Work Marks</font></h4>

                        <table><tr><td><h2 align="center">Set 1</h2></td></tr>
                            <tr> <td><label>Theory 1
                            <input type="number" name="theory1" id="a" class="form-control"  onkeyup="final()" max="100" >
                            </td>
                            <td><label>Practical Assignment 1
                            <input type="number" name="prac1" id="b" class="form-control"  onkeyup="final()" max="100" >
                            </td></tr>

                            <tr>
                            <td><label>ITTD 1
                            <input type="number" name="ittd1" id="c" class="form-control"  onkeyup="final()" max="100" >
                            </td>
                            <td><label>Test 1
                            <input type="number" name="test1" id="d" class="form-control"  onkeyup="final()" max="100" >
                            </td></tr>

                            <tr>
                                <td><h2 align="center">Set 2</h2></td></tr>

                            <tr>
                            <td><label>Theory 2
                            <input type="number" name="theory2" id="e" class="form-control"  onkeyup="final()" max="100" >
                            </td>
                            <td><label>Practical 2
                            <input type="number" name="prac2" id="f" class="form-control"  onkeyup="final()" max="100" >
                            </td></tr>

                            <tr>
                            <td><label>ITTD 2
                            <input type="number" name="ittd2" id="g" class="form-control"  onkeyup="final()" max="100" >
                            </td>
                            <td><label>Test 2
                            <input type="number" name="test2" id="h" class="form-control"  onkeyup="final()" max="100" >
                            </td></tr>
                                 <tr><td><h2 align="center">Set 3</h2></td></tr>

                            <tr>
                                     <td><label>ITTD 3
                                             <input type="number" name="ittd3" id="g" class="form-control"  onkeyup="final()" max="100" >
                                     </td>
                                     <td><label>Practical 3
                                             <input type="number" name="prac3" id="h" class="form-control"  onkeyup="final()" max="100" >
                                     </td></tr>
                                 <tr>
                                     <td>
                                 <div style="float:right;  position:relative; clear:both;">
                                     <?php

                                         echo $message;

                                     ?>
                                     <input type="submit" name="register" value="Save Entry" class="btn btn-success" >
                                 </div>
                                     </td></tr>
                             </table>
                        </form>
</div>                        
</div>
</div>
</div>
</div>
<!--****************************************************************************-->
 <?php
 R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

 if (isset($_POST['register'])){


     $studentmarks  = R::dispense('studentmarks');
     $studentmarks->admission_number=$_POST['admission_number'];
     $studentmarks->year=$_POST['year'];
     $studentmarks->course=$_POST['course_id'];
     $studentmarks->theory1=$_POST['theory1'];
     $studentmarks->practical1=$_POST['prac1'];
     $studentmarks->ittd1=$_POST['ittd1'];
     $studentmarks->test1=$_POST['test1'];
     $studentmarks->theory2=$_POST['theory2'];
     $studentmarks->practical2=$_POST['prac2'];
     $studentmarks->ittd2=$_POST['ittd2'];
     $studentmarks->test2=$_POST['test2'];
     $studentmarks->practical3=$_POST['prac3'];
     $studentmarks->ittd3=$_POST['ittd3'];
     $studentmarks  ->date =date('Y-m-d H:i:s');
     R::store($studentmarks );

     $message = "mark updated";

      }?>

<!--****************************************************************************-->


                </div>
                </p>


            </div>
            
        </div>
    </div>

<?php
include("footer.php");
?>
