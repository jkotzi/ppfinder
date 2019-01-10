<?php
 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);
  
  //session_start();
  
  $email = "";
  $login= "";
  $surname= "";
  $name= "";
  $password="";
  $password_1="";
  $errors = array(); 
  
    // connect to the database
    require_once ("dbconnect.php");
    require_once ("utility.php");
    
    // REGISTER USER
    if (isset($_POST['login'])) {
      // receive all input values from the form
      $login = mysqli_real_escape_string($con, $_POST["login"]);
      $surname = mysqli_real_escape_string($con, $_POST["surname"]);
      $name = mysqli_real_escape_string($con, $_POST["name"]);
      $email = mysqli_real_escape_string($con, $_POST["email"]);
      $password = mysqli_real_escape_string($con, $_POST["psw"]);
      $password_1 = mysqli_real_escape_string($con, $_POST["psw-repeat"]);
      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($email)) { array_push($errors, "Το email απαιτείται"); }
      if (empty($password)) { array_push($errors, "Απαιτείται κωδικός πρόσβασης"); }
      if ($password != $password_1) {
        array_push($errors, "Οι δύο κωδικοί πρόσβασης δεν συμφωνούν");
      }
    
      // first check the database to make sure 
      // a user does not already exist with the same username and/or email
      $user_check_query = "SELECT * FROM user WHERE email='".$email."' LIMIT 1";
      $result = mysqli_query($con, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) { // if user exists
    
        if ($user['email'] === $email) {
          array_push($errors, "Το email υπάρχει");
        }

      }

      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
          //$password = md5($password);//encrypt the password before saving in the database
    	
          $query = "INSERT INTO user (active, login, surname, name, email, password ) VALUES ('1', '".$login."','".$surname."','".$name."','".$email."', '".$password."')";
         	$res = mysqli_query($con, $query);
		if (!$res){
    			$errmsg = mysqli_errno() . ' ' . mysqli_error();
    			echo "<br/>QUERY FAIL: ";
    			die($errmsg);
		}
		else{
          
          		$_SESSION['success'] = "Είστε συνδεδεμένοι";
          		header('location: loggedmenu.php');
		}
      }

    }
?>
