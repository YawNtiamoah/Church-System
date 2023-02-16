
<?php  
include ('layouts/top.php');
include('includes/sms.php');
/*if(!Authenticated())
	Authenticate();*/

//error_reporting(0);
// file properties
               
               // $row1 = $database->fetch_array($details);

if (isset($_POST['Submit'])){

$sms = new SMS;
 $details = User::find_all_group($_GET['group']);
while($row = $database->fetch_array($details)){

         $mess=$_POST['limitedtextarea'];
         $sub=$_POST['sender'];
         $phone=$row['Phone'];
		$sms->mess = $database->prep($_POST['limitedtextarea']);
		$sms->sms_id = $database->prep(rand(100,200).date("Ymd"));
		$sms->user_id =$_SESSION['user_id'];
		$sms->sender = $database->prep($_POST['sender']);
		$sms->phone = $database->prep($phone);
        $sms->reg=$_SESSION['Region'];
		$sms->dist=$_SESSION['District'];
		$sms->branch=$_SESSION['Branch'];
		$sms->status="all";
        $result = $sms->new_sms();
             sender($mess,$phone);
//echo $phone;
}
}
?>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>


   
    <form method="post" enctype="multipart/form-data" class="col-md-6">
            <div class="form-group">Sender
               <label>*</label>
                      <input name="sender" type="text" class="form-control"  id="sender" value="COP AGAPE CENTRAL" />
                      </div>
                      
                   
                   <div class="form-group">Message
                    <label>*</label>
                      <textarea name="limitedtextarea" cols="70" class="form-control" rows="10"  onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,160);" 
onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,160);"></textarea>
                      <font size="1">(Maximum characters: 160)<br>
                        You have <input name="countdown" type="text" value="160" size="6" readonly> 
                        characters left. </font>                    
                   </div>
                    <label>
                      <input name="Submit" type="submit" class="submit_btn" value="Submit" />
                      </label>
              </form>          
         

<?php   
include('layouts/bottom.php');
?>
