<?php
	include 'layouts/top.php';

	//new manager code
	//new manager code
	if (isset($_POST['btnSave'])) {
		$user = new User;
		$user->mcn = $database->prep(trim($_POST['mn']));
		$user->voc = $database->prep(trim($_POST['venue']));
		$user->cd = $database->prep(trim($_POST['cdate']));
		$id=$_GET['confirm'];
		$tr=$_GET['tr'];

		$result = $user->update_confirmation($id,$tr);
		if ($result) {
			$success = "NEW CONFIRMATION RECORD CREATED!!!";
			$marry=$_GET['marry'];
			if($marry==1){
			//$confirm=$_GET['marry'];
		//	header("Location:membership_confirm.php?confirm=$lc&marry=$lm");
				header("Location:membership_marriage.php?tr=$tr&marry=$marry");
				?>
				<script>
			window.location="membership_marriage.php?tr=<?php echo $tr; ?>&marry=<?php  echo $marry; ?>";
				</script>
                <?php
				}
				else{
					?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tr; ?>";
		
				</script>
				<?php
					}
		}
		else{
			$failed = "FAILED TO SAVE USER!!!";
		}
	}
///////////////////////////////////////
	if (isset($_POST['btnUpdate'])) {
		$user = new User;
		$user->mcn = $database->prep(trim($_POST['mn']));
		$user->voc = $database->prep(trim($_POST['venue']));
		$user->cd = $database->prep(trim($_POST['cdate']));
		$id=$_GET['confirm'];
		$tr=$_GET['tr'];

		$result = $user->update_confirmation($id,$tr);
		if ($result) {
			$success = "NEW CONFIRMATION RECORD CREATED!!!";
			?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tr; ?>";
		
				</script>
				<?php
				}
		}
		else{
			$failed = "FAILED TO SAVE USER!!!";
		}
	
?>

<div class="row">
		    <br />
		    <h3 align="center"> Confirmation Record</h3>
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
<!--
			  <div class="form-group">
			    <label for="v_num">Child ID</label>
			    <input type="text" class="form-control" id="title" placeholder="Title" name="Group ID" required >
			  </div>
-->
 <?php 
			    $details = User::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
              <div class="form-group">Minister Name
                <label for="v_num">*</label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Minister_Name_Confirmation']);} else{echo "";}  ?>"  type="text" class="form-control" id="v_num" placeholder="Minister Name" name="mn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Venue *</label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Venue_Confirmation']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" name="venue" placeholder="Venue" required >
			  </div>
              <div class="form-group">Date of Confirmation*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Confirmation_Date']);} else{echo "";}  ?>" type="date" class="form-control" id="v_num"  name="cdate" required >
			  </div>
              <div class="form-group"></div>
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
