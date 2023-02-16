<?php
require'includes/includes.php';

if(isset($_POST["district"])) {
    $district = $_POST["district"];
    $sql = "SELECT * FROM stations WHERE district_id='".$district."' ";
    $result = $database->query_db($sql);

    if($database->num_rows($result) > 0){
        while($row = $database->fetch_array($result)) {

            echo '<option value="'.$row["station_id"].'">'.$row["station_name"].'</option>';

        }
    }
    else{
        echo "<option>No Stations Available</option>";
    }
}
else{
    echo "<option>No Stations Available</option>";
}
?>