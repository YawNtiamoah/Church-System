<?php
	class Station{
		var $station_name;
		var $location;
		var $district_id;
		var $region;
		var $union_name;
		var $user_id;

		function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$results = $database->query_db("SELECT * FROM stations WHERE station_id =".$id."");
			return $results;
		}

		public function new_station(){
			global $database;
			$result = $database->query_db("INSERT INTO stations(station_name, location, district_id, region, union_name, user_id) VALUES('".$this->station_name."', '".$this->location."', '".$this->district_id."', '".$this->region."', '".$this->union_name."', '".$_SESSION['user_id']."')");
			return $result;
		}

		public function update($id){
			global $database;
			$result = $database->query_db("UPDATE stations SET station_name='".$this->station_name."', region='".$this->region."', district_id='".$this->district_id."', location='".$this->location."', union_name='".$this->union_name."' WHERE station_id='".$id."' ");
			return $result;
		}

		public static function delete($id){
			global $database;
			$results = $database->query_db("DELETE  FROM stations WHERE station_id =".$id."");
			return $results;
		}
	}

?>