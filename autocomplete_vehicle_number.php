<?php  
 include 'includes/includes.php';
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT vehicle_number FROM clients WHERE vehicle_number LIKE '%".$_POST["query"]."%'";  
      $result = $database->query_db($query);  
      $output = '<ul class="list-unstyled" style="background-color:white; color:black; cursor:pointer; padding-left:5px; padding-top:5px; ">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["vehicle_number"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li style="padding:12px;">Vehicle Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>