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
			$client = new Events;
	//	$client->tr_id = $database->prep($trr);
		$client->title = $database->prep(trim($_POST['title']));
		$client->theme = $database->prep(trim($_POST['theme']));
		$client->venue = $database->prep(trim($_POST['venue']));
		$client->sdate = $database->prep(trim($_POST['sdate']));
		$client->edate = $database->prep(trim($_POST['edate']));
		$client->stime = $database->prep(trim($_POST['stime']));
		$client->etime = $database->prep(trim($_POST['etime']));		
        $client->host = $database->prep(trim($_POST['host']));
		$client->guest= $database->prep(trim($_POST['guest']));
		if(isset($_FILES['files']['name'])){
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		 $client->logo = $database->prep(trim($photo['imageUrl']));

			if($x['extension']=="jpg" || $x['extension']=="png" || $x['extension']=="gif"){
			$file='<img class="img-responsive" src="images/'.$photo['imageUrl'].'" width="200" height="200" alt="logo"/>
';		}
			else{
				
				}		
		
	} else {
		 $client->logo = $database->prep(trim($_POST['logo']));
		
		}
	
		$client->region=$_SESSION['Region']="try";
		$client->district=$_SESSION['District']="try";
		$client->branch=$_SESSION['Branch']="try";
        $tr=$_POST['tr'];
		$result = $client->update_event($tr);
		if ($result) {
			
			$success = "USER UPDATED";
			
			//	redirect_to('membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm');
				//header("Location:membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm");
				?>
				<script>
			window.location="event_record.php?tr=<?php echo $tr; ?>";
				</script>
				<?php
				}
				else{
					
				}}
			
	//}

			if (isset($_POST['btnSave'])) {
			////////////////new registration//////////////////
		
        $client = new Events;
		
		$client->title = $database->prep(trim($_POST['title']));
		$client->theme = $database->prep(trim($_POST['theme']));
		$client->venue = $database->prep(trim($_POST['venue']));
		$client->sdate = $database->prep(trim($_POST['sdate']));
		$client->edate = $database->prep(trim($_POST['edate']));
		$client->stime = $database->prep(trim($_POST['stime']));
		$client->etime = $database->prep(trim($_POST['etime']));		
        $client->host = $database->prep(trim($_POST['host']));
		$client->guest= $database->prep(trim($_POST['guest']));
		
		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		 $client->logo = $database->prep(trim($photo['imageUrl']));

			if($x['extension']=="jpg" || $x['extension']=="png" || $x['extension']=="gif"){
			$file='<img class="img-responsive" src="images/'.$photo['imageUrl'].'" width="200" height="200" alt="logo"/>
';		}
			else{
				
				}		
		$client->region=$_SESSION['Region'];
		$client->district=$_SESSION['District'];
		$client->branch=$_SESSION['Branch'];

		$result = $client->new_event();
		if ($result) {
			
			$success = "USER SAVED";
				
			//	redirect_to('membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm');
				//header("Location:membership_baptism.php?baptism=$lb&confirm=$lc&marry=$lm");
				?>
				<script>
			window.location="event_rec.php";
				</script>
				<?php
				
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
            <?php 
			    $details = Events::find_by_id($_GET['tr']);
                $member = $database->fetch_array($details);
			  ?>
		    <h3 align="center">Event Registration</h3>
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
			  <div class="form-group">
			    <label for="v_num">Title*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Title']);} else{echo "";}  ?>" type="text" class="form-control"  id="title" placeholder="Title" name="title" required />
			  </div>
              <div class="form-group">
			    <label for="v_num">Theme*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Theme']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" placeholder="Theme" name="theme" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Venue*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Venue']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" placeholder="Venue" name="venue" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Start Date*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Start_Date']);} else{echo "";}  ?>" type="date" class="form-control" id="v_num"  name="sdate" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">End Date*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['End_Date']);} else{echo "";}  ?>" type="date" class="form-control" id="v_num" placeholder="End Date" name="edate" required >
			  </div>
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
              <div class="form-group">
			    <label for="v_num">Start Time*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Start_Time']);} else{echo "";}  ?>" type="time" class="form-control" id="v_num" placeholder="Start Time" name="stime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">End Time*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['End_Time']);} else{echo "";}  ?>" type="time" class="form-control" id="v_num" placeholder="End Time" name="etime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Host Name*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Host_Name']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" placeholder="Host Name" name="host" required >
			  </div>
              <div class="form-group">
                <label for="v_num">Guest Speaker*</label>
			    <input  value="<?php if(isset($_GET['edit'])){echo trim($member['Guest']);} else{echo "";}  ?>" type="text" class="form-control" id="v_num" placeholder="Enter Guest Speaker" name="guest" required >
			  </div>
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
              
			  <div class="form-group">
			    <label for="name">Upload Event Image*</label>
			    <input type="file" class="form-control" name="files" id="name" placeholder="Upload file"  >
			  </div>
              
			 
<!--
<input name="commentid" type="hidden" value="<?php #echo rand(100,12).date("d-m");  ?>" />
<input name="admin" type="hidden" value="<?php #echo 1;  ?>" />
-->


			   <?php if(isset($_GET['edit'])){?>
			   <input type="hidden" class="form-control" name="tr" id="tr" value="<?php echo $_GET['tr'];  ?>" >
           
               <input type="hidden" class="form-control" name="logo" id="tr" value="<?php echo $member['Upload'];  ?>" >
			
			<button type="submit" class="btn btn-default" name="btnUpdate">Update</button>
            <?php  } else{  ?>
             
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
