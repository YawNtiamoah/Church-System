<?php
//require_once('constants.php');
	class Database{
		private $connection;
		function __construct()
		{
			$this->open_connection();
		}

		//open connection
		public function open_connection()
		{
			$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysqli_error($this->connection));
		}

		//close connection
		public function close_connection()
		{
			// íf(isset($this->connection)){
			// 	mysqli_close($this->connection);
			// 	unset($this->connection);
			// }
			mysqli_close($this->connection);
		}

		//query database
		public function query_db($sql)
		{
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
			return $result;
		}

		//get result set
		public function fetch_array($result)
		{
			return mysqli_fetch_array($result);
		}

		//get number of rows
		public function num_rows($result)
		{
			return mysqli_num_rows($result);
		}

		//prepare values for database entry
		public function prep($value)
		{
			return mysqli_real_escape_string($this->connection, $value);
		}
		 public function uploadFileSingle($nam,$upload_dir ='images/',$url = ''){
          $data = null;
         if(!isset($_FILES[$nam]['name'])){
            return $data;
          }
          $this->make_dir($upload_dir);
          $filename = 'upload-'.time().'-'.$_FILES[$nam]['name'];
          $upload_filename = $upload_dir.$filename;
          $url =  $url.$filename;
          move_uploaded_file($_FILES[$nam]['tmp_name'], $upload_filename);
          $data['imageUrl'] = $url;
          $data['mimeType'] = $_FILES[$nam]['type'];
        // $data['image'] = base64_encode(file_get_contents($upload_filename));
         //$data['image'] = base64_encode(file_get_contents($upload_filename));
        
		//   if($debug == true){
        //     echo "<pre>";
        //     print_r($data);
        //     die;
        // }
          return $data;
        }
       public function make_dir($dir){
          if(!is_dir($dir)){
            mkdir($dir);
          }
        }

	//end of class
	}


	$database = new Database;
	$db =& $database;

?>