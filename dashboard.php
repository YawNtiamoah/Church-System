<?php
	include 'layouts/top.php';
?>
<?php
 if ($_SESSION['Access_Level'] == 'admin') {
?>
<div class="row">
		<div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Membership</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo User::total_users(); ?></h1>
            <p align="right"><a href="manage_members.php">View All</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Converts</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo User::total_convert(); ?></h1>
            <p align="right"><a href="manage_converts.php">View All</a></p>
          </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-up"></span> Event</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo Events::total_event(); ?></h1>
            <p align="right"><a href="manage_events.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-circle-down"></span> Offering Acc</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo account::total_account_all(); ?></h1>
            <p align="right"><a href="manage_account.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           	<h1><?php echo tithe::total_tithe_all(); ?></h1>
            <p align="right"><a href="manage_tithe_report.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-user"></span> Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo welfare::total_welfare_all(); ?></h1>
            <p align="right"><a href="manage_welfare_report.php">View All</a></p>
          </div>
        </div>

         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Daily Account</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo account::total_account_day(); ?></h1>
            <p align="right"><a href="daily_account.php">View All</a></p>
          </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Daily Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo tithe::total_tithe_day(); ?></h1>
            <p align="right"><a href="daily_tithe.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Daily Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php  echo welfare::total_welfare_day(); ?></h1>
            <p align="right"><a href="daily_welfare.php">View All</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Welfare Beneficiaries</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo welfare::total_welfare_all_benefit(); ?></h1>
            <p align="right"><a href="manage_benefit.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Daily Welfare Bene.</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php  echo welfare::total_welfare_day_benefit(); ?></h1>
            <p align="right"><a href="daily_benefits.php">View All</a></p>
          </div>
          </div>
         
          <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Attendance</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php echo Attendence::total_attendence(); ?></h1>
             <p align="right"><a href="#">View All</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Birthdays</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php echo User::find_DOB_NO(); ?></h1>
             <p align="right"><a href="manage_birthdays.php">View All</a></p>
          </div>
        </div>
<div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Expense</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php // echo expense::total_expense_account(); ?></h1>
            <p align="right"><a href="manage_expense.php">View All</a></p>
          </div>
        </div>
	</div>
<?php   }  ?>
<?php
 if ($_SESSION['Access_Level'] == 'user') {
?>
<div class="row">
		<div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Membership</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo User::total_users(); ?></h1>
            <p align="right"><a href="manage_members.php">View All</a></p>
          </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Converts</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo User::total_convert(); ?></h1>
            <p align="right"><a href="manage_converts.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-up"></span> Event</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo Events::total_event(); ?></h1>
            <p align="right"><a href="manage_events.php">View All</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Birthdays</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php echo User::find_DOB_NO(); ?></h1>
             <p align="right"><a href="manage_birthdays.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Attendance</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php echo Attendence::total_attendence(); ?></h1>
            <p align="right"></p>
          </div>
        </div>

      

	</div>
<?php   }  ?>
<?php
 if ($_SESSION['Access_Level'] == 'finance') {
?>
<div class="row">


          <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-circle-down"></span> Offering Acc</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           	<h1><?php echo account::total_account_all(); ?></h1>
            <p align="right"><a href="manage_account.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           	<h1><?php echo tithe::total_tithe_all(); ?></h1>
            <p align="right"><a href="manage_tithe_report.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-user"></span> Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo welfare::total_welfare_all(); ?></h1>
            <p align="right"><a href="manage_welfare_report.php">View All</a></p>
          </div>
        </div>

         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Daily Account</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo account::total_account_day(); ?></h1>
            <p align="right"><a href="daily_account.php">View All</a></p>
          </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Daily Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo tithe::total_tithe_day(); ?></h1>
            <p align="right"><a href="daily_tithe.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Daily Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php  echo welfare::total_welfare_day(); ?></h1>
            <p align="right"><a href="daily_welfare.php">View All</a></p>
          </div>
        </div>
 <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Welfare Beneficiaries</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php echo welfare::total_welfare_all_benefit(); ?></h1>
            <p align="right"><a href="manage_benefit.php">View All</a></p>
          </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Daily Welfare Beneficiaries</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php  echo welfare::total_welfare_day_benefit(); ?></h1>
            <p align="right"><a href="daily_benefits.php">View All</a></p>
          </div>
        </div>
          <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Expense</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
            <h1><?php  echo expense::total_expense_account(); ?></h1>
            <p align="right"><a href="manage_expense.php">View All</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Attendance</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
             <h1><?php echo Attendence::total_attendence(); ?></h1>
            <p align="right"></p>
          </div>
        </div>
	</div>
<?php   }  ?>
<?php
	include 'layouts/bottom.php';
?>