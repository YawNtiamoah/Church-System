<?php
	class Client{

		var $vehicle_number;
		var $chasis_number;
		var $driver_name;
		var $driver_nationality;
		var $driver_residence_address;
		var $driver_license_number;
		var $phone;
		var $vehicle_type;
		var $no_of_passengers;
		var $residence_address_car_owner;
		var $station_id;
		var $district_id;
		var $region_name;

		function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM clients WHERE client_id = '".$id."' ");
			return $result;
		}

		function new_client(){
			global $database;
			$result = $database->query_db("INSERT INTO clients(vehicle_number, chasis_number, driver_name, driver_nationality, driver_residence_address, driver_license_number, phone, vehicle_type, no_of_passengers, residence_address_car_owner, station_id, district_id, region_name ) VALUES('".$this->vehicle_number."', '".$this->chasis_number."', '".$this->driver_name."', '".$this->driver_nationality."', '".$this->driver_residence_address."', '".$this->driver_license_number."', '".$this->phone."', '".$this->vehicle_type."', '".$this->no_of_passengers."', '".$this->residence_address_car_owner."', '".$this->station_id."', '".$this->district_id."', '".$this->region_name."')");
			return $result;
		}

		function update($id){
			global $database;
			$result = $database->query_db("UPDATE clients SET vehicle_number='".$this->vehicle_number."', chasis_number='".$this->chasis_number."', driver_name='".$this->driver_name."', driver_nationality='".$this->driver_nationality."', driver_residence_address='".$this->driver_residence_address."', driver_license_number='".$this->driver_license_number."', phone='".$this->phone."', vehicle_type='".$this->vehicle_type."', no_of_passengers='".$this->no_of_passengers."', residence_address_car_owner='".$this->residence_address_car_owner."' ");
			return $result;

		}

		public static function delete($id){
			global $database;
			$result = $database->query_db("DELETE FROM clients WHERE client_id = '".$id."' ");
			return $result;
		}


	}
?>