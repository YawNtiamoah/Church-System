<?php  
require 'includes/includes.php'; 

 $output = '';  
 $sql = "SELECT * FROM membership WHERE Full_Name LIKE '%".$database->prep($_POST["search"])."%' OR First_Name LIKE '%".$database->prep($_POST["search"])."%'  OR Surname LIKE '%".$database->prep($_POST["search"])."%' AND family_ID='".$_GET['fid']."'  "; 
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
                                    <th>Group Name</th>
                                  
                                    <th>Action</th> 
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
                     <td>'.$row['Group'].'</td>
					
                    <td><a class="btn btn-success" href="membership_print.php?tr='.$row["Transaction_ID"].'">View Profile </a></td>
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