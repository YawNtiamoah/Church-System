<?php
require'includes/includes.php';

if(isset($_POST["region"])) {
    $region = $_POST["region"];
    $sql = "SELECT * FROM districts WHERE region_name='".$region."' ";
    $result = $database->query_db($sql);

    if($database->num_rows($result) > 0){
            echo '<option >-- Please Select District --</option>';
        while($row = $database->fetch_array($result)) {

            echo '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';

        }
    }
    else{
        echo "<option>No Districts Available</option>";
    }
}
else{
    echo "<option>No Districts Available</option>";
}
?>