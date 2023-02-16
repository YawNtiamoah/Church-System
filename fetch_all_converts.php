<?php  
require 'includes/includes.php'; 

 $output = '';  
 $sql = "SELECT * FROM membership WHERE converts='1' "; 
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
                                    <th>Residence Address</th>
                                    <th>Email</th>
									<th>Phone</th>
                                    <th>Action</th> 
                               </tr>';  
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>';
					 if($row["logo"]){
                    $output .='<td><img src=images/'.$row["logo"].' width="75" height="50" alt="" /></td> ';
					 }
					 else{
						 $output .= '<td> <img src="assets/images/user.png" width="75" height="50" alt="..." ></td> ';
						 }
                    $output .= '<td>'.$row["Full_Name"].'</td>
                     <td>'.$row['DOB'].'</td>
                     <td>'.$row['Gender'].'</td>
                     <td>'.$row['Residence_Address'].'</td>
					 <td>'.$row['Email'].'</td>
					 <td>'.$row['Phone'].'</td>
                     <td><a class="btn btn-success" href="membership_print.php?tr='.$row["Transaction_ID"].'">View Info </a></td> <td><a class="btn btn-success" href="activate_member.php?tr='.$row["Transaction_ID"].'&id='.$row["ID"].'">Activate Membership. </a></td>
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
					 
                     <td><a class="btn btn-success" href="convert_all.php?tr='.$tr.'&mn='.$_GET['mn'].'&yr='.$_GET['yr'].'">Print Report</a></td>
                
                  
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