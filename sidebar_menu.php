            <!-- sidebar navigation -->
            <link href="css/custom.css" rel="stylesheet">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="homepage.php" class="site_title"> <span>CADSS</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
					<a href="#">
                    <div class="profile">

        <div class="profile_pic">

                <img src="images/logo.JPG" style="height:65px; width:75px;" class=" profile_img">

        </div>

                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
							<h3 style="margin-top:85px; color: black"></h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li><a href="homepage.php" >Dashboard </a></li>
                                <li ><a href="viewstudents.php" >Students </a></li>
                                <li><a href="viewstaff.php">Staff Member </a></li>
                                <li><a href="course.php" >Courses </a></li>
                                <li><a href="departments.php" >Departments </a></li>
                                <li><a href="markstep1.php" >Marks </a></li>
                             <?php  if (isset($_SESSION['role'])) {
                                    ?>
                                    <li><a href="session_logout.php"><i class="fa fa-user"></i> Log out</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="login.php"><i class="fa fa-user"></i>Log in</a></li>
                                    <?php


                               }                                    ?>

                            </ul>
                        </div>

                  </div>
                  <!-- /sidebar menu -->

                </div>
            </div>
            <?php // } ?>
            <style>
                .nav ul li:hover  ul{ display:block;}
                .nav ul li{display: none; position:absolute;}
                .nav ul li ul{ display:block; color: yellow;}
                #sidebar-menu ul{ color: red;}
            </style>
            <!-- end of sidebar navigation -->