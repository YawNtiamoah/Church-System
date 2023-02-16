<?php
  //  include 'layouts/top.php';
include "includes/includes.php";
error_reporting(0);
    //getting bill details
    $details = User::find_by_id($_GET['tr']);
    $member = $database->fetch_array($details);

    //getting user details
   /* $res = User::find_by_id($id);
    $user = $database->fetch_array($res);

    //hotel details
    $qry = Hotel::find();
    $hotel = $database->fetch_array($qry);*/


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
<script>
window.print(); 
</script>
  <div class="">
                    <div class="page-title">
                        <div class="title_left" >
                            <h3 align="center">CHURCH OF PENTECOST ABLEKUMA-AGAPE CENTRAL </h3>
                      </div>

                       
                    </div>
                    <div class="clearfix"></div>

                    <div class="row" id="output">
                        <div class="col-md-20">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Membership Information</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <section class="content invoice">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-xs-12 invoice-header">
                                                <h1>
                                       <i class="fa fa-globe pull-right"></i> 
                                        <small class="pull-left">Date: <?php echo date("d / M / Y"); ?></small>  
                                    </h1>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                          <div class="row">
                                            <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col"></div>
                                            <div class="col-sm-4 invoice-col">                                            </div>
                                            <!-- /.col -->
                                         
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row --><!-- /.col -->
                                            <div class="col-xs-24">
                                              <p class="lead"> </p>
                                              <div class="table-responsive">
                    
                                                Membership Information
                      <?php                       $sql = "SELECT *  FROM membership WHERE converts='0' "; 
 $result = $database->query_db($sql);  
  

      ?>
                          <table class="table table bordered">  
                               <tr>  
                                   <th>#</th>
									<th>Image</th>
                                    <th>Full Name</th>
                                    <th>DOB</th> 
                                    <th>Gender</th>
									<th>Phone Number</th>
									<th>House Number</th> 
                                    <th>Group Name</th> 
                                   
                                    
                               </tr>    
  <?php    $counter = 1;
     while($row = $database->fetch_array($result)){

         $amt+=$counter;
         ?>
               <tr id="<?php echo $row['ID']; ?>">  
                      <td><?php echo $counter++; ?></td>
				<?php if($row['logo']!==""){
                   echo '<td><img src="images/'.$row["logo"].'" width="75" height="50" alt="" /></td> ';
					 }
					 else{
					echo '<td> <img src="assets/images/user.png" width="75" height="50" alt="..." ></td> ';
						 }
						 ?>
                   <td><?php echo $row['Full_Name']; ?></td>
                     <td><?php echo $row['DOB']; ?></td>
                     <td><?php echo $row['Gender'];?></td>
                     <td><?php echo $row['Phone'];?></td>
					 <td><?php echo $row['House_Number'];?></td>
					 <td><?php echo $row['Group'];?></td>
                      
                     
                </tr>  
           
          <?php } ?>

                <tr>  
                      <td></td>
                        <td></td> 
                      <td>Total members :</td>
					  <td><?php echo number_format($amt,3); ?></td>
                       <td></td>
                     
                  
                </tr> 
           
            </table>
                                              </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-xs-12">
                                 </div>
                    </div>
            

                
  </div>
<?php
    include 'layouts/bottom.php';
?>


