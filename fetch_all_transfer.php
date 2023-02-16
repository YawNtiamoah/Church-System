<?php  
require 'includes/includes.php'; 

 $output = '';  
 $sql = "SELECT * FROM transfer_tb WHERE Status ='1' "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
									<th>Full_Name</th>
                                    <th>Transfer Date</th>
                                    <th>Reason</th> 
                                    <th>Region</th> 
                                    <th>District</th>
									<th>Branch</th>
                                    
                                    <th>Action</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>
					 <td>'.$row["Full_Name"].'</td>
                     <td>'.$row['DOE'].'</td>
                     <td>'.$row['Reason'].'</td>
                     <td>'.$row['Region'].'</td>
					 <td>'.$row['District'].'</td>
					 <td>'.$row['Branch'].'</td>
					
                     <td><a class="btn btn-success" href="membership_print.php?tr='.$row["Transaction_ID"].'">View/a></td>
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