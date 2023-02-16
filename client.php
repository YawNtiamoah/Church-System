<?php
	include 'layouts/top.php';

	//manager details
	$cli = Client::find_by_id($_GET['id']);
	$client = $database->fetch_array($cli);

	//update client code
	if (isset($_POST['btnUpdate'])) {
		$client = new Client;
		$client->vehicle_number = $database->prep(trim($_POST['txtVehicleNumber']));
		$client->chasis_number = $database->prep(trim($_POST['txtChasisNumber']));
		$client->driver_name = $database->prep(trim($_POST['txtDriverName']));
		$client->driver_nationality = $database->prep(trim($_POST['txtNationality']));
		$client->driver_residence_address = $database->prep(trim($_POST['txtAddress']));
		$client->driver_license_number = $database->prep(trim($_POST['txtLicense']));
		$client->phone = $database->prep(trim($_POST['txtPhone']));
		$client->vehicle_type = $database->prep(trim($_POST['txtVehicleType']));
		$client->no_of_passengers = $database->prep(trim($_POST['txtPassengers']));
		$client->residence_address_car_owner = $database->prep(trim($_POST['txtOwnerAddress']));

		$result = $client->update($_GET['id']);
		if ($result) {
			echo "<script type='text/javascript'>
						alert('UPDATE SUCCESSFUL');
						location.assign('client.php?id=".$_GET['id']."');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('UPDATE FAILED');
						location.assign('client.php?id=".$_GET['id']."');
					</script>";
		}
	}

	//delete client code
	if (isset($_POST['btnDelete'])) {
		if(Client::delete($_GET['id'])){
			echo "<script type='text/javascript'>
						alert('DELETION SUCCESSFUL');
						location.assign('manage_clients.php');
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
		    <br /><h3 align="center">Update Client</h3>
		    <div class="col-md-3"></div>
		    <form method="post" class="col-md-6">
			  <div class="form-group">
			    <label for="v_num">Vehicle Number*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Vehicle Number" name="txtVehicleNumber" required value="<?php echo @$client['vehicle_number']; ?>" >
			  </div>

			  <div class="form-group">
			    <label for="c_num">Chasis Number*</label>
			    <input type="text" class="form-control" id="c_num" placeholder="Enter Chasis Number" name="txtChasisNumber" required value="<?php echo @$client['chasis_number']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="name">Driver Name*</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Driver's Name" name="txtDriverName" required value="<?php echo @$client['driver_name']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="nationality">Driver Nationality*</label>
			    <input type="text" class="form-control" id="nationality" placeholder="Enter Driver's Nationality" name="txtNationality" required value="<?php echo @$client['driver_nationality']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="address">Driver's Address*</label>
			    <input type="text" class="form-control" id="address" placeholder="Enter Driver's Address" name="txtAddress" required value="<?php echo @$client['driver_residence_address']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="license">Driver's License Number*</label>
			    <input type="text" class="form-control" id="license" placeholder="Enter Driver's License Number" name="txtLicense" required value="<?php echo @$client['driver_license_number']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="phone">Driver's Phone Number*</label>
			    <input type="number" class="form-control" id="phone" placeholder="Enter Driver's Phone Number" name="txtPhone" required value="<?php echo @$client['phone']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="vehicle_type">Vehicle Type*</label>
			    <input type="text" class="form-control" id="vehicle_type" placeholder="Enter Vehicle Type" name="txtVehicleType" required value="<?php echo @$client['vehicle_type']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="passengers">Number Of Passengers*</label>
			    <input type="text" class="form-control" id="passengers" placeholder="Enter Number Of Passenegers" name="txtPassengers" required value="<?php echo @$client['no_of_passengers']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="owner_addr">Owner's Address*</label>
			    <input type="text" class="form-control" id="owner_addr" placeholder="Enter Vehicle Owner's Address" name="txtOwnerAddress" required value="<?php echo @$client['residence_address_car_owner']; ?>">
			  </div>



			  
			  <button type="submit" class="btn btn-default" name="btnUpdate">Update</button> 
			  <button class="btn btn-danger" type="submit" name="btnDelete">Delete</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
