<?php
	include 'layouts/top.php';

	$man = User::find_by_id($_SESSION['user_id']);
	$manager = $database->fetch_array($man);

	//payment code
	if (isset($_POST['btnPay'])) {
		$payment = new Payment;
		$payment->vehicle_number = $database->prep($_POST['txtVehicleNumber']);
		$payment->station_id = $database->prep($manager['station_id']);
		$payment->amount = $database->prep($_POST['txtAmount']);
		$payment->user_id = $database->prep($_SESSION['user_id']);
		$payment->region_name = $database->prep($manager['region_name']);
		$payment->district_id = $database->prep($manager['district_id']);

		$check = $database->query_db("SELECT * FROM clients WHERE vehicle_number ='".$_POST['txtVehicleNumber']."' ");
		if($database->num_rows($check) == 1){
			$result = $payment->new_payment();
			if ($result) {
				$success = "PAYMENT SAVED";
			}
			else{
				$failed = "FAILED TO SAVE PAYMENT";
			}
		}
		else{
			$failed = "VEHICLE NOT FOUND... CANNOT MAKE PAYMENT!!!";
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
	    <br /><h3 align="center">Payment Form</h3>
	    <div class="col-md-3"></div>
	    <form method="post" class="col-md-6">
		  <div class="form-group">
		    <label>Vehicle Number*</label>
		    <input type="text" class="form-control" id="vnum" placeholder="Enter Vehicle Number" name="txtVehicleNumber" required  autocomplete="off">
		    <div id="vehicle_list"></div>
		  </div>

		  <div class="form-group">
		    <label for="vnum">Amount*</label>
		    <input type="number" class="form-control" id="vnum" placeholder="Enter Amount" name="txtAmount" required>
		  </div>

		  <div class="form-group">
		    <label for="date_payed">Date Payed*</label>
		    <input type="date" class="form-control" id="date_payed" name="txtDatePayed" required disabled="" value="<?php echo date('Y-m-d'); ?>">
		  </div>
		  
		  <button type="submit" class="btn btn-default" name="btnPay">Pay</button>
		</form>
	</div>
  </div>

  <script>  
 $(document).ready(function(){  
      $('#vnum').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"autocomplete_vehicle_number.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#vehicle_list').fadeIn();  
                          $('#vehicle_list').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#vnum').val($(this).text());  
           $('#vehicle_list').fadeOut();  
      });  
 });  
 </script>  

<?php
	include 'layouts/bottom.php';
?>