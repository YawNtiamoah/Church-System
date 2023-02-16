<?php
	include 'layouts/top.php';

	//new manager code
	if (isset($_POST['btnSave'])) {
		$user = new User;
		$user->name = $database->prep(trim($_POST['txtFullName']));
		$user->dob = $database->prep(trim($_POST['txtDOB']));
		$user->phone = $database->prep(trim($_POST['txtPhone']));
		$user->email = $database->prep(trim($_POST['txtEmail']));
		$user->address = $database->prep(trim($_POST['txtAddress']));
		$user->username = $database->prep(trim($_POST['txtUname']));
		$user->password = $database->prep(trim($_POST['txtUname']));
		$user->region_name = $database->prep(trim($_POST['txtRegion']));
		$user->access_level = "district";
		$user->district_id = $database->prep(trim($_POST['txtDistrict']));

		$result = $user->new_district_manager();
		if ($result) {
			$success = "USER SAVED";
		}
		else{
			$failed = "FAILED TO SAVE USER";
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
		    <br /><h3 align="center">New District Manager Form</h3>
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
			    <label for="uname">Username*</label>
			    <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="txtUname" required minlength="6">
			  </div>
			  <div class="form-group">
			    <label for="contact">Select Region*</label>
				  <select class="form-control" name="txtRegion" id="region">
					    <option class="disabled">--Please Select A Region--</option>
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
					  <option value="0">-- Please Select A District --</option>
					 
				   </select>
				</div>

			  
			  <button type="submit" class="btn btn-default" name="btnSave">Save</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
