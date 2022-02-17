<?php 
	session_start();
	require_once 'processrequest.php';
	require_once 'insertData.php';
	$insertData = new insertData;
	require_once 'fetchData.php';
	$fetchData1 = new fetchData;
	require_once 'updateData.php';
	$updateData = new update;

	$requestPage = stripslashes($_GET['_mode']);
	$proccessData = new processRequest;
	$time = date('h:i:s  a');
	$date = date('d-m-Y');

	switch ($requestPage) {
		// to validate and register students into the table
		case 'addStudent':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['fname']);
				$email = $proccessData->processInput($_POST['email']);
				$regnumber = $proccessData->processInput($_POST['regnumber']);
				$faculty = $proccessData->processInput($_POST['faculty']);
				$dept = $proccessData->processInput($_POST['dept']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($name) || (!preg_match("/^[a-z A-Z]*$/", $name))) {
					$response = array('status'=>0,'input'=>"name",'message'=>"*Name is required and must contain only alphabets");
					}
				elseif (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*Please enter a valid email address");
					}
				elseif (empty($regnumber)) {
					$response = array('status'=>0,'input'=>"regnumber",'message'=>"*Registration Number is required");
					}
				elseif (empty($faculty)) {
					$response = array('status'=>0,'input'=>"faculty",'message'=>"*faculty  is required");
					}
				elseif (empty($dept)) {
					$response = array('status'=>0,'input'=>"dept",'message'=>"Please Confirm Password");
				}
				elseif (strlen($password) < 5) {
					$response = array('status'=>0,'input'=>"password",'message'=>"*Password  is too short");
				}
				else {
					$password = password_hash($password, PASSWORD_DEFAULT);

					// check and validate  a user existence in table
					$fetchResponse1 = $fetchData1->studentEmailCheck($email);

					if (is_array($fetchResponse1)) {
						if(isset($fetchResponse1['status']) && $fetchResponse1['status'] === 1){
							$response = array('status'=>0,'input'=>"name",'message'=>"A User already exist with this email. ");
						} else { 
							$insertResponse = $insertData->registerStudent($name, $email, $regnumber, $faculty,$dept,$password);

							if ($insertResponse['status']) {
								$response = array('status'=>1,'message'=>"Student registration was successful...");
										
							} else {
								$response = array('status'=>0,'message'=>$insertResponse['message']);
							}
				    }
					}
				}
			}
		break;

		
		// add lecturer and validate and lecturer into the table
		case 'addLecturer':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['fullname']);
				$email = $proccessData->processInput($_POST['email']);
				$staffnumber = $proccessData->processInput($_POST['staffnumber']);
				$faculty = $proccessData->processInput($_POST['faculty']);
				$dept = $proccessData->processInput($_POST['dept']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($name) || (!preg_match("/^[a-z A-Z]*$/", $name))) {
					$response = array('status'=>0,'input'=>"name",'message'=>"*Name is required and must contain only alphabets");
					}
				elseif (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*Please enter a valid email address");
					}
				elseif (empty($staffnumber)) {
					$response = array('status'=>0,'input'=>"regnumber",'message'=>"*Registration Number is required");
					}
				elseif (empty($faculty)) {
					$response = array('status'=>0,'input'=>"faculty",'message'=>"*faculty  is required");
					}
				elseif (empty($dept)) {
					$response = array('status'=>0,'input'=>"dept",'message'=>"Dept  is required");
				}
				elseif (strlen($password) < 5) {
					$response = array('status'=>0,'input'=>"password",'message'=>"*Password  is too short");
				}
				else {
					$password = password_hash($password, PASSWORD_DEFAULT);

					// check and validate  a user existence in table
					$fetchResponse1 = $fetchData1->lecturerEmailCheck($email);

					if (is_array($fetchResponse1)) {
						if(isset($fetchResponse1['status']) && $fetchResponse1['status'] === 1){
							$response = array('status'=>0,'input'=>"name",'message'=>"A User already exist with this email. ");
						} else { 
							
							$insertResponse = $insertData->addLecturer($name, $email, $staffnumber, $faculty,$dept, $password);

							if ($insertResponse['status']) {
								$response = array('status'=>1,'message'=>"Lecturer registration was successful...");
										
							} else {
								$response = array('status'=>0,'message'=>$insertResponse['message']);
							}
						}
					}
				}
			}
		break;

		// add admin to table
		case 'addAdmin':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['fullname']);
				$username = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);

				if ($password = password_hash($password, PASSWORD_DEFAULT)) {
					// check and validate  a user existence in table
					$fetchResponse1 = $fetchData1->adminEmailCheck($username);
					if (is_array($fetchResponse1)) {
						if(isset($fetchResponse1['status']) && $fetchResponse1['status'] === 1){
							$response = array('status'=>0,'input'=>"name",'message'=>"A User already exist with this email. ");
						} else { 
							
							$insertResponse = $insertData->addAdmin($name, $username, $password);

							if ($insertResponse['status']) {
								$response = array('status'=>1,'message'=>"Admin registration was successful...");
										
							} else {
								$response = array('status'=>0,'message'=>$insertResponse['message']);
							}
						}
					}
				}
			}
		break;

		// add courses to table
		case 'addCourse':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$ctitle = $proccessData->processInput($_POST['ctitle']);
				$ccode = $proccessData->processInput($_POST['ccode']);
				$cunit = $proccessData->processInput($_POST['cunit']);
							
				$insertResponse = $insertData->addCourses($ctitle,$ccode,$cunit);
				if ($insertResponse['status']) {
					$response = array('status'=>1,'message'=>"Courses was successfully uploaded...");
							
				} else {
					$response = array('status'=>0,'message'=>$insertResponse['message']);
				}
			}
		break;

		// admin Login
		case "adminLogin":
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($email)) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*username is required ");
				}
				elseif (empty($password)) {
					$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
				}
				else {
					$fetchResponse = $fetchData1->adminLogin($email);
					
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status'])){
							if ($fetchResponse['status']===0) {
								$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
							}
							else if($fetchResponse['status']===1){
								$checkPass = $fetchResponse['password'];
								if (password_verify($password, $checkPass)) {
									$_SESSION['email'] = $email;
									$response =array('status'=>1, 'input'=>"details",'message'=>" Login Successful :: Details Valid");		
								}
								else{
									$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
								}
							}
						}
					}
					else{
						$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
					}
				}
			}
			else{
				$response =array('status'=>0, 'input'=>"details",'message'=>"Error loging in please refresh page and try again");
			}
		break;

		// students login
		case 'slgoin':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($email)) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*username is required ");
				}
				elseif (empty($password)) {
					$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
				}
				else {
					$fetchResponse = $fetchData1->studentLgoin($email);
					
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status'])){
							if ($fetchResponse['status']===0) {
								$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
							}
							else if($fetchResponse['status']===1){
								$checkPass = $fetchResponse['password'];
								$name = $fetchResponse['name'];
								if (password_verify($password, $checkPass)) {
									$_SESSION['email'] = $email;
									$_SESSION['name'] = $name;
									// $_SESSION['status']=true;
									$response =array('status'=>1, 'input'=>"details",'message'=>" Login Successful :: Details Valid");
								}
								else{
									$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
								}
							}
						}
					}
					else{
						$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
					}
				}
			}
			else{
				$response =array('status'=>0, 'input'=>"details",'message'=>"Error loging in please refresh page and try again");
			}
		break;

		// lecturer login
		case 'lecturerLogin':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($email)) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*username is required ");
				}
				elseif (empty($password)) {
					$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
				}
				else {
					$fetchResponse = $fetchData1->lecturerLogin($email);
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status'])){
							if ($fetchResponse['status']===0) {
								$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
							}
							else if($fetchResponse['status']===1){
								$checkPass = $fetchResponse['password'];
								$id = $fetchResponse['id'];
								if (password_verify($password, $checkPass)) {
									$_SESSION['email'] = $email;
									$_SESSION['id'] = $id;
									// $_SESSION['status']=true;
									$response =array('status'=>1, 'input'=>"details",'message'=>" Login Successful :: Details Valid");
								}
								else{
									$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect :");
								}
							}
						}
					}
					else{
						$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
					}
				}
			}
			else{
				$response =array('status'=>0, 'input'=>"details",'message'=>"Error loging in please refresh page and try again");
			}
		break;

		default:
			$response = array("status"=>0,"message"=>"Invalid Request, please check what you're doing");
		break;
	}
	 
	echo json_encode($response);
 ?>