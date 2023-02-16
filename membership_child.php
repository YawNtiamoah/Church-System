<?php
include 'layouts/top.php';

	//manager details
	/*$man = User::find_by_id($_SESSION['user_id']);
	$manager = $database->fetch_array($man);
*/
	//new client code
	if (isset($_POST['btnUpdate'])) {
		
		//$edit=;
		////////////////////////////////Edit personal Information///////////////////////////
	//	if(isset($_GET['edit'])){
			$client = new User;
	//	$client->tr_id = $database->prep($trr);
		$client->fname = $database->prep(trim($_POST['fn']));
		$client->fn = $database->prep(trim($_POST['fn'].' '.$_POST['sn'].' '.$_POST['on']));
		$client->sname = $database->prep(trim($_POST['sn']));
		$client->oname = $database->prep(trim($_POST['on']));
		$client->dob = $database->prep(trim($_POST['dob']));
		$client->resadd = $database->prep(trim($_POST['ra']));
		$client->pob = $database->prep(trim($_POST['pob']));
		$client->ht = $database->prep(trim($_POST['ht']));
		$client->gender = $database->prep(trim($_POST['gender']));
		$client->pa = $database->prep(trim($_POST['pa']));
		$client->occupation = $database->prep(trim($_POST['oc']));
		$client->nation = $database->prep(trim($_POST['nation']));
		$client->mst = $database->prep(trim($_POST['ms']));
		$client->email = $database->prep(trim($_POST['ea']));
		$client->phone = $database->prep(trim($_POST['ph']));
		$client->group = $database->prep(trim($_POST['gn']));
		$client->hse = $database->prep(trim($_POST['hse']));		
        $client->noc = $database->prep(trim($_POST['noc']));
		$client->fid = $database->prep(trim($fid));
		$client->comm = $database->prep(trim($_POST['comm']));
		$client->mtype = $database->prep(trim($_POST['mtype']));
		$client->age = $database->prep(trim($_POST['age']));
		
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		 $client->logo = $database->prep(trim($photo['imageUrl']));

			if($x['extension']=="jpg" || $x['extension']=="png" || $x['extension']=="gif"){
			$file='<img class="img-responsive" src="images/'.$photo['imageUrl'].'" width="200" height="200" alt="logo"/>
';		}
			else{
				
				}		
		$client->file_type = $database->prep(trim($file));
		if($_POST['ps']=="Yes"){
$client->lp=1;
}
else{
	$client->lp=0;
	}
	if($_POST['bs']=="Yes"){
		$client->lb=1;
	}
	else{
		$client->lb=0;
		}
		if($_POST['ms']=="Married"){
		$client->lm=1;	
			}
			elseif($_POST['ms']=="Single"){
		$client->lm=0;	
			}
			else{
				$client->lm=0;
				}
				if($_POST['cs']=="Yes"){
		$client->lc=1;	
			}
			else{
				$client->lc=0;
				}
			
		$client->del=0;
		$client->reg=$_SESSION['Region']="try";
		$client->dist=$_SESSION['District']="try";
		$client->branch=$_SESSION['Branch']="try";
        $tr=$_POST['tr'];
		$result = $client->update_member($tr);
		if ($result) {
			
			$success = "USER UPDATED";
			
			//	redirect_to('membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm');
				//header("Location:membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm");
				?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tr; ?>";
				</script>
				<?php
				}
				else{
					
				}}
			
	//}

			if (isset($_POST['btnSave'])) {
			////////////////new registration//////////////////
		
        $trr=rand(1,100).rand(10,20).rand(20,70).rand(4,13).date("d");
		$fid=$_POST['idf'];
		$client = new User;
		$client->tr_id = $database->prep($trr);
		$client->fname = $database->prep(trim($_POST['fn']));
		$client->fn = $database->prep(trim($_POST['fn'].' '.$_POST['sn'].' '.$_POST['on']));
		$client->sname = $database->prep(trim($_POST['sn']));
		$client->oname = $database->prep(trim($_POST['on']));
		$client->dob = $database->prep(trim($_POST['dob']));
		$client->resadd = $database->prep(trim($_POST['ra']));
		$client->pob = $database->prep(trim($_POST['pob']));
		$client->ht = $database->prep(trim($_POST['ht']));
		$client->gender = $database->prep(trim($_POST['gender']));
		$client->pa = $database->prep(trim($_POST['pa']));
		$client->occupation = $database->prep(trim($_POST['oc']));
		$client->nation = $database->prep(trim($_POST['nation']));
		$client->mst = $database->prep(trim($_POST['ms']));
		$client->email = $database->prep(trim($_POST['ea']));
		$client->phone = $database->prep(trim($_POST['ph']));
		$client->group = $database->prep(trim($_POST['gn']));
		$client->hse = $database->prep(trim($_POST['hse']));		
        $client->noc = $database->prep(trim($_POST['noc']));
		$client->fid = $database->prep(trim($fid));
		$client->comm = $database->prep(trim($_POST['comm']));
		$client->mtype = $database->prep(trim($_POST['mtype']));
		$client->age = $database->prep(trim($_POST['age']));
		
		
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		 $client->logo = $database->prep(trim($photo['imageUrl']));

			if($x['extension']=="jpg" || $x['extension']=="png" || $x['extension']=="gif"){
			$file='<img class="img-responsive" src="images/'.$photo['imageUrl'].'" width="200" height="200" alt="logo"/>
';		}
			else{
				
				}		
		$client->file_type = $database->prep(trim($file));
		if($_POST['ps']=="Yes"){
$client->lp=1;
}
else{
	$client->lp=0;
	}
	if($_POST['bs']=="Yes"){
		$client->lb=1;
			$lb=1;
	}
	else{
		$client->lb=0;
			$lb=0;
		}
		if($_POST['ms']=="Married"){
		$client->lm=1;
		
			$lm=1;
			
			}
			elseif($_POST['ms']=="Single"){
		$client->lm=0;
			$lm=0;	
			}
			else{
				$client->lm=0;
				}
				if($_POST['cs']=="Yes"){
		$client->lc=1;	
			$lc=1;
			}
			else{
				$client->lc=0;
					$lc=0;
				}
			$fullname=$database->prep(trim($_POST['fn'].' '.$_POST['sn'].' '.$_POST['on']));
		$client->del=0;
		$client->reg=$_SESSION['Region']="try";
		$client->dist=$_SESSION['District']="try";
		$client->branch=$_SESSION['Branch']="try";
 if(User::prevent_double($fullname)>0){
		   $failed = "FAILED TO SAVE USER EXIST";
	   }else{
		$result = $client->new_membership();
	   }
		if ($result) {
			
			$success = "USER SAVED";
			if($_POST['bs']=="Yes"){
				
				
			
			//	redirect_to('membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm');
				//header("Location:membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm");
				?>
				<script>
			window.location="membership_baptism.php?tr=<?php echo $trr; ?>&baptism=<?php echo $lb;?>&confirm=<?php  echo $lc; ?>&marry=<?php echo $lm; ?>";
				</script>
				<?php
				}
				elseif($_POST['cs']=="Yes"){
				
//redirect_to('membership_confirm.php?confirm=$lc&marry=$lm');
			
				header("Location:membership_confirmation.php?confirm=$lc&marry=$lm");			
				?>
				<script>
			window.location="membership_confirmation.php?tr=<?php echo $trr; ?>&confirm=<?php  echo $lc; ?>&marry=<?php  echo $lm; ?>";
				</script>
				<?php
					}
				elseif($_POST['ms']=="Married"){
				
			//	redirect_to('membership_marriage.php?marry=$lm');
			   
			header("Location:membership_marriage.php?marry=$lm");
				?>
				<script>
				window.location="membership_marriage.php?tr=<?php echo $trr; ?>&marry=<?php  echo $lm; ?>";
				</script>
				<?php
				}
				else{
					?>
				<script>
				window.location="membership_print.php?tr=<?php echo $trr; ?>";
				</script>
				<?php
					}
		}
		else{
			$failed = "FAILED TO SAVE USER";
		}
		}
	
		else{
			
			}
	
	
?>

	
	<div class="row">
	  <div class="row">
	  	<?php
	  		if (isset($success)) {
				
	  	?>
	  			<div class="col-md-4"></div>
	  			<div class="col-md-4 alert alert-success text-center"><?php echo @$success; ?></div><br />
	  	<?php
	  		}
	  		elseif(isset($failed)){
	  	?>
	  			<div class="col-md-4"></div>
	  			<div class="col-md-4 alert alert-danger text-center"><?php echo @$failed; ?></div><br />
	  	<?php
	  		}
	  	?>
        </div>
	  	<div class="row">
		    <br />
             <?php if(isset($_GET['edit'])){?>
			  <h3 align="center">Edit Children Registration Panel</h3>
                <?php  } else{  ?>
             
			 <h3 align="center">Children Registration Panel</h3>
            <?php
			}
			?>
		    
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" action="membership_child.php" class="col-md-6">
			  <div class="form-group">
              <?php 
			    $details = User::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
			    <label for="v_num">First Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter First Name" value="<?php if(isset($_GET['edit'])){echo trim($member['First_Name']);} else{echo "";}  ?>" name="fn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Surname*</label>
			    <input type="text" class="form-control" id="v_num" value="<?php if(isset($_GET['edit'])){echo trim($member['Surname']);} else{echo "";}  ?>" placeholder="Enter Surname" name="sn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Other Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Other Name" name="on" value="<?php if(isset($_GET['edit'])){echo trim($member['Other_Name']);} else{echo "";}  ?>" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">DOB*</label>
			    <input type="date" class="form-control" id="v_num" value="<?php if(isset($_GET['edit'])){echo trim($member['DOB']);} else{echo "";}  ?>"  name="dob"  >
			  </div>
               <div class="form-group">
			    <label for="v_num">Age*</label>
			    <input type="text" class="form-control" id="v_num" value="<?php if(isset($_GET['edit'])){echo trim($member['Age']);} else{echo "";}  ?>"  name="age"  >
			  </div>
              <div class="form-group">
			    <label for="v_num">Place Of Birth*</label>
			    <input type="text" class="form-control" value="<?php if(isset($_GET['edit'])){echo trim($member['Place_of_Birth']);} else{echo "";}  ?>" id="v_num" placeholder="Enter Place of Birth" name="pob" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Gender*</label>
			  
                <select  class="form-control" required  name="gender">
                  <option><?php if(isset($_GET['edit'])){echo trim($member['Gender']);} else{echo "--";}  ?></option>
                  
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group">
			    <label for="v_num">Residencial ADD*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['Residence_Address']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter Resident Address" name="ra" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Home Town*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['Home_Town']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter Home Town" name="ht" required >
			  </div>
              <div class="form-group">
                  <label for="v_num">House Number*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['House_Number']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter House Number " name="hse"  >
			
              </div>
              <div class="form-group">
			    <label for="v_num">Nationality*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['Nationality']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter Nationality" name="nation" required >
			  </div>
              <div class="form-group">Postal Address
                <label for="v_num">*</label>
			    <input type="text" class="form-control" value="<?php if(isset($_GET['edit'])){echo trim($member['Postal_Address']);} else{echo "";}  ?>" id="v_num" placeholder="Enter Postal Address" name="pa" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Occupation*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['Occupation']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter Occupation" name="oc" required >
			  </div>
               <div class="form-group">Marital
                   <label for="v_num">Status*</label>
			  
                <select  name="ms"  class="form-control" id="ms" required>
                  <option><?php if(isset($_GET['edit'])){echo trim($member['Marital_Status']);} else{echo "Married";}  ?></option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Divorce</option>
                  <option>Widow</option>
                  <option>Widower</option>
                </select>
              </div>
               <div class="form-group">
			    <label for="v_num">Parent Status*</label>
			  
                <select  class="form-control" required  name="ps">
                  <option><?php if(isset($_GET['edit'])){if($member['Level_Parent']==1){echo "Yes";}else{ echo "No";}} else{echo "--";}  ?></option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              
               <div class="form-group">
                  <label for="v_num">No of Children*</label>
			    <input type="text" class="form-control" value="<?php if(isset($_GET['edit'])){echo trim($member['No_of_children']);} else{echo "";}  ?>"id="v_num" placeholder="Enter NOC " name="noc" required >
			
              </div>
              <div class="form-group">
			    <label for="v_num">Email*</label>
			    <input type="email" class="form-control" value="<?php if(isset($_GET['edit'])){echo trim($member['Email']);} else{echo "";}  ?>" id="v_num" placeholder="Enter email " name="ea"  >
			  </div>
 <div class="form-group">
	    <label for="v_num">Phone*</label>
			    <input type="text" value="<?php if(isset($_GET['edit'])){echo trim($member['Phone']);} else{echo "";}  ?>" class="form-control" id="v_num" placeholder="Enter phone" name="ph" required >
			  </div>
              <div class="form-group">Group
                   <label for="v_num">Name*</label>
			  
                <select  name="gn"  class="form-control" id="gn" required>
                  <option><?php if(isset($_GET['edit'])){echo trim($member['Group']);} else{echo "--";}  ?></option>
                  <option>Children Service</option>
                  <option>JUNIOR YOUTH</option>
                  <option>SENIOR YOUTH</option>
                  <option>EVANGELISM</option>
                  <option>MEN'S FELLOWSHIP</option>
                  <option>WOMEN'S FELLOWSHIP</option>
                </select>
              </div>
			 
               <div class="form-group">
			    <label for="v_num">Baptism Status*</label>
			  
                <select  class="form-control" required  name="bs">
                 <option><?php if(isset($_GET['edit'])){if($member['Level_Baptism']==1){echo "Yes";}else{ echo "No";}} else{echo "--";}  ?></option>       <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
                 <div class="form-group">confimation
                   <label for="v_num">status*</label>
			  
                <select  name="cs"  class="form-control" id="cs" required>
                <option><?php if(isset($_GET['edit'])){if($member['Level_Confirm']==1){echo "Yes";}else{ echo "No";}} else{echo "--";}  ?></option>       <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
               <div class="form-group">
			    <label for="v_num">Communicant Type*</label>
			  
                <select  class="form-control" required  name="comm">
                  <option><?php if(isset($_GET['edit'])){echo trim($member['Commune']);} else{echo "--";}  ?></option>
                  <option>Communicant</option>
                  <option>Non-Communicant</option>
                </select>
              </div>
               <div class="form-group">
			    <label for="v_num">Membership Type*</label>
			  
                <select  class="form-control" required  name="mtype">
                  <option><?php if(isset($_GET['edit'])){echo trim($member['Mem_type']);} else{echo "--";}  ?></option>
                  <option>Distant Membership</option>
                  <option>Regular Membership</option>
                </select>
              </div>
              
			  <div class="form-group">
			    <label for="name">Upload profile pic*</label>
			    <input type="file" class="form-control" name="files" id="name" placeholder="Upload file"  >
			  </div>
              
<!--			 
<input name="commentid" type="hidden" value="<?php #echo rand(100,12).date("d-m");  ?>" />
<input name="admin" type="hidden" value="<?php #echo 1;  ?>" />-->


			 <?php if(isset($_GET['edit'])){?>
			   <input type="hidden" class="form-control" name="tr" id="tr" value="<?php echo $_GET['tr'];  ?>" >
			
			<button type="submit" class="btn btn-default" name="btnUpdate">Update</button>
            <?php  } else{  ?>
             <?php 
			    $detail = User::find_by_search($_GET['idf']);
                $members = $database->fetch_array($detail);
			  ?>
			 <input type="hidden" class="form-control" name="idf" id="tr" value="<?php echo $members['family_ID'];  ?>" >
			 <button type="submit" class="btn btn-default" name="btnSave">Save</button>
            <?php
			}
			?>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
