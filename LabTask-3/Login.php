<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>


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

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<fieldset>
  <legend><b>LOGIN</b></legend>
  <table>
  <tr>
  <td><label for="fname">User Name</label></td>
  <td>:</td>
  <td><input type="text" name="name"value="<?php echo $name;?>"></td>
  <td><span class="error">* <?php echo $nameErr;?></span><br><br></td>
  </tr>
  
  <tr>
  <td><label for="fname">Password</label></td>
  <td>:</td>
  <td><input type="text" id="fname" name="pass"  value="<?php echo $pass;?>"></td>
  <td><span class="error">* <?php echo $PassErr;?></span><br><br></td>
  
  </tr>
  </table>
  
  <hr />
  <input type="checkbox" name="remember" value="">Remember Me<br><br>
  
  <input type="submit" value="Submit">
  <a href="facebook.com">Forgot Password?</a>
  </fieldset><br />
  
  
  </fieldset>
</form>  

</body>
</html>