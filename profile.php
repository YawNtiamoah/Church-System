<?php
    include 'includes/includes.php';
    session_start();
    //checking if user is an admin
    // is_admin();

    //destroying session
    if(isset($_POST['btnLogout'])){
        Session::logout();
        redirect_to('index.php');
    }



    //getting user details
    $res = User::find_by_id($_SESSION['user_id']);
    $user = $database->fetch_array($res);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GPRTU Management System</title>

    <!-- Bootstrap core CSS -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="assets/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="assets/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/nprogress.js"></script>
    
    <!--[if lt IE 9]>
        <script src="assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">
    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="dashboard.php" class="site_title"><i class="fa fa-home"></i> <span>HMS</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="row profile">
                        <div class="profile_pic">
                            <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo ucwords($user['full_name']); ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>MENU</h3>    
                            <ul class="nav side-menu">
                                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                                <!-- <li><a><i class="fa fa-home"></i> Manage Rooms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="rooms.php">Rooms</a>
                                        </li>
                                        <li><a href="room_types.php">Room Types</a>
                                        </li>
                                        <li><a href="discounts.php">Discounts</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user"></i> Manage Employees <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="new_employee.php">New Employee</a>
                                        </li>
                                        <li><a href="employees.php">All Employees</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-users"></i> Manage Customers <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="new_customer.php">New Customer</a>
                                        </li>
                                        <li><a href="customers.php">All Customers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="reservation.php"><i class="fa fa-calendar"></i> Reservation</a></li>
                                <li><a href="billings.php"><i class="fa fa-money"></i> Billing</a></li> -->
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a> -->
                        <a data-toggle="modal" data-target="#logout">
                            <span data-toggle="tooltip" data-placement="top" title="Logout" class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-wrench"></span> Settings
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="profile.php"><i class="fa fa-user pull-right"></i>   Profile</a>
                                    </li>
                                    <li><a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                 <!--sign out modal-->
                <div class="modal fade" id="logout">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                
                                <h4 class="modal-title"><span class="glyphicon glyphicon-off"></span> Log Out</h4>
                            </div><!-- end modal-header -->
                            <div class="modal-body">
                                <p><b>Are You Sure?<b></p>                      
                            </div><!-- end modal-body -->
                            
                            <div class="modal-footer">
                                <form method="post">
                                    <button type="submit" class="btn btn-success" name="btnLogout">Yes</button> <button class="btn btn-danger" data-dismiss="modal">No</button>
                                </form>
                            </div><!-- end modal-footer -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div><!-- end myModal -->
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                            //Change username
                            if (isset($_POST['btnUpdateUsername'])) {
                                $new_uname =trim($_POST['txtUname']);
                                $pass = sha1(trim($_POST['txtUnamePassword']));
                                if ($pass == $user['password']) {
                                    if (strlen($new_uname) >= 3) {
                                        $res = $database->query_db($conn, "UPDATE users SET username='$new_uname' WHERE user_id=".$_SESSION['user_id']."");
                                        if ($res) {
                                            echo "<script>
                                                    alert('USERNAME CHANGED');
                                                    </script>";
                                            
                                        }
                                        else{
                                             echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                            UNABLE TO UPDATE
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                        }
                                    }
                                    else{
                                        echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                            USERNAME MUST BE 3 OR MORE CHARACTERS!!!
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                    }
                                }
                                else{
                                    echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                           WRONG PASSWORD
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                }
                                
                            }
                        ?>
                        <?php
                            if (isset($_POST['btnUpdatePassword'])) {
                                $op = sha1(trim($_POST['txtOldPassword']));
                                $pass1 = trim($_POST['txtNewPass']);
                                $pass2 =trim($_POST['txtRNewPass']);

                                if ($op == $user['password']) {
                                    if ($pass1 == $pass2) {

                                        $pass1 = sha1($pass1);
                                        
                                        $res = $database->query_db("UPDATE users SET password='$pass1' WHERE user_id=".$_SESSION['user_id']."") or die(mysqli_error($conn));
                                        if ($res) {
                                            echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-success col-lg-4 text-center' role='alert'>
                                                           PASSWORD CHANGED
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                        }
                                        else{
                                            echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                           UNABLE TO CHANGE PASSWORD
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                        }
                                    }
                                    else{
                                        echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                           PASSWORDS DO NOT MATCH
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                    }
                                }
                                else{
                                    echo "<div class='container'>
                                                        <div class='col-lg-4'></div>
                                                        <div class='alert alert-danger col-lg-4 text-center' role='alert'>
                                                           WRONG OLD PASSWORD
                                                        </div>
                                                        <div class='col-lg-4'></div>
                                                      </div>";
                                }
                            }
                        ?>
                            
                            <div class="row">
                                <div class="container">

                                        <form method="post" class="form-horizontal form-label-left">

                                            <br />
                                            <span  class="section text-center">Change Password</span>
                                            <div class="item form-group">
                                                <label for="opassword" class="control-label col-md-3">Old Password *</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="opassword" type="password" name="txtOldPassword" class="form-control col-md-7 col-xs-12" required="required">
                                                </div>
                                            </div>
                                            
                                            <div class="item form-group">
                                                <label for="password" class="control-label col-md-3">Password *</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="password" type="password" name="txtNewPass" class="form-control col-md-7 col-xs-12" required="required">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password *</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="password2" type="password" name="txtRNewPass" class="form-control col-md-7 col-xs-12" required="required">
                                                </div>
                                            </div>
                                           
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button name="btnUpdatePassword" type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                         <form  method="post"  class="form-horizontal form-label-left">

                                            <br />
                                            <span  class="section text-center"> Change Username</span>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uname">Username <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="uname" class="form-control col-md-7 col-xs-12" name="txtUname" placeholder="Enter New Username" required="required" type="text">
                                                </div>
                                            </div>
                                           
                                            <div class="item form-group">
                                                <label for="password" class="control-label col-md-3">Password *</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="password" type="password" placeholder="Enter Current Password" name="txtUnamePassword" class="form-control col-md-7 col-xs-12" required="required">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                        
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button  type="submit" name="btnUpdateUsername" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                   
                                    
                                </div>

                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>



<?php
	include 'layouts/bottom.php';;
?>