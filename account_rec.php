<?php
include 'layouts/top.php';
//include 'includes/user.php';

	//manager details
	/*$man = User::find_by_id($_SESSION['user_id']);
	$manager = $database->fetch_array($man);
*/
	//new client code
	if (isset($_POST['btnUpdate'])) {
		
		//$edit=;
		////////////////////////////////Edit personal Information///////////////////////////
	//	if(isset($_GET['edit'])){
			 	$client = new account;
		$client->accid = $database->prep(trim($_POST['accid']));
		$client->acctype = $database->prep(trim($_POST['acctype']));
		$client->amt= $database->prep(trim($_POST['amt']));		
        $client->doe = $database->prep(trim($_POST['doe']));
		$client->region=$_SESSION['Region'];
		$client->district=$_SESSION['District'];
		$client->branch=$_SESSION['Branch'];

        $tr=$_POST['tid'];
		$result = $client->update_account($tr);
		if ($result) {
			
			$success = "USER UPDATED";
			
			//	redirect_to('membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm');
				//header("Location:membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm");
				?>
				<script>
			window.location="manage_tithe.php";
				</script>
				<?php
				}
				else{
					
				}}
			
	//}

			if (isset($_POST['btnSave'])) {
			////////////////new registration//////////////////
		
       	$client = new account;
		$client->accid = $database->prep(trim($_POST['accid']));
		$client->acctype = $database->prep(trim($_POST['acctype']));
		$client->amt= $database->prep(trim($_POST['amt']));		
        $client->doe = $database->prep(trim($_POST['doe']));
		$client->region=$_SESSION['Region'];
		$client->district=$_SESSION['District'];
		$client->branch=$_SESSION['Branch'];
        $client->user_id=$_SESSION['user_id'];
		$result = $client->new_account();
		if ($result) {
			
			$success = "USER SAVED";
			
					?>
				<script>
				window.location="account_rec.php";
				</script>
				<?php
					}
		
		else{
			$failed = "FAILED TO SAVE USER";
		}
	
	}
		else{
			
			}
	
	

$details = account::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
<div class="row">
		    <br />
              <?php if(isset($_GET['edit'])){?>
			  <h3 align="center">Edit Account Record</h3>
                <?php  } else{  ?>
             
  <h3 align="center">New Account Record</h3>
            <?php
			}
			?>
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
			  <div class="form-group">
			    <label for="v_num">Account ID*</label>
			    <input type="text" class="form-control" value="<?php if($_GET['tr']){echo trim($member['Transaction_ID']);} elseif(isset($_GET['edit'])){echo trim($member['Transaction_ID']);} else{echo rand(100,1199).date("md");}  ?>" id="title" placeholder="Transaction ID" name="accid" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Account Type*</label>
			  
                <select  class="form-control" required  name="acctype">
                  <option>--</option>
                  <option>Church Service</option>
                  <option>Children Service</option>
                  <option>Youth Service</option>
                  <option>VTO</option>
                </select>
              </div>
			  
              <div class="form-group">
			    <label for="v_num">Amount*</label>
			    <input type="text" class="form-control" id="v_num"  value="<?php if(isset($_GET['edit'])){echo trim($member['Amount']);} else{echo "";}  ?>" placeholder="Amount" name="amt" required >
			  </div>

              <div class="form-group">
			    <label for="v_num">Date Created</label>
			    <input type="date" class="form-control" value="<?php if(isset($_GET['edit'])){echo trim($member['DOE']);} else{echo "";}  ?>" id="v_num" placeholder="Date Created" name="doe" required >
			  </div>
<!--
              <div class="form-group">
			    <label for="v_num">Start Date*</label>
			    <input type="date" class="form-control" id="v_num"  name="sdate" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">End Date*</label>
			    <input type="date*-" class="form-control" id="v_num" placeholder="End Date" name="edate" required >
			  </div>
-->
<!--
              <div class="form-group">
			    <label for="v_num">Gender*</label>
			  
                <select  class="form-control" required  name="gender">
                  <option>--</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
-->
<!--
              <div class="form-group">
			    <label for="v_num">Start Time*</label>
			    <input type="time" class="form-control" id="v_num" placeholder="Start Time" name="stime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">End Time*</label>
			    <input type="time" class="form-control" id="v_num" placeholder="End Time" name="etime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Host Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Host Name" name="nation" required >
			  </div>
              <div class="form-group">
                <label for="v_num">Guest Speaker*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Postal Address" name="pa" required >
			  </div>
-->
<!--
              <div class="form-group">
			    <label for="v_num">Occupation*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Occupation" name="oc" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Marital Status*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Marital Status" name="ms" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Email*</label>
			    <input type="email" class="form-control" id="v_num" placeholder="Enter email " name="ea" required >
			  </div>
 <div class="form-group">
	    <label for="v_num">Phone*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter phone" name="ph" required >
			  </div>
              <div class="form-group">
	    <label for="v_num">Group Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Group Name" name="gn" required >
			  </div>
			  <div class="form-group">
			    <label for="v_num">Parent Status*</label>
			  
                <select  class="form-control" required  name="ps">
                  <option>--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
               <div class="form-group">
			    <label for="v_num">Baptism Status*</label>
			  
                <select  class="form-control" required  name="bs">
                  <option>--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
                 <div class="form-group">confimation
                   <label for="v_num">status*</label>
			  
                <select  name="cs"  class="form-control" id="cs" required>
                  <option>--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
-->
              
<!--
			  <div class="form-group">
			    <label for="name">Upload Event Image*</label>
			    <input type="file" class="form-control" name="files" id="name" placeholder="Upload file"  >
			  </div>
-->
              
			 
<!--
<input name="commentid" type="hidden" value="<?php #echo rand(100,12).date("d-m");  ?>" />
<input name="admin" type="hidden" value="<?php #echo 1;  ?>" />
-->


			  
			 	  
			 <?php if(isset($_GET['edit'])){?>
			   <input type="hidden" class="form-control" name="tr" id="tr" value="<?php echo $_GET['tr'];  ?>" >
                <input type="hidden" class="form-control" name="id" id="tr" value="<?php echo $member['id'];  ?>" >
			
			<button type="submit" class="btn btn-default" name="btnUpdate">Update</button>
            <?php  } else{  ?>
             
			 <button type="submit" class="btn btn-default" name="btnSave">Save</button>
            <?php
			}
			?>
			</form>
		</div>


<?php
	include 'layouts/bottom.php';
?>
