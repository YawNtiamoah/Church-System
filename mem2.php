<?php
  //  include 'layouts/top.php';
include "includes/includes.php";

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
                      <div class="title_left">COP AGAPE CENTRAL </div>

                       
                    </div>
                    <div class="clearfix"></div>

                    <div class="row" id="output">
                        <div class="col-md-12">
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
                                        <!-- /.row -->
 <div class="col-sm-4 invoice-col">
                                                <b>Transaction_ID #<?php echo $member['Transaction_ID'] ?></b><br/>
                                                <b>Mem_ID # <?php
												
											
                         if($member['Commune']=="Communicant" && $member['Gender']=="Male"){
                           echo "MC/".$member['ID'];
                           }
                        elseif($member['Commune']=="Non-Communicant" && $member['Gender']=="Male"){
                           echo "MNC/".$member['ID'];
                          }
                         elseif($member['Commune']=="Communicant" && $member['Gender']=="Female"){
                           echo "FC/".$member['ID'];
                           }
                        elseif($member['Commune']=="Non-Communicant"  && $member['Gender']=="Female"){
                           echo "FNC/".$member['ID'];
                          }
												
												 ?></b>
                                                <br>
                                                <?php 
												
												if($member['file_path']!==""){
												echo $member['file_path']; 
												}
												else{?>
													 <img src="assets/images/user.png" alt="..." >
													<?php }
												
												?>
                                            </div>
                                      
                                            <!-- /.col -->
                                            <div class="col-xs-8">
                                              <p class="lead">Information  </p>
                                              <div class="table-responsive">
                    <table width="1108" class="table">
                                                        <tbody>
                                                            <tr>
                                                              <td width="26%"><div align="right" class="style12"><strong>First Name :</strong></div></td>
                                                                <td width="48%"><?php echo $member['First_Name']; ?></td>
                                                                <td width="9%">&nbsp;</td>
                                                                <td width="17%">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Surname :</strong></div></td>
                                                                <td><?php echo $member['Surname']; ?></td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Other Names :</strong></div></td>
                                                                <td><?php echo $member['Other_Name']; ?></td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    Tithe Information
                          <?php      $id=$_GET['tr'];                     $sql = "SELECT *,SUM(Amount) AS tot  FROM tithe WHERE Transaction_ID='".$id."'"; 
 $result = $database->query_db($sql);  
  

      ?>
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>Transaction ID </th> 
                                    <th>Amount</th> 
                                   
                                    
                               </tr>    
  <?php    $counter = 1;
     $row = $database->fetch_array($result);

        //  $amt+=$row['Amount'];
         ?>
                <tr>  
                      <td><?php echo $counter ?></td>'; 
                      <td><?php echo $row['Transaction_ID']; ?></td>
					  <td><?php echo number_format($row['tot'],3); ?></td>
                     
                  
                </tr>  
           
          

              
           
            </table>
             Welfare Information
                          <?php      $id=$_GET['tr'];                     $sq = "SELECT *,SUM(Amount) AS tot  FROM welfare WHERE Transaction_ID='".$id."'"; 
 $resul = $database->query_db($sq);  
  

      ?>
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>Transaction ID </th>
                                    <th>Amount</th> 
                                    
                                    
                               </tr>    
  <?php    $counter = 1;
     $row1 = $database->fetch_array($resul);

        //  $amt+=$row['Amount'];
         ?>
                <tr>  
                      <td><?php echo $counter ?></td>'; 
                      <td><?php echo $row1['Transaction_ID']; ?></td>
					  <td><?php echo number_format($row1['tot'],3); ?></td>
                   
                  
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


