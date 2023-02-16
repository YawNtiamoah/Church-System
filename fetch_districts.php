<?php  
require 'includes/includes.php';  
  session_start();
  $u = User::find_by_id($_SESSION['user_id']);
  $user = $database->fetch_array($u);

 $output = '';  
 $sql = "SELECT * FROM districts WHERE region_name='".$user['region_name']."' AND district_name LIKE '%".$database->prep($_POST["search"])."%'"; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  
      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>District Name</th>
                                    <th>Region</th>
                                    <th>View</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  
           $output .= '  
                <tr id="'.$row['district_id'].'">  
                     <td>'.$counter.'</td>
                     <td>'.$row["district_name"].'</td>
                     <td>'.$row['region_name'].'</td>
                     <td><a class="btn btn-success" href="district.php?id='.$row["district_id"].'">View</a></td>
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