<?php 
session_start();

//Create Constants to save Database Credentials
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'manage_employee');

define('SITEURL', 'http://localhost/employees-manager/projects/');

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'manage_employee');

// variable declaration
$username = "";
$address    = "";
$email    = "";
$errors   = array(); 
$id = 0;
$update = false;

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$email    =  e($_POST['email']);
	$address    =  e($_POST['address']);
	$gender    =  e($_POST['gender']);
	$user_type    =  e($_POST['user_type']);
	

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}

	if (empty($password_2)) { 
		array_push($errors, "Password confirmation is required"); 
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($errors, "Email is invalid");
	  }

	if (empty($address)) { 
		array_push($errors, "Address is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$cpassword = md5($password_2);

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, user_type, password, cpassword, email, address, gender) 
					  VALUES('$username', '$user_type', '$password', '$cpassword', '$email', '$address', '$gender')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, user_type, password, cpassword, email, address, gender) 
					  VALUES('$username', 'user', '$password', '$cpassword', '$email', '$address', '$gender')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['save'])) {
	$name = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	mysqli_query($db, "INSERT INTO users (username) , (email) , (address) VALUES ('$username' , '$email' , '$address')"); 
	$_SESSION['message'] = "Address saved"; 
	header('location: edit_user.php');
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$user_type = $_POST['user_type'];
	$gender = $_POST['gender'];

	mysqli_query($db, "UPDATE users SET username='$username' , email='$email' , address='$address' , user_type='$user_type' , gender='$gender' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: edit_user.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM users WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: edit_user.php');
}

?>