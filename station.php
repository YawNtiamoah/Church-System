<?php
	include 'layouts/top.php';

	//station details
	$sta = Station::find_by_id($_GET['id']);
    $station = $database->fetch_array($sta);

    //district details
	$dis = District::find_by_id($station['district_id']);
    $district = $database->fetch_array($dis);



	//update station code
	if (isset($_POST['btnUpdate'])) {
		$new_station = new Station;
	    $new_station->station_name = $database->prep($_POST['txtStationName']);
	    $new_station->region = $database->prep($_POST['txtRegion']);
	    $new_station->district_id = $database->prep($_POST['txtDistrict']);
	    $new_station->location = $database->prep($_POST['txtLocation']);
	    $new_station->union_name = $database->prep($_POST['txtUnionName']);
		

		$result = $new_station->update($_GET['id']);
		if ($result) {
			echo "<script type='text/javascript'>
						alert('UPDATE SUCCESSFUL');
						location.assign('station.php?id=".$_GET['id']."');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('FAILED TO UPDATE');
						location.assign('station.php?id=".$_GET['id']."');
					</script>";
		}
	}

	//delete district code
	if (isset($_POST['btnDelete'])) {
		if(Station::delete($_GET['id'])){
			echo "<script type='text/javascript'>
						alert('DELETION SUCCESSFUL');
						location.assign('manage_stations.php');
					</script>";
		}
		else{
			echo "<script type='text/javascript'>
						alert('UNABLE TO DELETE');
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
		    <br /><h3 align="center">Station Profile</h3>
		    <div class="col-md-3"></div>
		    <form method="post" class="col-md-6">
			  <div class="form-group">
			    <label for="name">Station Name*</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Station Name" name="txtStationName" required  value="<?php echo @$station['station_name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="contact">Select Region*</label>
				  <select class="form-control" name="txtRegion" id="region">
					    <option value="<?php echo @$station['region']; ?>"><?php echo @$station['region']; ?></option>
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
					  <option value="<?php echo $station['district_id']; ?>"><?php echo $district['district_name']; ?></option>
				   </select>
				</div>

				<div class="form-group">
				    <label for="loc">Location*</label>
				    <input type="text" class="form-control" id="loc" placeholder="Enter Location" name="txtLocation" required value="<?php echo @$station['location']; ?>">
				  </div>

				 <div class="form-group">
				    <label for="un">Union Name*</label>
				    <input type="text" class="form-control" id="un" placeholder="Enter Union Name" name="txtUnionName" required value="<?php echo @$station['union_name']; ?>">
				  </div>

			  
			  <button type="submit" class="btn btn-success" name="btnUpdate">Update</button> 
			  <button class="btn btn-danger" type="submit" name="btnDelete">Delete</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
