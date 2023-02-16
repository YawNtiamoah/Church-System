<?php
	include 'layouts/top.php';

	//manager details
	$man = User::find_by_id($_SESSION['user_id']);
	$manager = $database->fetch_array($man);

	//new station manager code
	if (isset($_POST['btnSave'])) {
		$user = new User;
		$user->name = $database->prep(trim($_POST['txtFullName']));
		$user->dob = $database->prep(trim($_POST['txtDOB']));
		$user->phone = $database->prep(trim($_POST['txtPhone']));
		$user->email = $database->prep(trim($_POST['txtEmail']));
		$user->address = $database->prep(trim($_POST['txtAddress']));
		$user->code = $database->prep(trim($_POST['txtCode']));
		$user->password = $database->prep(trim($_POST['txtCode']));
		$user->region_name = $database->prep(trim($manager['region_name']));
		$user->access_level = "collector";
		$user->district_id = $database->prep(trim($manager['district_id']));
		$user->station_id = $database->prep(trim($manager['station_id']));

		$result = $user->new_collector();
		if ($result) {
			$success = "USER SAVED";
		}
		else{
			$failed = "FAILED TO SAVE USER";
		}
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
		    <br /><h3 align="center">New Collector Form</h3>
		    <div class="col-md-3"></div>
		    <form method="post" class="col-md-6">
			  <div class="form-group">
			    <label for="name">Full Name*</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="txtFullName" required minlength="6">
			  </div>
			  <div class="form-group">
			    <label for="dob">Date Of Birth*</label>
			    <input type="date" class="form-control" id="dob" name="txtDOB" required>
			  </div>
			   <div class="form-group">
			    <label for="contact">Phone Number*</label>
			    <input type="number" class="form-control" id="contact" placeholder="Enter Phone Number" name="txtPhone" required minlength="10">
			  </div>
			  <div class="form-group">
			    <label for="email">E-mail*</label>
			    <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name="txtEmail" required minlength="10">
			  </div>
			  <div class="form-group">
			    <label for="address">Address*</label>
			    <textarea class="form-control" required="" id="address" name="txtAddress"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="uname">Collector Code*</label>
			    <input type="text" class="form-control" id="uname" readonly="" name="txtCode" required minlength="6" value="<?php echo strtoupper(substr(uniqid(), 7, 12)); ?>">
			  </div>
			  
			  <button type="submit" class="btn btn-default" name="btnSave">Save</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
