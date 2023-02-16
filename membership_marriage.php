<?php
	include 'layouts/top.php';
    //include 'includes/user.php';
	//new manager code
	if (isset($_POST['btnSave'])) {
		$user = new User;
		$user->fsn = $database->prep(trim($_POST['fs']));
		$user->partner_Name = $database->prep(trim($_POST['pn']));
		$user->married_date = $database->prep(trim($_POST['mdate']));
		$user->married_no = $database->prep(trim($_POST['mcn']));
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		
		$user->married_cert = $database->prep(trim($photo['imageUrl']));
		$id=$_GET['marry'];
		$tr=$_GET['tr'];

		$result = $user->update_marriage($id,$tr);
		if ($result) {
			$success = "NEW REGIONAL MANAGER CREATED!!!";
				?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tr; ?>";
				</script>
                <?php
		}
		else{
			$failed = "FAILED TO SAVE USER!!!";
		}
	}
//////////////////////////////////////////////////update Edit////////////////////////////////
if (isset($_POST['btnUpdate'])) {
		$user = new User;
		$user->fsn = $database->prep(trim($_POST['fs']));
		$user->partner_Name = $database->prep(trim($_POST['pn']));
		$user->married_date = $database->prep(trim($_POST['mdate']));
		$user->married_no = $database->prep(trim($_POST['mcn']));
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		
		$user->married_cert = $database->prep(trim($photo['imageUrl']));
		$id=$_GET['marry'];
		$tr=$_GET['tr'];

		$result = $user->update_marriage($id,$tr);
		if ($result) {
			$success = "NEW REGIONAL MANAGER CREATED!!!";
				?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tr; ?>";
				</script>
                <?php
		}
		else{
			$failed = "FAILED TO SAVE USER!!!";
		}
	}
?>
 <?php 
			    $details = User::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
<div class="row">
		    <br />
              <?php if(isset($_GET['edit'])){?>
			  <h3 align="center">Edit Marriage Registration</h3>
                <?php  } else{  ?>
             
			 <h3 align="center">Marriage Record</h3>
            <?php
			}
			?>
		   
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
<!--
			  <div class="form-group">
			    <label for="v_num">Child ID</label>
			    <input type="text" class="form-control" id="title" placeholder="Title" name="Group ID" required >
			  </div>
-->
              <div class="form-group">Partner Name
                <label for="v_num">*</label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Partner_Name']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" placeholder="Partner Name" name="pn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Family Surname *</label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['family_surname']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" name="fs" placeholder="Family Surname" required >
			  </div>
              <div class="form-group">Marriage Date*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Marriage_Date']);} else{echo "";}  ?>" type="date" class="form-control" id="v_num"  name="mdate" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Marriage Certificate Number *</label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['marriage_cert_no']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" name="mcn" placeholder="Marriage Cert Number" required >
			  </div>
               <div class="form-group">
			    <label for="name">Upload Marriage Certificate*</label>
			    <input type="file" class="form-control" name="files" id="name" placeholder="Upload file"  >
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
