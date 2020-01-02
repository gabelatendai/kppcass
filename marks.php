<?php

include "header.php";
include('config.php');
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
$conn=mysqli_connect("localhost", "root", "","cadss_db");
$cos = $_GET['course'];
$query=mysqli_query($conn,"select * from studentmarks where course='$cos'")or die(mysql_error());
$row=mysqli_fetch_array($query);

//$number = $row['admission_number'];

?>

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Update Mark</div>
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="float:left; position:relative">
                        <h4><font color="green">Marks Entry</font></h4>
                        <table>
                            <tr>
                                <td><label>Student Name</label></td>
                                <td><select  name="admission_number" class="select2_single form-control" tabindex="-1" required="required">
                                        <?php

                                        $res= mysqli_query($conn,"select * from students") or die (mysql_error());
                                        while ($ro= mysqli_fetch_array ($res) ){
                                            $id=$ro['admission_number'];
                                            ?>
                                            <option value="<?php echo $ro['admission_number']; ?>"><?php echo $ro['firstname']." ".$ro['lastname']; ?></option>
                                        <?php } ?>
                                    </select></td>
                                <td><label>Year</label></td>
                                <td> <?php echo $row['year']; ?> </td> </tr></table>

                    </div>

                    <div style="float:left; position:relative">
                        <h4><font color="green">Marks </font></h4>

                        <table><tr>
                                <td><label>Theory Assignment
                                        <input type="number" name="theory" id="a" value="<?php echo $row['theory2']; ?>" class="form-control"  onkeyup="final()" max="100" >
                                </td>
                                <td><label>Practical Assignment
                                        <input type="number" name="practical" id="b" class="form-control"  value="<?php echo $row['practical2']; ?>" onkeyup="final()" max="100" >
                                </td></tr>

                            <tr>
                                <td><label>ITTD
                                        <input type="number" name="field" id="c" class="form-control"  value="<?php echo $row['ittd2'] ;?>" onkeyup="final()" max="100" >
                                </td>
                                <td><label>Test
                                        <input type="number" name="test" id="d" class="form-control"  value="<?php echo $row['test2']; ?>" onkeyup="final()" max="100" >
                                </td></tr>
                        </table>
                        <br>
                        <div style="float:right;  position:relative; clear:both;">
                            <?php   echo @$message;    ?>
                            <input type="submit" name="update" value="Record Marks" class="btn btn-success" >
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
$id = $_GET['course'];

if (isset($_POST['update'])){

    $number = $_POST['admission_number'];
    // $studentmarks  = R::load('studentmarks',$_POST['course']);
    $theory2=$_POST['theory'];
    $practical2=$_POST['practical'];
    $ittd2=$_POST['field'];
    $test2=$_POST['test'];
    // $studentmarks  ->date =date('Y-m-d H:i:s');
    // R::store($studentmarks );
    mysqli_query($conn," UPDATE studentmarks SET theory2='$theory2', practical2='$practical2', ittd2='$ittd2', test2='$test2' WHERE course = '$id' and admission_number ='$number'")or die(mysql_error());
    echo "<script>alert('Successfully Update Admin Info!'); window.location='marks.php'</script>";
    $message = "mark updated";
//echo  "mark updated";

}

include "footer.php";
?><script language="javascript" type="text/javascript">
    $(window).load(function()
    {
        $('#loading').hide();
    });
</script>