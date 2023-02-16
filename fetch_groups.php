<?php  
require 'includes/includes.php'; 
require 'layouts/top.php'; 
 $output = '';  
// $sql = "SELECT * FROM clients WHERE (vehicle_number LIKE '%".$database->prep($_POST["search"])."%' OR driver_name LIKE '%".$database->prep($_POST["search"])."%') AND station_id='".$database->prep($_POST["station_id"])."' "; 
// $result = $database->query_db($sql);  
// if($database->num_rows($result) > 0)  
// {  

      #$output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>Group ID </th>
                                    <th>Group Name</th> 
                                    <th>Date Created</th>
                                    <th>View</th> 
                               </tr>';  
      #$counter = 1;
//      while($row = $database->fetch_array($result))  
//      {  
//
//           $output .= '  
//                <tr id="'.$row['client_id'].'">  
//                     <td>'.$counter.'</td>
//                     <td>'.$row["driver_name"].'</td>  
//                     <td>'.$row["vehicle_number"].'</td>
//                     <td>'.$row['phone'].'</td>
//                     <td>'.$row['driver_license_number'].'</td>
//                     <td>'.$row['vehicle_type'].'</td>
//                     <td><a class="btn btn-success" href="client.php?id='.$row["client_id"].'">View</a></td>
//                </tr>  
//           ';  
//
//           $counter +=1;
//      }  
      echo $output;
      echo "</div></table>";  
// }  
// else  
// {  
//      echo '<div class="col-md-4"></div>
//            <div class="alert alert-danger col-md-4 text-center">
//                Nothing Was Found!!!
//            </div>
//            <div class="col-md-4"></div>';  
// } 
require 'layouts/bottom.php'; 
 ?>  