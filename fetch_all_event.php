<?php  
require 'includes/includes.php'; 

 $output = '';  
 //$idd=$_GET['grpmem'];
 $sql = "SELECT * FROM event_tb"; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                              <tr>  
                                    <th>#</th>
                                    <th>Title </th>
                                    <th>Theme</th> 
                                    <th>Venue</th> 
                                    <th>Start Date</th>
                                    <th>End Date </th>
									<th>Guest </th>
                                    <th>Action</th> 
                               </tr>';    
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

          
           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>'; 
                    $output .= '<td>'.$row["Title"].'</td>
                     <td>'.$row['Theme'].'</td>
					  <td>'.$row['Venue'].'</td>
                     <td>'.$row['Start_Date'].'</td>
                      <td>'.$row['End_Date'].'</td>
					  <td>'.$row['Guest'].'</td>
                    
					
                     <td><a class="btn btn-success"  href="event_rec.php?tr='.$row["ID"].'&edit=1">View</a></td>
                </tr>  
           
           ';  

           $counter +=1;
      }  
      echo $output;
	    echo  $o= '  
                <tr id="">  
                      <td></td>; 
                      <td></td>
                     <td></td>
					  <td></td>; 
                      <td></td>
                  
                     <td><a class="btn btn-success" href="event_all.php?tr='.$tr.'&mn='.$_GET['mn'].'&yr='.$_GET['yr'].'">Print Report</a></td>
                
                  
                </tr>  
           
           '; 
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