<?php  
require 'layouts/top.php'; 

 $output = '';  
 $sql = "SELECT * FROM membership WHERE converts='0' AND DATE(DOR)='".$_GET["day"]."' "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
									<th>Image</th>
                                    <th>Full Name</th>
                                    <th>DOB</th> 
                                    <th>Gender</th>
									<th>Phone Number</th>
									<th>House Number</th> 
                                    <th>Group Name</th>
                                 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>';
					 if($row["logo"]!==""){
                    $output .='<td><img src=images/'.$row["logo"].' width="75" height="50" alt="" /></td> ';
					 }
					 else{
						 $output .= '<td> <img src="assets/images/user.png" width="75" height="50" alt="..." ></td> ';
						 }
                    $output .= '<td>'.$row["Full_Name"].'</td>
                     <td>'.$row['DOB'].'</td>
                     <td>'.$row['Gender'].'</td>
                     <td>'.$row['Phone'].'</td>
					 <td>'.$row['House_Number'].'</td>
					 <td>'.$row['Group'].'</td>
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
                     <td></td>
					  <td></td>
                     <td><a class="btn btn-success" href="member_day.php?tr='.$tr.'&day='.$_GET['day'].'">Print Report</a></td>
                
                  
                </tr>  
           
           ';  
      echo "
	  </div></table>";  
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