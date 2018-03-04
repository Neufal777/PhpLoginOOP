

<?php
	
class db_connection{

	// variables
	public $host 		= "localhost";
	public $user 		= "root";
	public $password 	= "";
	public $db_name 	= "edson_db";
	public $db_con;

	// connect to the database

	function __construct(){

		// connect

		$this->db_con = new mysqli($this->host,$this->user,$this->password,$this->db_name);

	}

}//db_connection{}

?>