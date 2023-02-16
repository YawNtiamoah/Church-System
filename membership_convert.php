<?php
include 'layouts/top.php';
// require_once 'includes/includes.php';
 require_once 'includes/user.php';

	//manager details
	/*$man = User::find_by_id($_SESSION['user_id']);
	$manager = $database->fetch_array($man);
*/
	//new client code
	if (isset($_POST['btnSave'])) {
		
		$client = new User;
		$client->tr_id = $database->prep(rand(1,100).rand(10,20).rand(20,70).rand(4,13).date("d"));
		$client->fname = $database->prep(trim($_POST['fn']));
		$client->fn = $database->prep(trim($_POST['fn'].' '.$_POST['sn'].' '.$_POST['on']));
		$client->sname = $database->prep(trim($_POST['sn']));
		$client->oname = $database->prep(trim($_POST['on']));
		$client->dob = $database->prep(trim($_POST['dob']));
		$client->resadd = $database->prep(trim($_POST['ra']));
		$client->pob = $database->prep(trim($_POST['pob']));
		$client->ht = $database->prep(trim($_POST['ht']));
		$client->gender = $database->prep(trim($_POST['gender']));
		$client->pa = $database->prep(trim($_POST['pa']));
		$client->occupation = $database->prep(trim($_POST['oc']));
		$client->nation = $database->prep(trim($_POST['nation']));
		$client->mst = $database->prep(trim($_POST['ms']));
		$client->email = $database->prep(trim($_POST['ea']));
		$client->phone = $database->prep(trim($_POST['ph']));
		$client->group = $database->prep(trim($_POST['gn']));
		$client->converts = $database->prep(trim(1));
		$client->age = $database->prep(trim($_POST['age']));		

		 $img=new Database;
	     $photo=$img->uploadFileSingle('files');
	     $x =  pathinfo($photo['imageUrl']);
		 $client->logo = $database->prep(trim($photo['imageUrl']));

			if($x['extension']=="jpg" || $x['extension']=="png" || $x['extension']=="gif"){
			$file='<img class="img-responsive" src="images/'.$photo['imageUrl'].'" width="50" height="50" alt="logo"/>
';		}
			else{
				
				}
				$fullname=$database->prep(trim($_POST['fn'].' '.$_POST['sn'].' '.$_POST['on']));		
		$client->file_type = $database->prep(trim($file));
			
		$client->del=0;
		$client->reg=$_SESSION['Region']="try";
		$client->dist=$_SESSION['District']="try";
		$client->branch=$_SESSION['Branch']="try";
 if(User::prevent_double($fullname)>0){
		   $failed = "FAILED TO SAVE USER EXIST";
	   }else{
		$result = $client->new_convert(); }
		if ($result) {
			
			$success = "USER SAVED";
			
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
		    <h3 align="center">New Converts Registration</h3>
		    <div class="col-md-3"></div>
		    <form method="post" enctype="multipart/form-data" class="col-md-6">
			  <div class="form-group">
			    <label for="v_num">First Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter First Name" name="fn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Surname*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Surname" name="sn" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Other Name*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Other Name" name="on"  >
			  </div>
              <div class="form-group">
			    <label for="v_num">DOB*</label>
			    <input type="date" class="form-control" id="v_num"  name="dob"  >
			  </div>
               <div class="form-group">
			    <label for="v_num">Age*</label>
			    <input type="text" class="form-control" id="v_num"   name="age"  >
			  </div>
              <div class="form-group">
			    <label for="v_num">Place Of Birth*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Place of Birth" name="pob" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Gender*</label>
			  
                <select  class="form-control" required  name="gender">
                  <option>--</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group">
			    <label for="v_num">Residencial ADD*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Resident Address" name="ra" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Home Town*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Home Town" name="ht" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Nationality*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Nationality" name="nation" required >
			  </div>
              <div class="form-group">Postal Address
                <label for="v_num">*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Postal Address" name="pa" required >
			  </div>
              <div class="form-group">
			    <label for="v_num">Occupation*</label>
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Occupation" name="oc" required >
			  </div>
               <div class="form-group">Marital
                   <label for="v_num">Status*</label>
			  
                <select  name="ms"  class="form-control" id="ms" required>
                  <option>--</option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Divorce</option>
                </select>
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
			    <input type="text" class="form-control" id="v_num" placeholder="Enter Group Name" name="gn"  >
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
			  
                <select  class="form-control"  name="bs">
                  <option>--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
                 <div class="form-group">confimation
                   <label for="v_num">status*</label>
			  
                <select  name="cs"  class="form-control" id="cs" >
                  <option>--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              
			  <div class="form-group">
			    <label for="name">Upload profile pic*</label>
			    <input type="file" class="form-control" name="files" id="name" placeholder="Upload file"  >
			  </div>
              
<!--			 
<input name="commentid" type="hidden" value="<?php #echo rand(100,12).date("d-m");  ?>" />
<input name="admin" type="hidden" value="<?php #echo 1;  ?>" />-->


			  
			  <button type="submit" class="btn btn-default" name="btnSave">Save</button>
			</form>
		</div>
	  </div>

<?php
	include 'layouts/bottom.php';
?>
