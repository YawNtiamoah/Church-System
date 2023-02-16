<?php
include 'includes/includes.php';
if(isset($_GET['id']) and isset($_GET['redirect'])){
	$result = User::delete_user($_GET['id']);
	if($result){
		echo "<script type='text/javascript'>
						alert('USER DELETED');
						location.assign('".$_GET['redirect']."');
					</script>";
	}
	else{
		echo "<script type='text/javascript'>
						alert('DELETION FAILED');
						location.assign('".$_GET['redirect']."');
					</script>";
	}
}
else{
	redirect_to('dashboard.php');
}

?>