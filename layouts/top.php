<?php
  require_once 'includes/includes.php';
  
error_reporting(0);
    session_start();
    if(!Session::is_authenticated()){
        header('index.php');
    }
    //destroying session
    if(isset($_POST['btnLogout'])){
        Session::logout();
        header('index.php');
    }
//
//    // //checking if password has been changed
//    // User::check_username_password();
//
//    //getting user details
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

    <title>Church Management System</title>

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
                        <a href="dashboard.php" class="site_title"><i class="fa fa-home"></i> <span>COP</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="row profile">
                        <div class="profile_pic">
                            <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome</span>
                            <h2><?php echo ucwords($user['name']); ?></h2>
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
                                </li> -->
                                <?php
                                   if ($_SESSION['Access_Level'] == 'admin') {
                                ?>
                                       <li><a><i class="fa fa-user"></i> Membership Registration <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        <!--/*  <li><a><i class="fa fa-list"></i> Family Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_rec.php"><i class="fa fa-user"></i> New Member</a></li> 
                                           <li><a href="manage_family_membership.php"><i class="fa fa-user"></i>Partner Registration</a></li>  
                                           <li><a href="manage_member_child.php"><i class="fa fa-user"></i>Children</a></li> 
                                           
                                           </ul>
                                           </li>*/-->
                                            <li><a><i class="fa fa-list"></i> Single Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_rec.php"><i class="fa fa-user"></i> New Member</a></li> 
                                             <li><a href="manage_member_child.php"><i class="fa fa-user"></i>Children</a></li>
                                        </ul>
                                        </li>
                                       
                                        </ul>
                                </li>
                                  <li><a><i class="fa fa-list"></i> Converts Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_convert.php"><i class="fa fa-user"></i>New Convert</a></li>
                                             <li><a href="manage_converts.php"><i class="fa fa-user"></i>Convert List</a></li>
                                        </ul>
                                        </li>
                                         <li><a><i class="fa fa-list"></i> Transfer Member <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="Add_transfer.php"><i class="fa fa-user"></i> Transfer Member</a></li> 
                                             <li><a href="manage_transfer.php"><i class="fa fa-user"></i> Transfer List</a></li> 
                                        </ul>
                                        </li>
                                  <li><a><i class="fa fa-user"></i> Notification Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                          
                                           <li><a href="sms_members.php"><i class="fa fa-user"></i>SMS To All Members</a></li> 
                                            <li><a href="sms_birthdays.php"><i class="fa fa-user"></i>SMS To Birthday Month(s)</a></li>  
                                           <li><a href="sms_converts.php"><i class="fa fa-user"></i> SMS To Converts</a></li>  
                                            <li><a href="manage_mem_group.php"><i class="fa fa-user"></i> SMS To Group</a></li>  
                                            <li><a href="manage_sms_ind.php"><i class="fa fa-user"></i> SMS To Individual</a></li> 
                                            
                                        </ul>
                                </li>
                                  <li><a><i class="fa fa-user"></i> Other Group Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                           <li><a href="group_rec.php"><i class="fa fa-user"></i> New Group</a></li>
                                            <li><a href="other_groups.php"><i class="fa fa-user"></i> Other Group List</a></li>  
                                            <li><a href="manage_grp_list.php"><i class="fa fa-user"></i> Add Member</a></li> 
                                           
                                        </ul>
                                </li>
                                 <li><a><i class="fa fa-user"></i> Generational Group Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_fetchmem.php"><i class="fa fa-user"></i>Group List</a></li> 
                                            <li><a href="manage_dues.php"><i class="fa fa-user"></i> Dues</a></li> 
                                            <li><a href="manage_mem_group.php"><i class="fa fa-user"></i>SMS To Group</a></li> 
                                         
                                        </ul>
                                </li>  <li><a href="new_client.php"><i class="fa fa-user"></i> Create Users</a></li>
                                            <li><a href="manage_clients.php"><i class="fa fa-user"></i>Manage Users</a></li> 
                                           </li> 
                                  <li><a><i class="fa fa-user"></i> Registration Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                          
                                           <li><a href="event_rec.php"><i class="fa fa-user"></i>New Event</a></li>  
                                            <li><a href="manage_bap_marry.php"><i class="fa fa-user"></i> New Baptism</a></li>
                                            <li><a href="manage_new_marriage.php"><i class="fa fa-user"></i> New Marriage</a></li> 
                                            <li><a href="attendance.php"><i class="fa fa-user"></i> Attendance</a></li> 
                                        </ul>
                                </li>
                                        <li><a><i class="fa fa-list"></i> Manage Information <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                           <li><a href="manage_members.php"><i class="fa fa-users"></i> Members</a></li> 
                                           <li><a href="manage_events.php"><i class="fa fa-users"></i> Events</a></li>  
                                              <li><a href="manage_marriage.php"><i class="fa fa-users"></i> Marriage</a></li> 
                                            <li><a href="manage_baptism.php"><i class="fa fa-users"></i> Baptism</a></li> 
                                            <li><a href="manage_attendance.php"><i class="fa fa-users"></i> Attendance</a></li> 
                                        </ul>
                                </li>    
                                            
                                    <li><a><i class="fa fa-money"></i> Financials <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        
                                           <li><a href="manage_add_welfare.php"><i class="fa fa-users"></i> Add Welfare Members</a></li> 
                                           <li><a href="expense_rec.php"><i class="fa fa-users"></i> Expenditure</a></li>  
                                           <li><a href="manage_tithe.php"><i class="fa fa-users"></i> Tithe</a></li> 
                                           <li><a href="account_rec.php"><i class="fa fa-users"></i> Offertory</a></li> 
                                            <li><a href="account_rec.php"><i class="fa fa-users"></i> VTO</a></li>
                                            <li><a href="welfare_list.php"><i class="fa fa-users"></i> Welfare</a></li> 
                                        </ul>
                                        
<!--                                -->
<!--
                                <li><a href="manage_stations.php"><i class="fa fa-car"></i> Manage Stations</a></li>
                                  
-->
                                  <li><a href="dashboard2.php"><i class="fa fa-clipboard"></i> Reports</a></li> 
                                <?php
                                   }
                                ?>

                                <?php
                                   if ($_SESSION['Access_Level'] == 'user') {
                                ?>
                                       <li><a><i class="fa fa-user"></i> Membership Registration <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        <!--  <li><a><i class="fa fa-list"></i> Family Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_rec.php"><i class="fa fa-user"></i> New Member</a></li> 
                                           <li><a href="manage_family_membership.php"><i class="fa fa-user"></i>Partner Registration</a></li>  
                                           <li><a href="manage_member_child.php"><i class="fa fa-user"></i>Children</a></li> 
                                           
                                           </ul>
                                           </li>-->
                                            <li><a><i class="fa fa-list"></i> Single Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_rec.php"><i class="fa fa-user"></i> New Member</a></li> 
                                             <li><a href="manage_member_child.php"><i class="fa fa-user"></i>Children</a></li>
                                        </ul>
                                        </li>
                                        
                                        </ul>
                                </li>
                                 <li><a><i class="fa fa-list"></i> Converts Registration <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="membership_convert.php"><i class="fa fa-user"></i>New Convert</a></li>
                                             <li><a href="manage_converts.php"><i class="fa fa-user"></i>Convert List</a></li>
                                        </ul>
                                        </li>
                                         <li><a><i class="fa fa-list"></i> Transfer Member <span class="fa fa-chevron-down"></span>
                                          </a>
                                            <ul class="nav child_menu" style="display: none">
                                            <li><a href="Add_transfer.php"><i class="fa fa-user"></i> Transfer Member</a></li> 
                                             <li><a href="manage_transfer.php"><i class="fa fa-user"></i> Transfer List</a></li> 
                                        </ul>
                                        </li>
                                  <li><a><i class="fa fa-user"></i> Notification Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                          
                                           <li><a href="sms_members.php"><i class="fa fa-user"></i>SMS To All Members</a></li>  
                                            <li><a href="sms_birthdays.php"><i class="fa fa-user"></i>SMS To Birthday Month(s)</a></li>  
                                           <li><a href="sms_converts.php"><i class="fa fa-user"></i> SMS To Converts</a></li>  
                                            <li><a href="manage_mem_group.php"><i class="fa fa-user"></i> SMS To Group</a></li>  
                                            <li><a href="manage_sms_ind.php"><i class="fa fa-user"></i> SMS To Individual</a></li> 
                                            
                                        </ul>
                                </li>
                                  <li><a><i class="fa fa-user"></i> Other Group Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                           <li><a href="group_rec.php"><i class="fa fa-user"></i> New Group</a></li>  
                                            <li><a href="manage_grp_list.php"><i class="fa fa-user"></i> Add Member</a></li> 
                                           
                                        </ul>
                                </li>
                                 <li><a><i class="fa fa-user"></i> Generational Group Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_fetchmem.php"><i class="fa fa-user"></i>Group List</a></li> 
                                            <li><a href="manage_dues.php"><i class="fa fa-user"></i> Dues</a></li> 
                                            <li><a href="manage_mem_group.php"><i class="fa fa-user"></i>SMS To Group</a></li> 
                                         
                                        </ul>
                                </li>  <!--<li><a href="new_client.php"><i class="fa fa-user"></i> Create Users</a></li>
                                            <li><a href="manage_clients.php"><i class="fa fa-user"></i>Manage Users</a></li> 
                                           </li> -->
                                  <li><a><i class="fa fa-user"></i> Registration Panel <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                          
                                           <li><a href="event_rec.php"><i class="fa fa-user"></i>New Event</a></li>  
                                            <li><a href="manage_bap_marry.php"><i class="fa fa-user"></i> New Baptism</a></li>
                                            <li><a href="manage_bap_marry.php"><i class="fa fa-user"></i> New Marriage</a></li> 
                                            <li><a href="attendance.php"><i class="fa fa-user"></i> Attendance</a></li> 
                                        </ul>
                                </li>
                                        <li><a><i class="fa fa-list"></i> Manage Information <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                           <li><a href="manage_members.php"><i class="fa fa-users"></i> Members</a></li> 
                                           <li><a href="manage_events.php"><i class="fa fa-users"></i> Events</a></li>  
                                              <li><a href="manage_marriage.php"><i class="fa fa-users"></i> Marriage</a></li> 
                                            <li><a href="manage_baptism.php"><i class="fa fa-users"></i> Baptism</a></li> 
                                            <li><a href="manage_attendance.php"><i class="fa fa-users"></i> Attendance</a></li> 
                                        </ul>
                                </li>    
                                            
                                   <!-- <li><a><i class="fa fa-money"></i> Financials <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        
                                           <li><a href="manage_add_welfare.php"><i class="fa fa-users"></i> Add Welfare Members</a></li> 
                                           <li><a href="expense_rec.php"><i class="fa fa-users"></i> Expenditure</a></li>  
                                           <li><a href="manage_tithe.php"><i class="fa fa-users"></i> Tithe</a></li> 
                                           <li><a href="account_rec.php"><i class="fa fa-users"></i> Offertory</a></li> 
                                            <li><a href="account_rec.php"><i class="fa fa-users"></i> VTO</a></li>
                                            <li><a href="welfare_list.php"><i class="fa fa-users"></i> Welfare</a></li> 
                                        </ul>
                                        
<!--                                -->
<!--
                                <li><a href="manage_stations.php"><i class="fa fa-car"></i> Manage Stations</a></li>
                                  
-->
                                 <!-- <li><a href="admin_reports.php"><i class="fa fa-clipboard"></i> Reports</a></li>--> 
                                <?php
                                   }
                                ?>

 <?php
                                   if ($_SESSION['Access_Level'] == 'finance') {
                                ?>
                                      
                                            
                                    <li><a><i class="fa fa-money"></i> Financials <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                        
                                           <li><a href="manage_add_welfare.php"><i class="fa fa-users"></i> Add Welfare Members</a></li> 
                                           <li><a href="expense_rec.php"><i class="fa fa-users"></i> Expenditure</a></li>  
                                           <li><a href="manage_tithe.php"><i class="fa fa-users"></i> Tithe</a></li> 
                                           <li><a href="account_rec.php"><i class="fa fa-users"></i> Offertory</a></li> 
                                            <li><a href="account_rec.php"><i class="fa fa-users"></i> VTO</a></li>
                                            <li><a href="welfare_list.php"><i class="fa fa-users"></i> Welfare</a></li> 
                                        </ul>
                                        
<!--                                -->
<!--
                                <li><a href="manage_stations.php"><i class="fa fa-car"></i> Manage Stations</a></li>
                                  
-->
                                  <li><a href="dashboard2.php"><i class="fa fa-clipboard"></i> Reports</a></li> 
                                <?php
                                   }
                                ?>

                                
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
