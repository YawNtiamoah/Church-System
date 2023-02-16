<?php  
require 'layouts/top.php'; 
error_reporting(0);
 $output = '';  
 //$idd=$_GET['grpmem'];
 $sql = "SELECT *  FROM account WHERE Acc_type LIKE '%".$database->prep($_POST["search"])."%' AND  DATE(DOE)='".$_GET["day"]."'"; 
 $result = $database->query_db($sql);  
 if($database->num_rows($result) > 0)  
 {  

      $output .= '<h4 align="center">'.$database->num_rows($result).' Result(s) Found</h4>';  
      $output .= '<div class="container">
                    <div class="table table-hover">  
                          <table class="table table bordered">  
                              <tr>  
                                    <th>#</th>
                                    <th>Account ID </th>
                                    <th>Account Type</th> 
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
                    $output .= '<td>'.$row["Acc_ID"].'</td>
                     <td>'.$row['Acc_type'].'</td>
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
                     <td><a class="btn btn-success" href="finance_day.php?tr='.$tr.'&yr='.$_GET['day'].'">Print Report</a></td>
                
                  
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