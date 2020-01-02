<?php
SESSION_START();
include "header.php";
?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li ><a href="students.php">New Student <img src="assets/img/new.png"> </a></li>
                                  <li ><a href="updatestudent.php">Update Existing Record <img src="assets/img/update2.png"> </a></li>
                                  <li><a href="deletestudentrecord.php">Delete Record<img src="assets/img/delete2.png"></a></li>
                                  <li class="active"><a href="viewstudentrecord.php">View List<img src="assets/img/view2.png"></a></li>
                                  <li><a href="importstudentlist.php">Import Data (CSV) <img src="assets/img/import.png"></a></li>
                                  <li><a href="exportstudentlist.php">EXPORT Data (CSV) <img src="assets/img/export.png"></a></li>
                                  <li><a href="searchstudent.php">Search <img src="assets/img/search.png"></a></li>
                                  <li><a href="billingstudent.php">Billing </a></li>
                                  <li><a href="studentcreditnotes.php">Credit Notes </a></li>
                                </ul>
                            <br>
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
 

<h4>View Students</h4>
    <form method="POST" action="viewstudentrecord.php">
        <input type="hidden" name="submitted" value="true"/>
        <label>Search Caterory
            <select name="category">
                <option value="dateofadmission">dateofadmission</option>
                <option value="admno">admno</option>
                <option value="SirName">SirName</option>
                <option value="Firstname">Firstname</option>
                <option value="lastname">lastname</option>
                <option value="idno">idno</option>
                <option value="dateofbirth">dateofbirth</option>
                <option value="gender">gender</option>
                <option value="mobile">mobile</option>
                <option value="courseid">courseid</option>

            </SELECT>
            </label>
        <label>Search Criteria<input  type="text" name="criteria" align="center"></label>
        
<input type="submit" />
</form>

       </div>
                </p>

            </div>
            
        </div>
    </div>
    
   <?php
   include "footer.php";

   ?>