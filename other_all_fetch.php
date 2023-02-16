<?php  
require 'includes/includes.php'; 

 $output = '';  
 $sql = "SELECT * FROM group_info GROUP BY `Group_Name` "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                                                       <tr>  
                                    <th>#</th>
									<th>Transaction</th>
                                 <th>Group ID</th> 
                                    <th>Group Name</th> 
                                   
                                   
                                    <th>Action</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>
                     <td>'.rand(1000,5000).'</td>
                    
                   <td>'.$row['Group_ID'].'</td>
                      <td>'.$row['Group_Name'].'</td>
                     
					
                     <td><a class="btn btn-success" href="manage_grouplist.php?grpmem='.$row["Group_ID"].'&grp='.$row["Group_Name"].'">View Members</a></td>
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