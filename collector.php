<?php
	include 'layouts/top.php';

	//user details
	$res = User::find_by_id($_GET['id']);
	$manager = $database->fetch_array($res);


	//update manager code
	if (isset($_POST['btnUpdate'])) {
		$user = new User;
		$user->name = $database->prep(trim($_POST['txtFullName']));
		$user->dob = $database->prep(trim($_POST['txtDOB']));
		$user->phone = $database->prep(trim($_POST['txtPhone']));
		$user->email = $database->prep(trim($_POST['txtEmail']));
		$user->address = $database->prep(trim($_POST['txtAddress']));
		$result = $user->update_collector($_GET['id']);
		if ($result) {
			echo "<script type='text/javascript'>
						alert('UPDATE SUCCESSFUL');
						location.assign('collector.php?id=".$_GET['id']."');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('FAILED TO UPDATE');
						location.assign('collector.php?id=".$_GET['id']."');
					</script>";
		}
	}

	//delete collector code
	if (isset($_POST['btnDelete'])) {
		if(User::delete_user($_GET['id'])){
			echo "<script type='text/javascript'>
						alert('DELETION SUCCESSFUL');
						location.assign('manage_collectors.php');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('UNABLE TO DELETE');
					</script>";
		}
	}
?>
	
	<div class="row">
	  	<div class="row">
		    <br /><h3 align="center">Collector Profile</h3>
		    <div class="col-md-3"></div>
		    <form method="post" class="col-md-6">
			  <div class="form-group">
			    <label for="name">Full Name*</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="txtFullName" required minlength="6" value="<?php echo @$manager['full_name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="dob">Date Of Birth*</label>
			    <input type="date" class="form-control" id="dob" name="txtDOB" required value="<?php echo @$manager['DOB']; ?>">
			  </div>
			   <div class="form-group">
			    <label for="contact">Phone Number*</label>
			    <input type="number" class="form-control" id="contact" placeholder="Enter Phone Number" name="txtPhone" required minlength="10" value="<?php echo @$manager['phone']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="email">E-mail*</label>
			    <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name="txtEmail" required minlength="10" value="<?php echo @$manager['email']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="address">Address*</label>
			    <textarea class="form-control" required="" id="address" name="txtAddress"><?php echo @$manager['address']; ?></textarea>
			  </div>

			  
			  <button type="submit" class="btn btn-success" name="btnUpdate">Update</button> 
			  <button class="btn btn-danger" type="submit" name="btnDelete">Delete</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
