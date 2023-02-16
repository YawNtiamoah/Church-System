<?php
include "includes/includes.php";
$id = $_GET['id'];
$sql = "UPDATE `membership` SET `converts`= '1' WHERE `ID`='".$id."'"; 
//print_r($sql);
 $result = $database->query_db($sql);  
if($result){
	?>
				<script>
				window.location="membership_print.php?tr=<?php echo $_GET['tr']; ?>";
				</script>
				<?php
	}
?>