<?php  
require 'includes/includes.php';  
 $output = '';  
 $sql = "SELECT * FROM users WHERE access_level = 'district' AND full_name LIKE '%".$database->prep($_POST["search"])."%'"; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th> 
                                    <th>Region</th>
                                    <th>District</th>
                                    <th>View</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  
           $dis = District::find_by_id($row['district_id']);
           $district = $database->fetch_array($dis);
           $output .= '  
                <tr id="'.$row['user_id'].'">  
                     <td>'.$counter.'</td>
                     <td>'.$row["full_name"].'</td>  
                     <td>'.$row["phone"].'</td>
                     <td>'.$row['region_name'].'</td>
                     <td>'.$district['district_name'].'</td>
                     <td><a class="btn btn-success" href="district_manager.php?id='.$row["user_id"].'">View</a></td>
                </tr>  
           ';  

           $counter +=1;
      }  
      echo $output;
      echo "</div></table>";  
 }  
 else  
 {  
      echo '<div class="col-md-4"></div>
            <div class="alert alert-danger col-md-4 text-center">
                Nothing Was Found!!!
            </div>
            <div class="col-md-4"></div>';  
 } 

 ?>  