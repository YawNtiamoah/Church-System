<?php
    include 'layouts/top.php';

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
  <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>COP AGAPE CENTRAL </h3>
                        </div>

                       
                    </div>
                    <div class="clearfix"></div>

                    <div class="row" id="output">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Membership Information</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
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
                                            <div class="col-xs-4">
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    Please make sure all information are correct .
                                                </p>
                                            </div>
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
                                                <a href="membership_rec.php?tr=<?php echo $_GET['tr'];  ?>&edit=1">Edit Personal Information</a> || <a href="membership_baptism.php?tr=<?php echo $_GET['tr'];  ?>&edit=1">Edit Baptism</a> || <a href="membership_confirmation.php?tr=<?php echo $_GET['tr'];  ?>&edit=1">Edit Confirmation</a> || <a href="membership_marriage.php?tr=<?php echo $_GET['tr'];  ?>&edit=1">Edit Marriage</a>
<div class="table-responsive">
                    <table width="1108" class="table">
                                                        <tbody>
                                                            <tr>
                                                              <td width="26%"><div align="right" class="style12"><strong>First Name :</strong></div></td>
                                                                <td width="18%"><?php echo $member['First_Name']; ?></td>
                                                                <td width="28%"><div align="right"><strong>Marital Status :</strong></div></td>
                                                                <td width="28%"><?php echo $member['Marital_Status']; ?> | <a href="manage_family.php?fid=<?php echo $member['family_ID'];  ?>">View Members</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Surname :</strong></div></td>
                                                                <td><?php echo $member['Surname']; ?></td>
                                                                <td><div align="right"><strong>Email :</strong></div></td>
                                                                <td><?php echo $member['Email']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Other Names :</strong></div></td>
                                                                <td><?php echo $member['Other_Name']; ?></td>
                                                                <td><div align="right"><strong>Phone :</strong></div></td>
                                                                <td><?php echo $member['Phone']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Date of Birth :</strong></div></td>
                                                                <td><?php echo $member['DOB']; ?></td>
                                                                <td><div align="right"><strong>Group Name :</strong></div></td>
                                                                <td><?php echo $member['Group']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Place of Birth :</strong></div></td>
                                                              <td width="18%"><?php echo $member['Place_of_Birth']; ?></td>
                                                              <td><div align="right"><strong>Baptism Date :</strong></div></td>
                                                              <td width="28%"><?php echo $member['Baptism_Date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right" class="style12"><strong>Gender :</strong></div></td>
                                                              <td><?php echo $member['Gender']; ?></td>
                                                              <td><div align="right"><strong>Baptism Venue :</strong></div></td>
                                                              <td><?php echo $member['Venue_Baptism']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td><div align="right"><strong><span class="style12">Nationality :</span></strong></div></td>
                                                              <td><?php echo $member['Nationality']; ?></td>
                                                              <td><div align="right"><strong>Confirmation Date :</strong></div></td>
                                                              <td><?php echo $member['Confirmation_Date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right"><strong>Postal Address :</strong></div></th>
                                                              <td><?php echo $member['Postal_Address']; ?></td>
                                                              <td><div align="right"><strong>Confirmation Venue :</strong></div></td>
                                                              <td><?php echo $member['Venue_Confirmation']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right"><strong>Residence Address :</strong></div></th>
                                                              <td><?php echo $member['Residence_Address']; ?></td>
                                                              <td><div align="right"><strong>Married Date :</strong></div></td>
                                                              <td><?php echo $member['Marriage_Date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right"><strong>Home Town :</strong></div></th>
                                                              <td><?php echo $member['Home_Town']; ?></td>
                                                              <td><div align="right"><strong>Number of children :</strong></div></td>
                                                              <td><?php echo $member['No_of_children']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right"><strong>Occupation :</strong></div></th>
                                                              <td><?php echo $member['Occupation']; ?></td>
                                                              <td><div align="right"><strong>Branch :</strong></div></td>
                                                              <td><?php echo $member['Branch']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right">House Number :</div></th>
                                                              <td><?php echo $member['House_Number']; ?></td>
                                                              <td><div align="right"><strong>Bapt. Minister Name :</strong></div></td>
                                                              <td><?php echo $member['Minister_Name_Baptism']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right">Communicant Type :</div></th>
                                                              <td><?php echo $member['Commune']; ?></td>
                                                              <td><div align="right"><strong>Conf.Minister Name :</strong></div></td>
                                                              <td><?php echo $member['Minister_Name_Confirmation']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th><div align="right">Transfered</div></th>
                                                              <td><?php if($member['transfer_id']==1){ echo "Yes"; } else{ echo "No"; }
															   ?> | <a href="membership_transfer.php?tr=<?php echo $_GET['tr'];  ?>&fname=<?php echo $member['Full_Name'];  ?>&edit=1">Edit Info</a></td>
                                                              <td><div align="right"><strong>Membership Type :</strong></div></td>
                                                              <td><?php echo $member['Mem_type']; ?></td>
                                                            </tr>
                                                        </tbody>
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
                            <a target="_blank" href="mem_print.php?tr=<?php echo $member['Transaction_ID']; ?>"><button class="btn btn-default" "><i class="fa fa-print"></i> Print</button> </a>  <a target="_blank" href="mem2.php?tr=<?php echo $member['Transaction_ID']; ?>"><button class="btn btn-default" "><i class="fa fa-print"></i> Print With Finance Information</button> </a>
                        </div>
                    </div>
            

                
  </div>
<?php
    include 'layouts/bottom.php';
?>


