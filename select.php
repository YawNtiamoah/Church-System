 <?php  
require'includes/includes.php';
error_reporting(0);
 $output = '';  
  $client = new login;
  $result = $client->selectby($_SESSION['user_id']);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">id</th>  
                     <th width="40%">Full Name</th>  
                     <th width="40%">Username</th> 
					  <th width="10%">Password</th> 
                     <th width="10%">Branch</th>
					 <th width="10%">District</th>
					 <th width="10%">Region</th>
					 <th width="10%">Department</th>
					 <th width="10%">Unit</th>
					 <th width="10%">Access Level</th>
	  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
 
  $output .= '  
           <tr>  
                <td></td>  
                <td id="name" contenteditable></td>  
                <td id="username" contenteditable></td> 
				 <td id="password" contenteditable></td>  
                <td id="branch" contenteditable></td> 
				<td id="district" contenteditable></td> 
				<td id="region" contenteditable></td>  
				 <td id="department" contenteditable></td>  
				  <td id="uni" contenteditable></td>  
				<td id="access_level" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="name" data-id1="'.$row["id"].'" contenteditable>'.$row["name"].'</td>  
                     <td class="username" data-id2="'.$row["id"].'" contenteditable>'.$row["username"].'</td>  
					 <td class="password" data-id3="'.$row["id"].'" contenteditable>'.$row["password"].'</td>  
                     <td class="branch" data-id4="'.$row["id"].'" contenteditable>'.$row["branch"].'</td>
					 <td class="branch" data-id4="'.$row["id"].'" contenteditable>'.$row["district"].'</td>
					 <td class="branch" data-id4="'.$row["id"].'" contenteditable>'.$row["region"].'</td>
					  <td class="branch" data-id5="'.$row["id"].'" contenteditable>'.$row["department"].'</td>
					   <td class="branch" data-id6="'.$row["id"].'" contenteditable>'.$row["unit"].'</td>
					 <td class="access_level" data-id7="'.$row["id"].'" contenteditable>'.$row["Access_Level"].'</td>  
                     <td><button type="button" name="delete_btn" data-id8="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
     
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?> 