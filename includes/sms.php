<?php
//require 'Station.php';
function clean($string) {
      // Replaces all spaces with hyphens.
   
   $string = str_replace('0','233', $string); // Replaces all spaces with hyphens.
 
return $string;
}
                                   
									
function sender($message,$phone){
$mess=$message;
$from="RPC";
 $phone=clean($phone);
 $username = "richardkanfrah";
 $password ="godwin1.";
		
//echo $phone;
  $sender=$sub;
   // $user = "gsoft";
 //   $password = "gsoft123"; 
    $message = $mess;
    $recipient=(string)$phone;
   
 //   $url ="http://www.hightelsms.com/components/com_smsreseller/smsapi.php";
    $message = urlencode($message);
   // $ch = curl_init();
	
	//	$from = "try";//your senderid example "kwamena" max is 11 chars;
		$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";
		//$to = '233201870623';// All numbers must have country code. delimit them with comma(,)
		$params = "username=".$username."&password=".$password."&from=".$from."&to=".$phone."&message=".$message ;
    //header("location:$url");
	$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$baseurl);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
		$return=curl_exec($ch);
		curl_close($ch);	
		$send = explode(" :: ",$return);		
		if (stristr($send[0],"SUCCESS") != FALSE)
		{			
			echo "message sent";	
					
		}
		else
		{
			echo "message could not be sent";			
		
//header("Location:receipt.php?sid=$id&bid=$id2&cls=$id6&term=$id7&id8=$id8&arears=$Arears");
        }
}

?>