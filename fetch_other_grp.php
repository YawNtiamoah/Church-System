<?php  
require 'includes/includes.php'; 

 $output = '';  
   $idd=$_GET['grpmem']; 
 $sql = "SELECT * FROM group_mem WHERE `Full_Name` LIKE '%".$database->prep($_POST["search"])."%' AND Group_ID='$idd' "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

    
      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th
                                    <th>Transaction ID</th>
                                    <th>Full Name</th> 
                                    <th>Phone</th> 
                                    <th>Group ID</th>
                                   
                                    <th>Action</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

          
           $output .= '  
                <tr id="'.$row['ID'].'">  
                     
                      <td>'.$row["Transaction_ID"].'</td>
                     <td>'.$row['Full_Name'].'</td>
					  <td>'.$row['Phone'].'</td>
                     <td>'.$row['ID'].'</td>
                     			
                   <td><a class="btn btn-success"  href="membership_print.php?tr='.$row["Transaction_ID"].'">View Member</a></td>        </tr>  
           
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
