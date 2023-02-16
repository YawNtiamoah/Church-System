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
            <p align="right"><a href="manage_mem_report_day.php">Specific Record</a><a href="manage_mem_report_day.php">Month Record</a><a href="manage_mem_report_year.php">Year Record</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Converts</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           <p align="right"><a href="manage_convert_day.php">Specific Record</a><a href="manage_convert_mon.php">Month Record</a><a href="manage_convert_year.php">Year Record</a></p>  </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-up"></span> Event</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           <p align="right"><a href="manage_event_day.php">Specific Record</a><a href="manage_event_mon.php">Month Record</a><a href="manage_event_year.php">Year Record</a></p> </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-circle-down"></span> Offering Acc</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           <p align="right"><a href="manage_account_day.php">Specific Record</a><a href="manage_account_month.php">Month Record</a><a href="manage_account_year.php">Year Record</a></p> </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_tithe_report.php">Quick View Record</a>  <a href="manage_tithe_report_year.php">Individual Report Record</a></p>  </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-user"></span> Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_welfare_report.php">Quick View Record</a>  <a href="manage_welfare_report_year.php">Year Record</a></p> </div>
        </div>

        

         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Welfare Beneficiaries</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
          <p align="right"><a href="manage_benefit.php">Quick View Record</a> <a href="manage_benefit_report_year.php">Year Record</a></p>  </div>
        </div>

       
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Expense</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_expense.php">Quick View</a> <a href="manage_mon_expense.php">Month Record</a>  <a href="manage_expense_report.php">Year Record</a></p> </div>
        </div>

	</div>
<?php   }  ?>
<?php
 if ($_SESSION['Access_Level'] == 'user') {
?>
<div class="row">
		<div class="row">
		<div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Membership</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
            <p align="right"><a href="manage_mem_report_day.php">Specific Record</a><a href="manage_mem_report_day.php">Month Record</a><a href="manage_mem_report_year.php">Year Record</a></p>
          </div>
        </div>
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Converts</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           <p align="right"><a href="manage_convert_day.php">Specific Record</a><a href="manage_convert_mon.php">Month Record</a><a href="manage_convert_year.php">Year Record</a></p>  </div>
        </div>
        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-arrow-up"></span> Event</h3>
            <p align="right"><?php echo date('Y-M-D'); ?></p>
           <p align="right"><a href="manage_event_day.php">Specific Record</a><a href="manage_event_mon.php">Month Record</a><a href="manage_event_year.php">Year Record</a></p> </div>
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
           <p align="right"><a href="manage_account_day.php">Specific Record</a><a href="manage_account_month.php">Month Record</a><a href="manage_account_year.php">Year Record</a></p> </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-home"></span> Tithe</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_tithe_report.php">Quick View Record</a>  <a href="manage_tithe_report_year.php">Individual Report Record</a></p>  </div>
        </div>

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-user"></span> Welfare</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_welfare_report.php">Quick View Record</a>  <a href="manage_welfare_report_year.php">Year Record</a></p> </div>
        </div>

        

         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-bell"></span> Welfare Beneficiaries</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
          <p align="right"><a href="manage_benefit.php">Quick View Record</a> <a href="manage_benefit_report_year.php">Year Record</a></p>  </div>
        </div>

       
         <div class="panel panel-default col-lg-4 col-md-4 col-sm-12">
          <div class="panel-body">
            <h3><span class="fa fa-users"></span> Expense</h3>
            <p align="right"><?php echo date('Y-M-D');?></p>
           <p align="right"><a href="manage_expense.php">Quick View</a> <a href="manage_mon_expense.php">Month Record</a>  <a href="manage_expense_report.php">Year Record</a></p> </div>
        </div>

	</div>
<?php   }  ?>
<?php
	include 'layouts/bottom.php';
?>