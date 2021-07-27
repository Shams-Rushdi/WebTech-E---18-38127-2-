<?php
    // define variables and set to empty values
$nameErr = $PassErr = $dobErr =$bgroupErr= $genderErr = $degreeErr = "";
$name = $pass = $dob= $gender = $bgroup = $degree = $dd= $mm=$yyyy= "";
$uppercase=$lowercase=$number=$specialChars="";

//$nameErr = "Name is required";
//$emailErr = "Name is required";
//$dobErr = "DateOfBirth is required";
//$bgroupErr = "BloodGroup is required";
//$genderErr = "Gender is required";
//$degreeErr = "Degree is required";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
	
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
	
	
		
    if (!preg_match("/^[_0-9a-zA-Z-. ?!]{2,}$/",$name)) 
	{
      $nameErr = "Please give at least two words.User Name can contain alpha numeric characters, period, dash or
underscore only";
      $name="";
    }
	
  }
  
 
    if (empty($_POST["pass"])) {
    	$PassErr = "Password is required";
    }else {
    	$pass = $_POST["pass"];$_SESSION['pass']=$pass;
    	$count = strlen("$pass");
    	if ((!preg_match("([@#$%])",$pass)) || $count < 8 ) {
    		$PassErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
    	}

    }
	}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1)
		{  
		
		echo
		/* "<h1><center> Login successful </center></h1>";   */
		header('location:view/dashboard.php');
		
			}
         
        else{ 
				
				header('location:view/login.php');		
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        } 


		
?> 

