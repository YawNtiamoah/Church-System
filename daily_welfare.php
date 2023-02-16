<?php  
require 'layouts/top.php'; 
error_reporting(0);
 $output = '';  
 //$idd=$_GET['grpmem'];
 $doe=date("Y-m-d");
 $sql = "SELECT *  FROM welfare WHERE DATE(DOE)='".$doe."' "; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>#</th>
                                    <th>Transaction ID </th>
                                    <th>Full_Name</th> 
                                    <th>Amount</th> 
                                    <th>Date of Entry</th>
                                    
                               </tr>';    
      $counter = 1;
      while($row = $database->fetch_array($result))  
      {  

          $amt+=$row['Amount'];
           $output .= '  
                <tr id="'.$row['ID'].'">  
                      <td>'.$counter.'</td>'; 
                    $output .= '<td>'.$row["Transaction_ID"].'</td>
                     <td>'.$row['Full_Name'].'</td>
					  <td>'.number_format($row['Amount'],3).'</td>
                     <td>'.$row['DOE'].'</td>
                  
                </tr>  
           
           ';  

           $counter +=1;
      }  
      echo $output;
	  
	   echo  $o= '  
                <tr id="">  
                      <td></td>; 
                      <td></td>
                     <td>Total Amount :</td>
					  <td>'.number_format($amt,3).'</td>
                     <td></td>
                  
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
require 'layouts/bottom.php'; 
 ?>  