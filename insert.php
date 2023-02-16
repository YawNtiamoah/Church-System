<?php  
require_once 'includes/includes.php';
if(isset($_POST['name'])){
        $client = new login;
		$client->name = $database->prep(trim($_POST['name']));
		$client->username = $database->prep(trim($_POST['username']));
		$client->password = $database->prep(trim($_POST['password']));
		$client->branch = $database->prep(trim($_POST['branch']));
		$client->region = $database->prep(trim($_POST['region']));
		$client->district = $database->prep(trim($_POST['district']));
		$client->department = $database->prep(trim($_POST['department']));
		$client->unit = $database->prep(trim($_POST['uni']));
		$client->access_level = $database->prep(trim($_POST['access_level']));
	
			$result = $client->new_client();
		if ($result) {
			$success = "USER SAVED";
		}
		else{
			$failed = "FAILED TO SAVE USER";
		}
		
		
		}
		
 ?> 