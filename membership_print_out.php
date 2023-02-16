<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RPC</title>
<style type="text/css">
<!--
.style7 {font-size: x-large; font-weight: bold; color: #030303; }
.style12 {
	font-size: 12px;
	font-weight: bold;
}
.style13 {font-size: 12px}
.style1 {	font-size: x-large;
	font-weight: bold;
	color: #000000;
}
.style22 {
	color: #FFFFFF;
	font-weight: bold;
}
.style23 {color: #FFFFFF; font-size: 12px; font-weight: bold; }
.style24 {color: #FFFFFF}
.style25 {font-size: 12px; color: #FFFFFF; }
-->
</style>
</head>

<body bgcolor="#000000">
<div align="center">
  <table bgcolor="#FFFFFF" width="200" border="0">
    <tr>
      <td><table width="736" height="580" border="0">
        <tr>
          <td width="81">&nbsp;</td>
          <td width="175" height="101"><img src="pcg_presby_logo.png" alt="alt" width="148" height="128" /></td>
          <td colspan="4"><h6 align="left" class="style7"><span class="style1">C.O.P ABLEKUMA-AGAPE CENTRAL  </span> </h6></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td height="18">&nbsp;</td>
          <td width="176" height="18">&nbsp;</td>
          <td colspan="3" rowspan="8"><table align="left" width="100" border="3">
            <tr>
              <?php    
		
		include('includes/user.php');
		
	
		
		
		 $details = User::find_by_id($_GET['tr']);
    $member = $database->fetch_array($details);

		
		?>
             
		
		  ?>
              <th scope="col"><img src='<?php  echo  'images/'.$member['logo'];//echo print_r($row['image']); ?>' alt="a" width="167" height="163" /></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">First Name </div></td>
          <td width="176" height="-2">&nbsp;&nbsp;&nbsp;<?php echo $member['First_Name'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">Surname</div></td>
          <td width="176" height="-2">&nbsp;&nbsp;&nbsp;<?php echo $member['Surname'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">Other Names :</div></td>
          <td width="176" height="-2">&nbsp;&nbsp;&nbsp;<?php echo $member['Other_Name'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">Date of Birth </div></td>
          <td width="176" height="-1">&nbsp;&nbsp;&nbsp;<?php echo $member['DOB'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">Nationality :</div></td>
          <td width="176" height="-1">&nbsp;&nbsp;&nbsp;<?php echo $member['Nationality'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td><div align="right" class="style12">Postal Address</div></td>
          <td width="176" height="18">&nbsp;&nbsp;&nbsp;<?php echo $member['Postal_address'];       ?></td>
        </tr>
        <tr>
          <td width="81">&nbsp;</td>
          <td height="18"><div align="right"><span class="style12">Gender </span></div></td>
          <td width="176" height="18">&nbsp;&nbsp;&nbsp;<?php echo $member['Gender'];       ?></td>
        </tr>
        <tr>
          <td><div align="right"></div></td>
          <td colspan="4">&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td><div align="right" class="style12">Email Address:</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Email'];       ?></td>
          <td width="144"><div align="left" class="style13">
            <div align="right"><strong>Residence Address </strong></div>
          </div></td>
          <td width="138">&nbsp;&nbsp;&nbsp;<?php echo $member['Residence_Address'];       ?></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td><div align="right" class="style12">Group Membership</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Group'];       ?></td>
          <td><div align="left" class="style13">
            <div align="right"><strong>Occupation:</strong></div>
          </div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Occupation'];       ?></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td><div align="right"><span class="style13"></span>
            <div align="right"><span class="style12">Marital Status</span></div>
          </div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Marital_Status'];       ?></td>
          <td><div align="left" class="style13">
            <div align="right"><strong>Phone Number </strong></div>
          </div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Phone'];       ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">Place of Birth</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Place_of_Birth'];?></td>
          <td><div align="right">Partner Name</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Partner_Name'];?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">Home Town</div></td>
          <td>&nbsp;&nbsp; <?php echo $member['Home_town'];?></td>
          <td><div align="right">Marriage Date</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Marriage_date'];?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">Baptism Date</div></td>
          <td>&nbsp;&nbsp; <?php echo $member['Baptism_date'];?></td>
          <td><div align="right">Marriage Number</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['Marriage_cert'];?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">Confirmation Date</div></td>
          <td>&nbsp;&nbsp; <?php echo $member['Confirmation_date'];?></td>
          <td><div align="right">NOC</div></td>
          <td>&nbsp;&nbsp;&nbsp;<?php echo $member['No_of_children'];?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">House Number</div></td>
          <td>&nbsp;&nbsp; <?php echo $member['House_No'];?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>

</html>
