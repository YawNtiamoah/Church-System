<?php
	class District{

		var $district_name;
		var $region_name;

		function __construct(){

		}

		public static function get_districts(){
			global $database;
			$result = $database->query_db("SELECT * FROM districts");
			return $result;
		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM districts WHERE district_id=".$id." ");
			return $result;
		}

		public function new_district(){
			global $database;
			$result = $database->query_db("INSERT INTO districts(district_name, region_name) VALUES('".$this->district_name."', '".$this->region_name."')");
			return $result;
		}

		public function update($id){
			global $database;
			$result = $database->query_db("UPDATE districts SET district_name='".$this->district_name."', region_name='".$this->region_name."' WHERE district_id
			='".$id."' ");
			return $result;
		}

		public static function delete($id){
			global $database;
			$result = $database->query_db("DELETE FROM districts WHERE district_id=".$id." ");
			return $result;
		}
	}
?>