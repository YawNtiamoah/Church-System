<?php
	include 'layouts/top.php';

	//new manager code
//	if (isset($_POST['btnSave'])) {
//		$user = new User;
//		$user->name = $database->prep(trim($_POST['txtFullName']));
//		$user->dob = $database->prep(trim($_POST['txtDOB']));
//		$user->phone = $database->prep(trim($_POST['txtPhone']));
//		$user->email = $database->prep(trim($_POST['txtEmail']));
//		$user->address = $database->prep(trim($_POST['txtAddress']));
//		$user->username = $database->prep(trim($_POST['txtUname']));
//		$user->password = $database->prep(trim($_POST['txtUname']));
//		$user->region_name = $database->prep(trim($_POST['txtRegion']));
//		$user->access_level = "regional";
//
//		$result = $user->new_regional_manager();
//		if ($result) {
//			$success = "NEW REGIONAL MANAGER CREATED!!!";
//		}
//		else{
//			$failed = "FAILED TO SAVE USER!!!";
//		}
//	}
?>

<div class="row">
		    <br />
		    <h3 align="center">New Child Registration</h3>
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
			  <div class="form-group">
			    <label for="v_num">Child ID</label>
			    <input type="text" class="form-control" id="title" placeholder="Child ID" name="Child ID" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Mother's Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Mother's Name" name="Mother's Name" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Father's Name</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Father's Name" name="venue" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Child Name</label>
			    <input type="text" class="form-control" id="v_num"  name="sdate" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Date of Birth</label>
			    <input type="date" class="form-control" id="v_num" placeholder="Date of Date" name="edate" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Gender*</label>
			  
                <select  class="form-control" required  name="gender">
                  <option>--</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
<!--
              <div class="form-group">
			    <label for="v_num">Start Time*</label>
			    <input type="time" class="form-control" id="v_num" placeholder="Start Time" name="stime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">End Time*</label>
			    <input type="time" class="form-control" id="v_num" placeholder="End Time" name="etime" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Host Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Host Name" name="nation" required >
			  </div>
              <div class="form-group">
                <label for="v_num">Guest Speaker*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Postal Address" name="pa" required >
			  </div>
-->
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


			  
			  <button type="submit" class="btn btn-default" name="btnSave">Save</button>
			</form>
		</div>


<?php
	include 'layouts/bottom.php';
?>
