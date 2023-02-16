<?php  
require 'includes/includes.php'; 

 $output = '';  
 $sql = "SELECT * FROM group_info "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                                                       <tr>  
                                       <th>#</th>
									<th>Group ID</th>
                                    <th>Group Name</th> 
                                    <th>Date Commence</th> 
                                    <th>Action</th>
                                     
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

           $output .= '  
                 <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>
                     <td>'.$row['Group_ID'].'</td>
                      <td>'.$row['Group_Name'].'</td>
                     <td>'.$row['Date_Commence'].'</td>
                     
					
					
                     <td><a class="btn btn-success" href="manage_add_mem.php?grp='.$row["Group_ID"].'">Add Member</a></td>
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