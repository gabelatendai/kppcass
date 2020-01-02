<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 14:24
 */
?>
<?php include ('header.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$id = $_GET['course'];
$cos= mysqli_query($conn,"select * from subjects where id = '$id' ");
$cosy= mysqli_fetch_array ($cos);

//$student = $_GET['student'];
?>
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
		var name = "Designed by: Gabriel Musodza";
		document.getElementById("demo").innerHTML = Date();
		document.getElementById("demo").innerHTML = name;
	}
</script>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php include "mark_header.php"; ?>
                <br>

            </div></div>
	    <td style="width:30px"><a button type='button'  onClick="javascript:printlayer('div-id-name')" class="btn btn-primary glyphicon  glyphicon-print"></a></td>
	    <td><a button type='button' class="btn btn-primary" href="markstep1">Back</a></td>
            </div>
            <div class="x_content">
                <!-- content starts here -->
                <div id="div-id-name">
	                <h3 align="center"> <?php  echo $cosy ['subjectname'] ;   ?> Students Course Work Marks </h3>

                    <div class="table-responsive col-md-offset-1">
	                    <table cellpadding="0"  border="1"  width="1300" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="example">

	                    <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Theory 1</th>
                                <th>Practical 1</th>
                                <th>ITTD1 1</th>
                                <th>TEST 1</th>
	                            <th>Theory2</th>
	                            <th>Practical 2</th>
	                            <th>ITTD1 2</th>
	                            <th>TEST 2</th>
                                <th>Practica3</th>
                                <th>ITTD 3</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                          // $stud= mysql_query("select * from students where admission_number = '$student' ");
                          // $r= mysql_fetch_array ($stud);{
                           // $student_name =$r['admission_number'];
                           // $ittd3 =$cat_row['ittd'];
                             $student = R::findAll('studentmarks', 'course =?', [$id]);
                              foreach ($student as $row) {
                              	$student =$row->admission_number;

                                $stud= mysqli_query($conn,"select * from students where admission_number = '$student' ");
                               $r= mysqli_fetch_array ($stud);

                                ?>
                                <tr>
                                    <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
                                     <td ><?php  echo $r['firstname']." ". $r['lastname']; ?></td>
                                    <td><?php echo $row->theory1; ?></td>
                                    <td><?php echo $row->practical1; ?></td>
                                    <td><?php echo $row->ittd1; ?></td>
                                    <td ><?php echo $row->test1; ?></td>
	                                <td><?php echo $row->theory2; ?></td>
	                                <td><?php echo $row->practical2; ?></td>
	                                <td ><?php echo $row->ittd2; ?></td>
	                                <td ><?php echo $row->test2; ?></td>
	                                <td ><?php echo $row->practical3; ?></td>
	                                <td ><?php echo $row->ittd3; ?></td>

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
<script language="javascript" type="text/javascript">
    $(window).load(function()
    {
        $('#loading').hide();
    });
</script>