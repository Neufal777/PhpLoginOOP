<?php
	
	// add connection to the database
	require 'class_connection.php';

	class login{

		// Variables
		public $log_username;
		public $log_password;
		public $db_con;

		function __construct($login_username,$login_password){


			// create a connection object
			$login_class_con_obj = new db_connection();

			// Login the user

			$this->log_username = $login_username; //real_escape_string()
			$this->log_password = $login_password; //md5()

			// check if the username exists
			$login_check_username = mysqli_query($login_class_con_obj->db_con,"SELECT * FROM users WHERE username='$this->log_username' ") or die(mysqli_error($this->db_con));

			// check username 
			if(mysqli_num_rows($login_check_username)>0){

				// get the data and check the password 
				while($row = $login_check_username->fetch_assoc()){

					// get the data from database 
					$final_username = $row['username'];
					$final_password = $row['password'];

					// final check of the user information 
					if($this->log_username == $final_username && $this->log_password == $final_password){

						// let the user login 

						echo "Logged in correctly ".$final_username;

						// Start a session and store the information

						session_start();

						$_SESSION['id'] 		= $row['id'];
						$_SESSION['username']	= $row['username'];
						$_SESSION['name'] 		= $row['name'];
						$_SESSION['school'] 	= $row['school'];
						$_SESSION['course'] 	= $row['course'];
						$_SESSION['range']		= $row['range'];
 
						header('location:../home.php');

					}else{

						// if the username or the password are not correct

						echo "The username or the password are not correct";
					}

				}//while 

			}else{

				// if the username doesn't exist
				echo "Sorry, This username doesn't exists in our database";
				
			}//else mysqli_num_rows()

		}//__construct()

	}//login{}
?>