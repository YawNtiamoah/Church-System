<?php
	include 'layouts/top.php';

	//district details
	//$dis = District::find_by_id($_GET['id']);
   // $district = $database->fetch_array($dis);


	//update manager code
	if (isset($_POST['btnUpdate'])) {
		$district = new District;
	    $district->district_name = $database->prep($_POST['txtDistrictName']);
	    $district->region_name = $database->prep($_POST['txtRegion']);
		

		$result = $district->update($_GET['id']);
		if ($result) {
			echo "<script type='text/javascript'>
						alert('UPDATE SUCCESSFUL');
						location.assign('district.php?id=".$_GET['id']."');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('FAILED TO UPDATE');
						location.assign('district.php?id=".$_GET['id']."');
					</script>";
		}
	}

	//delete district code
	if (isset($_POST['btnDelete'])) {
		if(District::delete($_GET['id'])){
			echo "<script type='text/javascript'>
						alert('DELETION SUCCESSFUL');
						location.assign('manage_districts.php');
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
		    <br /><h3 align="center">District Profile</h3>
		    <div class="col-md-3"></div>
		    <form method="post" class="col-md-6">
			  <div class="form-group">
			    <label for="name">District Name*</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="txtDistrictName" required minlength="6" value="<?php echo @$district['district_name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="contact">Select Region*</label>
				  <select class="form-control" name="txtRegion" id="region">
					    <option value="<?php echo @$district['region_name']; ?>"><?php echo @$district['region_name']; ?></option>
	                    <option value="Greater Accra Region">Greater Accra Region</option>
	                    <option value="Ashanti Region">Ashanti Region</option>
	                    <option value="Eastern Region">Eastern Region</option>
	                    <option value="Western Region">Western Region</option>
	                    <option value="Volta Region">Volta Region</option>
	                    <option value="Central Region">Central Region</option>
	                    <option value="Brong Ahafo Region">Brong Ahafo Region</option>
	                    <option value="Northern Region">Northern Region</option>
	                    <option value="Upper East Region">Upper East Region</option>
	                    <option value="Upper West Region">Upper West Region</option>
				   </select>
				</div>

			  
			  <button type="submit" class="btn btn-success" name="btnUpdate">Update</button> 
			  <button class="btn btn-danger" type="submit" name="btnDelete">Delete</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
