<?php
	class User{
		var $id;
		var $tr_id;
		var $fname;
		var $fn;
		var $sname;
		var $oname;
		var $dob;
		var $resadd;
		var $pob;
		var $logo;
		var $ht;
		var $gender;
		var $pa;
		var $occupation;
		var $nation;
		var $mst;
		var $email;
		var $phone;
		var $group;
		var $lp;
		var $lb;
		var $lc;
		var $lm;
		var $del;
		var $bd;
		var $mbn;
		var $vob;
		var $cd;
		var $mcn;
		var $voc;
		var $partner_Name;
		var $married_date;
		var $married_cert;
		var $married_no;
		var $noc;
		var $reg;
		var $dist;
		var $branch;
		var $file_type;
		var $converts;
		var $fsn;
		var $hse;
		var $fid;
		var $comm;
		var $mtype;
		var $mem;
		var $age;
		
		
		function __construct()
		{
			
		}

		public static function total_users(){
			global $database;
			$result = $database->query_db("SELECT * FROM membership");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function find_DOB_NO(){
			global $database;
			$dat=date("m");
	//$query="SELECT * FROM membership WHERE MONTH(DOB)='".$dat."'";
			$results = $database->query_db("SELECT * FROM membership WHERE MONTH(DOB)='".$dat."'");
			$number = $database->num_rows($results);
			return $number;
		}
		public static function total_convert(){
			global $database;
			$result = $database->query_db("SELECT * FROM membership WHERE converts='1'");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function prevent_double($id){
			global $database;
			$result = $database->query_db("SELECT * FROM membership WHERE Full_Name='".$id."'");
			$number = $database->num_rows($result);
			return $number;
		}

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_membership(){
			global $database;
			$sql="INSERT INTO membership (`Transaction_ID`, `First_Name`, `Surname`, `Other_Name`, `DOB`, `Place_of_Birth`, `Gender`, `Residence_Address`, `Home_Town`, `House_Number`, `Nationality`, `Postal_Address`, `Occupation`, `Marital_Status`, `Email`, `Phone`, `Group`, `Full_Name`, `No_of_children`, `Level_Parent`, `Level_Baptism`, `Level_Confirm`, `Level_Married`, `family_ID`, `Delete_by`, `Region`, `District`, `Branch`, `file_path`, `logo`, `Commune`, `Mem_type`, `Age`) VALUES('".$this->tr_id."', '".$this->fname."', '".$this->sname."', '".$this->oname."', '".$this->dob."', '".$this->pob."', '".$this->gender."', '".$this->resadd."', '".$this->ht."', '".$this->hse."','".$this->nation."', '".$this->pa."', '".$this->occupation."', '".$this->mst."', '".$this->email."', '".$this->phone."', '".$this->group."', '".$this->fn."', '".$this->noc."', '".$this->lp."', '".$this->lb."', '".$this->lc."', '".$this->lm."', '".$this->fid."','".$this->del."', '".$this->reg."', '".$this->dist."', '".$this->branch."', '".$this->file_type."', '".$this->logo."', '".$this->comm."', '".$this->mtype."', '".$this->age."')";
		//	print_r($sql);
		$result = $database->query_db($sql);
			return $result;
		}
function new_convert(){
			global $database;
			$sql="INSERT INTO membership (`Transaction_ID`, `First_Name`, `Surname`, `Other_Name`, `DOB`, `Place_of_Birth`, `Gender`, `Residence_Address`, `Home_Town`, `Nationality`, `Postal_Address`, `Occupation`, `Marital_Status`, `Email`, `Phone`, `Group`, `Full_Name`, `converts`, `Delete_by`, `Region`, `District`, `Branch`, `file_path`, `logo`) VALUES('".$this->tr_id."', '".$this->fname."', '".$this->sname."', '".$this->oname."', '".$this->dob."', '".$this->pob."', '".$this->gender."', '".$this->resadd."', '".$this->ht."', '".$this->nation."', '".$this->pa."', '".$this->occupation."', '".$this->mst."', '".$this->email."', '".$this->phone."', '".$this->group."', '".$this->fn."', '".$this->converts."', '".$this->del."', '".$this->reg."', '".$this->dist."', '".$this->branch."', '".$this->file_type."', '".$this->logo."')";
			//print_r($sql);
		$result = $database->query_db($sql);
			return $result;
		}



function update_member($id){
			global $database;	
	$result = $database->query_db("UPDATE `membership` SET `First_Name`= '".$this->fname."', `Surname`= '".$this->sname."', `Other_Name` = '".$this->oname."', `DOB` = '".$this->dob."', `Place_of_Birth` = '".$this->pob."', `Gender` = '".$this->gender."', `Residence_Address` = '".$this->resadd."', `Home_Town` = '".$this->ht."', `Nationality` = '".$this->nation."', `Postal_Address` = '".$this->pa."', `Occupation` = '".$this->occupation."', `Marital_Status` = '".$this->mst."', `Email` = '".$this->email."', `Phone` = '".$this->phone."', `Group` = '".$this->group."', `Full_Name` = '".$this->fn."', `file_path`= '".$this->file_type."',`logo` = '".$this->logo."', `House_Number`= '".$this->hse."',`No_of_children` = '".$this->noc."',`Commune`='".$this->comm."',`Mem_type`='".$this->mtype."' WHERE `Transaction_ID`=".$id." ");
			return $result;
		}
			function memberID($id,$me){
			global $database;	
	$result = $database->query_db("UPDATE `membership` SET `church_id`= '".$mem."' WHERE `Transaction_ID`='".$id."' ");
			return $result;
		}
		
		
		function activate_member($id){
			global $database;	
	$result = $database->query_db("UPDATE `membership` SET `converts`= '1' WHERE `Transaction_ID`='".$id."' ");
			return $result;
		}

		function update_baptism($id,$tr){
			global $database;
			$result = $database->query_db("UPDATE `membership` SET `Baptism_Date` = '".$this->bd."', `Minister_Name_Baptism` = '".$this->mbn."', `Venue_Baptism` = '".$this->vob."', `Level_Baptism` = '".$id."' WHERE `Transaction_ID` = '".$tr."' ");
			return $result;
		}
		function update_confirmation($id,$tr){
			global $database;
			$result = $database->query_db("UPDATE `membership` SET `Confirmation_Date` = '".$this->cd."', 	`Minister_Name_Confirmation`='".$this->mcn."', `Venue_Confirmation`='".$this->voc."', `Level_Confirm`='".$id."' WHERE Transaction_ID='".$tr."' ");
			return $result;
		}
		 
		function update_marriage($id,$tr){
			global $database;
			$result = $database->query_db("UPDATE `membership` SET `Partner_Name` = '".$this->partner_Name."', `Marriage_Date`='".$this->married_date."', `Marriage_Certificate`='".$this->married_cert."', `family_surname`='".$this->fsn."', `Level_Married`='".$id."', `marriage_cert_no`='".$this->married_no."' WHERE `Transaction_ID`='".$tr."' ");
			return $result;
		}
		

		public static function delete_member($id){
			global $database;
			$result = $database->query_db("UPDATE membership SET Delete_by = '".$this->del."' WHERE ID=".$id." ");	return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM membership WHERE `Transaction_ID`='".$id."'");
			return $results;
		}
		public static function find_by_search($id){
			global $database;
			$results = $database->query_db("SELECT * FROM membership WHERE `ID`='".$id."'");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM membership");
			return $results;
		}
		public static function find_DOB(){
			global $database;
			$dat=date("m");
			$results = $database->query_db("SELECT * FROM membership WHERE MONTH(DOB)='".$dat."'");
			return $results;
		}
public static function find_all_group($id){
			global $database;
			$results = $database->query_db("SELECT * FROM membership WHERE `Group`='".$id."'");
			return $results;
		}
		public static function find_all_convert(){
			global $database;
			$results = $database->query_db("SELECT * FROM membership WHERE `converts`='1'");
			return $results;
		}

	}
	class SMS{
		
	    var $sms_id;
		var $mess;
		var $phone;
		var $branch;
		var $district;
		var $region;
		var $user_id;
		var $status;
		function __construct()
		{
			
		}

		public static function total_sms(){
			global $database;
			$result = $database->query_db("SELECT * FROM send_sms");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_sms(){
			global $database;
			$result = $database->query_db("INSERT INTO `send_sms`(`sms_id`, `message`, `Phone`, `Region`, `District`, `Branch`, `user_id`, `Status`) VALUES('".$this->sms_id."', '".$this->mess."', '".$this->phone."', '".$this->region."', '".$this->district."', '".$this->branch."', '".$this->user_id."', '".$this->status."')");
		
			return $result;
		}
	/*	function update_transfer($id){
			global $database;
			$result = $database->query_db("UPDATE `transfer_tb` SET `Full_Name`= '".$this->fname."', `Reason`= '".$this->treason."', `DOE`= '".$this->doe."', `Region`= '".$this->region."', `District`= '".$this->district."', `Branch`= '".$this->branch."' WHERE Transaction_ID=".$id." ");
			return $result;
		}
		
		public static function delete_group($id){
			global $database;
			$results = $database->query_db("DELETE FROM transfer_tb WHERE Transaction_ID=".$id."");
			return $results;
		}*/

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM send_sms WHERE sms_id=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM send_sms ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM send_sms");
			return $results;
		}

		
	}
////////////////////////////////////////////////////////////////
	
	
	class Transfers{
		
	    var $tid;
		var $fname;
		var $treason;
		var $branch;
		var $district;
		var $region;
		var $doe;
		var $status;
		function __construct()
		{
			
		}

		public static function total_transfer(){
			global $database;
			$result = $database->query_db("SELECT * FROM transfer_tb");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_transfer(){
			global $database;
			$result = $database->query_db("INSERT INTO `transfer_tb`(`Transaction_ID`, `Full_Name`, `Reason`, `DOE`, `Region`, `District`, `Branch`, `Status`) VALUES('".$this->tid."', '".$this->fname."', '".$this->treason."', '".$this->doe."', '".$this->region."', '".$this->district."', '".$this->branch."', '".$this->status."')");
		
			return $result;
		}
		function update_transfer($id){
			global $database;
			$result = $database->query_db("UPDATE `transfer_tb` SET `Full_Name`= '".$this->fname."', `Reason`= '".$this->treason."', `DOE`= '".$this->doe."', `Region`= '".$this->region."', `District`= '".$this->district."', `Branch`= '".$this->branch."' WHERE Transaction_ID=".$id." ");
			return $result;
		}
		
		public static function delete_group($id){
			global $database;
			$results = $database->query_db("DELETE FROM transfer_tb WHERE Transaction_ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM transfer_tb WHERE Transaction_ID=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM transfer_tb ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM transfer_tb");
			return $results;
		}

		
	}
////////////////////////////////////////////////////////////////
	
	
	
	
	class Attendence{
		
	    var $child;
		var $youth;
		var $adult;
		var $branch;
		var $district;
		var $region;
		var $doe;
		
		function __construct()
		{
			
		}

		public static function total_attendence(){
			global $database;
			$result = $database->query_db("SELECT SUM(Children) AS tot3 , SUM(Youth) AS tot2 , SUM(Adult) AS tot1 FROM attendence");
				 $number=$database->fetch_array($result);
			     //
			//$number = $database->num_rows($result);
			return $number['tot1'] + $number['tot2'] + $number['tot3'] + 0;
		
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_attendence(){
			global $database;
			$result = $database->query_db("INSERT INTO attendence(Children,Youth,Adult,DOE,Branch,District,Region) VALUES('".$this->child."', '".$this->youth."', '".$this->adult."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_attendence($id){
			global $database;
			$result = $database->query_db("UPDATE attendence SET Children= '".$this->child."', Youth= '".$this->youth."', Adult= '".$this->adult."', DOE= '".$this->doe."' WHERE ID=".$id." ");
			return $result;
		}
		
		public static function delete_attendence($id){
			global $database;
			$results = $database->query_db("DELETE FROM attendence WHERE `ID` = '".$id."'");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM attendence WHERE `ID` = '".$id."'");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM attendence ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM attendence");
			return $results;
		}
    
		
	}
////////////////////////////////////////////////////////////////
class Group_Info{
		
	    var $gid;
		var $gname;
		var $description;
		var $branch;
		var $district;
		var $region;
		var $doe;
		var $fn;
		var $ph;
		var $tid;
		var $amt;
		var $dp;
		function __construct()
		{
			
		}

		public static function total_group(){
			global $database;
			$result = $database->query_db("SELECT * FROM group_info");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_group(){
			global $database;
			$result = $database->query_db("INSERT INTO group_info(Group_ID,Group_Name,Description,Date_Commence,Branch,District,Region) VALUES('".$this->gid."', '".$this->gname."', '".$this->description."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_group($id){
			global $database;
			$result = $database->query_db("UPDATE group_info SET Group_Name= '".$this->gname."', Description= '".$this->description."', Date_Commence= '".$this->doe."' WHERE Group_ID=".$id." ");
			return $result;
		}
		
		public static function delete_group($id){
			global $database;
			$results = $database->query_db("DELETE FROM group_info WHERE Group_ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM group_info WHERE Group_ID='".$id."'");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM group_info ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM group_info");
			return $results;
		}
     function new_group_mem(){
			global $database;
			$result = $database->query_db("INSERT INTO group_mem(Group_ID,Transaction_ID,Full_Name,Phone) VALUES('".$this->gid."', '".$this->tid."', '".$this->fn."', '".$this->ph."')");
			return $result;
		}
		 function new_group_dues(){
			global $database;
			$result = $database->query_db("INSERT INTO group_dues(Group_ID,Transaction_ID,Full_Name,Phone,Amount,DOE) VALUES('".$this->tid."', '".$this->tid."', '".$this->fn."', '".$this->ph."', '".$this->amt."', '".$this->dp."')");
			return $result;
		}
		
	}
////////////////////////////////////////////////////////////////
class tithe{
		
	    var $tid;
		var $fn;
		var $amt;
		var $branch;
		var $district;
		var $region;
		var $doe;
		
		function __construct()
		{
			
		}

		public static function total_tithe(){
			global $database;
			$result = $database->query_db("SELECT * FROM tithe");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function total_tithe_all(){
			global $database;
			$result = $database->query_db("SELECT SUM(Amount) AS tot  FROM tithe");
			 $number=$database->fetch_array($result);
			     //
			//$number = $database->num_rows($result);
			return $number['tot'] + 0;
		}
		public static function total_tithe_day(){
			global $database;
			$date=date("Y-m-d");
			$result = $database->query_db("SELECT SUM(Amount) AS tot  FROM tithe WHERE DATE(DOE)='".$date."'");
			 $number=$database->fetch_array($result);
			     //
			//$number = $database->num_rows($result);
			return $number['tot'] + 0;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_tithe(){
			global $database;
			$result = $database->query_db("INSERT INTO tithe(Transaction_ID,Full_Name,Amount,DOE,Branch,District,Region) VALUES('".$this->tid."', '".$this->fn."', '".$this->amt."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_tithe($id){
			global $database;
			$result = $database->query_db("UPDATE tithe SET Full_Name= '".$this->fn."', Amount= '".$this->amt."', DOE= '".$this->doe."' WHERE ID=".$id." ");
			return $result;
		}
		
		public static function delete_tithe($id){
			global $database;
			$results = $database->query_db("DELETE FROM tithe WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM tithe WHERE ID=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM tithe ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM tithe");
			return $results;
		}
  
	}
////////////////////////////////////////////////////////////////
class expense{
		
	    var $accid;
		var $reason;
		var $amt;
		var $branch;
		var $district;
		var $region;
		var $doe;
		var $user_id;
		
		function __construct()
		{
			
		}

		public static function total_expense(){
			global $database;
			$result = $database->query_db("SELECT * FROM expense");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function total_expense_account(){
			global $database;
			$result = $database->query_db("SELECT SUM('Amount') AS tot FROM expense");
			 $number=$database->fetch_array($result);
			return $number['tot'] + 0;
		}
		
      	
public static function total_expense_day(){
			global $database;
			$date=date("Y-m-d");
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM expense WHERE DATE(DOE)='".$date."'");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
		// public static function total_users(){ 
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_expense(){
			global $database;
			$result = $database->query_db("INSERT INTO expense(Acc_ID,Reason,Amount,DOE,Branch,District,Region,user_id) VALUES('".$this->accid."', '".$this->reason."', '".$this->amt."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."', '".$this->user_id."')");
			return $result;
		}
		function update_expense($id){
			global $database;
			$result = $database->query_db("UPDATE expense SET Reason= '".$this->reason."', Amount= '".$this->amt."', DOE= '".$this->doe."' WHERE Acc_ID=".$id." ");
			return $result;
		}
		
		public static function delete_expense($id){
			global $database;
			$results = $database->query_db("DELETE FROM expense WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM expense WHERE `Acc_ID` = '".$id."'");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM expense ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM expense");
			return $results;
		}
  
	}
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
class account{
		
	    var $accid;
		var $acctype;
		var $amt;
		var $branch;
		var $district;
		var $region;
		var $user_id;
		var $doe;
		
		function __construct()
		{
			
		}

		public static function total_account(){
			global $database;
			$result = $database->query_db("SELECT * FROM account");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function total_account_all(){
			global $database;
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM account");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
		public static function total_account_day(){
			global $database;
			$date=date("Y-m-d");
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM account WHERE DATE(DOE)='".$date."'");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
      	

		// public static function total_users(){  $number=$database->fetch_array($result);
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_account(){
			global $database;
			$result = $database->query_db("INSERT INTO account(Acc_ID,Acc_type,Amount,DOE,Branch,District,Region,user_id) VALUES('".$this->accid."', '".$this->acctype."', '".$this->amt."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."', '".$this->user_id."')");
			return $result;
		}
		function update_account($id){
			global $database;
			$result = $database->query_db("UPDATE account SET Acc_type= '".$this->acctype."', Amount= '".$this->amt."', DOE= '".$this->doe."' WHERE Acc_ID=".$id." ");
			return $result;
		}
		
		public static function delete_account($id){
			global $database;
			$results = $database->query_db("DELETE FROM account WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM account WHERE `Acc_ID` = '".$id."'");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM tithe ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM account");
			return $results;
		}
  
	}
////////////////////////////////////////////////////////////////
class welfare{
		
	    var $tid;
		var $fn;
		var $amt;
		var $branch;
		var $district;
		var $region;
		var $doe;
		var $ph;
		var $reason;
		
		function __construct()
		{
			
		}

		public static function total_welfare(){
			global $database;
			$result = $database->query_db("SELECT * FROM welfare");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function total_welfare_all(){
			global $database;
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM welfare");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
		public static function total_welfare_day(){
			global $database;
			$date=date("Y-m-d");
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM welfare WHERE DATE(DOE)='".$date."'");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
		public static function total_welfare_all_benefit(){
			global $database;
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM welfare_benefits");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
		public static function total_welfare_day_benefit(){
			global $database;
			$date=date("Y-m-d");
			$result = $database->query_db("SELECT SUM(Amount) AS tot FROM welfare_benefits WHERE DATE(DOE)='".$date."'");
			$number = $database->fetch_array($result);
			return $number['tot'] + 0;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_welfare(){
			global $database;
			$result = $database->query_db("INSERT INTO welfare(Transaction_ID,Full_Name,Amount,DOE,Branch,District,Region) VALUES('".$this->tid."', '".$this->fn."', '".$this->amt."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function new_welfare_benefit(){
			global $database;
			$result = $database->query_db("INSERT INTO welfare_benefits(Transaction_ID,Full_Name,Amount,Reason,DOE,Branch,District,Region) VALUES('".$this->tid."', '".$this->fn."', '".$this->amt."', '".$this->reason."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_welfare($id){
			global $database;
			$result = $database->query_db("UPDATE welfare SET Full_Name= '".$this->fn."', Amount= '".$this->amt."', DOE= '".$this->doe."' WHERE ID=".$id." ");
			return $result;
		}
		
		public static function delete_tithe($id){
			global $database;
			$results = $database->query_db("DELETE FROM welfare WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare WHERE ID=".$id."");
			return $results;
		}
		public static function find_by_id_bene($id){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare_benefits WHERE Transaction_ID=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare");
			return $results;
		}
		 function new_welfare_mem(){
			global $database;
			$result = $database->query_db("INSERT INTO welfare_members(Transaction_ID,Full_Name,Phone) VALUES('".$this->tid."', '".$this->fn."', '".$this->ph."')");
			return $result;
		}
  
	}
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/*class welfare{
		
	    var $tid;
		var $fn;
		var $amt;
		var $branch;
		var $district;
		var $region;
		var $doe;
		
		function __construct()
		{
			
		}

		public static function total_welfare(){
			global $database;
			$result = $database->query_db("SELECT * FROM welfare");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_welfare(){
			global $database;
			$result = $database->query_db("INSERT INTO welfare(Transaction_ID,Full_Name,Amount,DOE,Branch,District,Region) VALUES('".$this->tid."', '".$this->fn."', '".$this->amt."', '".$this->doe."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_welfare($id){
			global $database;
			$result = $database->query_db("UPDATE welfare SET Full_Name= '".$this->fn."', Amount= '".$this->amt."', DOE= '".$this->doe."' WHERE ID=".$id." ");
			return $result;
		}
		
		public static function delete_welfare($id){
			global $database;
			$results = $database->query_db("DELETE FROM welfare WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare WHERE ID=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM welfare");
			return $results;
		}
  
	}*/
////////////////////////////////////////////////////////////////

	class Events{
		
	    var $title;
		var $theme;
		var $sdate;
		var $edate;
		var $stime;
		var $etime;
		var $venue;
		var $host;
		var $guest;
		var $logo;
		var $branch;
		var $district;
		var $region;
		
		function __construct()
		{
			
		}

		public static function total_event(){
			global $database;
			$result = $database->query_db("SELECT * FROM event_tb");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_event(){
			global $database;
			$result = $database->query_db("INSERT INTO event_tb(Title,Theme,Venue,Start_Date,End_Date,Start_Time,End_Time,Host_Name,Guest,Upload,Branch,District,Region) VALUES('".$this->title."', '".$this->theme."', '".$this->venue."', '".$this->sdate."', '".$this->edate."', '".$this->stime."', '".$this->etime."', '".$this->host."', '".$this->guest."', '".$this->logo."', '".$this->branch."', '".$this->district."', '".$this->region."')");
			return $result;
		}
		function update_event($id){
			global $database;
			
			$result = $database->query_db("UPDATE event_tb SET Title='".$this->title."',Theme='".$this->theme."',Venue='".$this->venue."',Start_Date='".$this->sdate."',End_Date='".$this->edate."',Start_Time='".$this->stime."',End_Time='".$this->etime."',Host_Name='".$this->host."',Guest='".$this->guest."',Upload='".$this->logo."' WHERE ID=".$id." ");
			return $result;
		}
		
		public static function delete_event($id){
			global $database;
			$results = $database->query_db("DELETE FROM event_tb WHERE ID=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM event_tb WHERE `ID`='".$id."'");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM event_tb ORDER BY ID ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM event_tb");
			return $results;
		}
    
		
	}
////////////////////////////////////////////////////////////////
class login{
	    var $name;
		var $username;
		var $password;
		var $access_level;
		var $department;
		var $unit;
		var $region;
		var $district;
		var $branch;
		
		var $online;

		function __construct()
		{
			
		}

		public static function total_users(){
			global $database;
			$result = $database->query_db("SELECT * FROM users");
			$number = $database->num_rows($result);
			return $number;
		}
      	public static function total_users_online($id){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE Online=".$id."");
			$number = $database->num_rows($result);
			return $number;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM users ORDER BY user_id ASC");
			return $results;
		}

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_client(){
			global $database;
			$result = $database->query_db("INSERT INTO users(name, username, password, Access_Level, region, district, branch, department, unit, online) VALUES('".$this->name."', '".$this->username."', '".sha1($this->password)."', '".$this->access_level."', '".$this->region."', '".$this->district."', '".$this->branch."', '".$this->department."', '".$this->unit."', '".$this->online."')");
			return $result;
		}
		function update_client($id){
			global $database;
			$result = $database->query_db("UPDATE users SET name = '".$this->name."', username='".$this->username."', password='".$this->password."', Access_Level='".$this->access_level."', region='".$this->region."', district='".$this->district."', branch='".$this->branch."' WHERE id=".$id." ");
			return $result;
		}
		
		public static function delete_user($id){
			global $database;
			$results = $database->query_db("DELETE FROM users WHERE user_id=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM users WHERE user_id=".$id."");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM users");
			return $results;
		}
		public static function set_online($id){
			global $database;
			$online=1;
			$results = $database->query_db("UPDATE users SET online='".$online."' WHERE id=".$id."");
			return $results;
		}
		 
		public static function set_offline($id){
			global $database;
			$online=0;
			$results = $database->query_db("UPDATE users SET online='".$online."' WHERE id=".$id."");
			return $results;
		}

		public static function check_username_password(){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");
			$user = $database->fetch_array($result);
			if(sha1($user['username']) == $user['password']){
				echo "<script type='text/javascript'>
						alert('PLEASE CHANGE YOUR PASSWORD');
						location.assign('profile.php');
						</script>";
			}
		}
	}
	/////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
class Category{
	    var $name;
		
		function __construct()
		{
			
		}

		public static function total_cat(){
			global $database;
			$result = $database->query_db("SELECT * FROM categories");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_category(){
			global $database;
			$result = $database->query_db("INSERT INTO categories(category_name) VALUES('".$this->name."')");
			return $result;
		}
		function update_cat($id){
			global $database;
			$result = $database->query_db("UPDATE categories SET category_name = '".$this->name."' WHERE id=".$id." ");
			return $result;
		}
		
		public static function delete_cat($id){
			global $database;
			$results = $database->query_db("DELETE FROM categories WHERE id=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM categories WHERE id=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM categories ORDER BY id ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM categories");
			return $results;
		}

		
	}
	/////////////////////////////////////////////////////////////
	class Questions{
	    var $question;
		var $option1;
		var $option2;
		var $option3;
		var $option4;
		var $option5;
		var $option6;
		var $answer;
		var $catld;
		
		function __construct()
		{
			
		}

		public static function total_cat(){
			global $database;
			$result = $database->query_db("SELECT * FROM questions");
			$number = $database->num_rows($result);
			return $number;
		}
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }


		function new_questions(){
			global $database;
			$result = $database->query_db("INSERT INTO questions(question_name,answer1,answer2,answer3,answer4,answer5,answer6,answer,category_id) VALUES('".$this->question."','".$this->option1."','".$this->option2."','".$this->option3."','".$this->option4."','".$this->option5."','".$this->option6."','".$this->answer."','".$this->catid."')");
			return $result;
		}
		function update_question($id,$txt,$col){
			global $database;
			$result = $database->query_db("UPDATE questions SET {$col} = '".$txt."' WHERE id=".$id." ");
			return $result;
		}
		function update_Startquiz($id,$txt){
			global $database;
			$result = $database->query_db("UPDATE users SET quiz_state = '".$id."' WHERE Access_Level='user' ");
			return $result;
		}
		
		public static function delete_question($id){
			global $database;
			$results = $database->query_db("DELETE FROM questions WHERE id=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM questions WHERE id=".$id."");
			return $results;
		}
		public static function selectby($qtn){
			global $database;
			$results = $database->query_db("SELECT * FROM questions WHERE category_id=".trim($qtn)."");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM questions");
			return $results;
		}

		
	}
	/////////////////////////////////////////////////////////////
	class postMessage{
	    var $userid;
		var $commentid;
		var $title;
		var $commentfile;
		var $supporting;
		var $namefile;
		var $filety;
		var $admin;
		var $display;
		
		function __construct()
		{
			
		}

		public static function total_cat($id){
			global $database;
			$result = $database->query_db("SELECT * FROM post_message WHERE admin='".$id."'");
			$number = $database->num_rows($result);
			return $number;
		}
		
		
      	

		// public static function total_users(){
		// 	global $database;
		// 	$result = $database->query_db("SELECT * FROM users WHERE access_level='admin'");
		// 	$number = $database->num_rows($result);
		// 	return $number;
		// }

		function new_post(){
			global $database;
			$result = $database->query_db("INSERT INTO post_message(UserID,commentID,title,commentFile,supportingText,nameFile,fileType,admin,display) VALUES('".$this->userid."','".$this->commentid."','".$this->title."','".$this->commentfile."','".$this->supporting."','".$this->namefile."','".$this->filety."','".$this->admin."','".$this->display."')");
			return $result;
		}
		function update_cat($id){
			global $database;
			$result = $database->query_db("UPDATE post_message SET title = '".$this->tile."',commentFile = '".$this->commentfile."',supportingText = '".$this->supporting."',nameFile = '".$this->namefile."',fileType = '".$this->filety."',display='".$this->display."' WHERE id=".$id." ");
			return $result;
		}
		
		public static function delete_post($id){
			global $database;
			$results = $database->query_db("DELETE FROM post_message WHERE id=".$id."");
			return $results;
		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM post_message WHERE id=".$id."");
			return $results;
		}
		public static function selectby($id){
			global $database;
			$results = $database->query_db("SELECT * FROM post_message ORDER BY id ASC");
			return $results;
		}

		public static function find_all(){
			global $database;
			$results = $database->query_db("SELECT * FROM post_message WHERE admin='0'");
			return $results;
		}
		
		public static function find_all_admin(){
			global $database;
			$results = $database->query_db("SELECT * FROM post_message WHERE admin='1'");
			return $results;
		}

		
	}
	/////////////////////////////////////////////////////////////
	
?>