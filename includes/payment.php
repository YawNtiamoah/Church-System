<?php
	class Payment{

		var $vehicle_number;
		var $station_id;
		var $amount;
		var $user_id;
		var $region_name;
		var $district_id;

		function __construct(){

		}

		function new_payment(){
			global $database;
			$result = $database->query_db("INSERT INTO payments(vehicle_number, station_id, amount, user_id, date_payed, region_name, district_id) VALUES('".$this->vehicle_number."', '".$this->station_id."', '".$this->amount."', '".$this->user_id."', CURDATE(), '".$this->region_name."', '".$this->district_id."')");
			return $result;
		}
	}

?>