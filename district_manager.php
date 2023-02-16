<?php
	include 'layouts/top.php';

	//user details
	$res = User::find_by_id($_GET['id']);
	$manager = $database->fetch_array($res);

	//district details
	$dis = District::find_by_id($manager['district_id']);
    $district = $database->fetch_array($dis);

	//new manager code
	if (isset($_POST['btnUpdate'])) {
		$user = new User;
		$user->name = $database->prep(trim($_POST['txtFullName']));
		$user->dob = $database->prep(trim($_POST['txtDOB']));
		$user->phone = $database->prep(trim($_POST['txtPhone']));
		$user->email = $database->prep(trim($_POST['txtEmail']));
		$user->address = $database->prep(trim($_POST['txtAddress']));
		$user->region_name = $database->prep(trim($_POST['txtRegion']));
		$user->district_id = $database->prep(trim($_POST['txtDistrict']));

		$result = $user->update_district_manager($_GET['id']);
		if ($result) {
			echo "<script type='text/javascript'>
						alert('UPDATE SUCCESSFUL');
						location.assign('district_manager.php?id=".$_GET['id']."');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('FAILED TO UPDATE');
						location.assign('district_manager.php?id=".$_GET['id']."');
					</script>";
		}
	}
?>

<script>
 $(document).ready(function(){  
      $('#region').on('change', function() {
        var region = $(this).val();  
           if(region != '')  
           {  
                $.ajax({  
                     url:"fetch_specified_districts.php",  
                     method:"post",  
                     data:{region:region}, 
                     success:function(data)  
                     {  
                          $('#districts').html(data); 
                     }  
                });  
           }
      });
 });  
</script>
	
	<div class="row">
	  	<div class="row">
		    <br /><h3 align="center">District Manager Profile</h3>
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
			  <div class="form-group">
			    <label for="contact">Select Region*</label>
				  <select class="form-control" name="txtRegion" id="region">
					    <option value="<?php echo @$manager['region_name']; ?>"><?php echo @$manager['region_name']; ?></option>
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
				<div class="form-group">
			    <label for="contact">Select District*</label>
				  <select class="form-control" name="txtDistrict" id="districts">
					  <option value="<?php echo @$manager['district_id']; ?>"><?php echo @$district['district_name']; ?></option>
					 
				   </select>
				</div>

			  
			  <button type="submit" class="btn btn-success" name="btnUpdate">Update</button> 
			  <a class="btn btn-danger" href="delete_user.php?id=<?php echo $_GET['id']; ?> &&redirect=manage_district_managers.php">Delete</a>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
