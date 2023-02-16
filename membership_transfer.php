<?php
	include 'layouts/top.php';

	//new manager code
	if (isset($_POST['btnSave'])) {
		$user = new Transfers;
		$user->fname = $database->prep(trim($_POST['fname']));
		$user->tid = $database->prep(trim($_POST['tid']));
		$user->treason = $database->prep(trim($_POST['treason']));
		$user->region = $database->prep(trim($_POST['region']));
		$user->district = $database->prep(trim($_POST['district']));
		$user->branch = $database->prep(trim($_POST['branch']));
		$user->doe = $database->prep(trim($_POST['doe']));
		$user->status = $database->prep(trim(1));
		
		$result = $user->new_transfer();
		if ($result) {
			$success = "NEW TRANSFER WAS CREATED!!!";
			$tid=$_POST['tid'];
				$res = $database->query_db("UPDATE `membership` SET `transfer_id`= '1' WHERE `Transaction_ID`='".$tid."' ");

				?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tid; ?>";
				</script>
                <?php
		}
		else{
			$failed = "FAILED TO SAVE USER!!!";
		}
	}
//////////////////////////////////////////////////update Edit////////////////////////////////
if (isset($_POST['btnUpdate'])) {
		$user = new Transfers;
		$user->fname = $database->prep(trim($_POST['fname']));
		$user->tid = $database->prep(trim($_POST['tid']));
		$user->treason = $database->prep(trim($_POST['treason']));
		$user->region = $database->prep(trim($_POST['region']));
		$user->district = $database->prep(trim($_POST['district']));
		$user->branch = $database->prep(trim($_POST['branch']));
		$user->doe = $database->prep(trim($_POST['doe']));
		$user->status = $database->prep(trim(1));
	
		$tr=$_GET['tr'];

		$result = $user->update_transfer($tr);
		if ($result) {
			$success = "TRANSFER WAS UPDATED!!!";
				$tid=$_POST['tid'];
				?>
				<script>
			window.location="membership_print.php?tr=<?php echo $tid; ?>";
				</script>
                <?php
		}
		else{
			$failed = "FAILED TO SAVE USER TRANSFER INFO!!!";
		}
	}
?>
 <?php 
			    $details = Transfers::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
<div class="row">
		    <br />
              <?php if(isset($_GET['edit'])){?>
			  <h3 align="center">Edit Transfer Registration</h3>
                <?php  } else{  ?>
             
			 <h3 align="center">New Transfer Registration</h3>
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
              <div class="form-group">Transaction ID
                <label for="v_num">*</label>
			    <input value="<?php if(isset($_GET['tr'])){echo $_GET['tr'];} elseif(isset($_GET['edit'])){echo trim($member['Transaction_ID']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num"  name="tid" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Full Name*</label>
			    <input value="<?php if(isset($_GET['tr'])){echo $_GET['fname'];} elseif(isset($_GET['edit'])){echo trim($member['Full_Name']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" name="fname"  required >
			  </div>
               <div class="form-group">Transfer Reason*
                <label for="v_num"></label>
			    <textarea name="treason"><?php if(isset($_GET['edit'])){echo trim($member['DOE']);} else{echo "";}  ?></textarea>
			  </div>
              <div class="form-group">Transfer Date*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['DOE']);} else{echo "";}  ?>" type="date" class="form-control" id="v_num"  name="doe" required >
			  </div>
               <div class="form-group">Region*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Region']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num"  name="region" required >
			  </div>
               <div class="form-group">District*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['District']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num"  name="district" required >
			  </div>
               <div class="form-group">Branch*
                <label for="v_num"></label>
			    <input value="<?php if(isset($_GET['edit'])){echo trim($member['Branch']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num"  name="branch" required >
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
