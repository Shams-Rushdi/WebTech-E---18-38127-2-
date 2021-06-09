<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>ASSESSMENT TASK</h1>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $dobErr =$bgroupErr= $genderErr = $degreeErr = "";
$name = $email = $dob= $gender = $bgroup = $degree = $dd= $mm=$yyyy= "";

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
	
	if( preg_match("/^[0-9]/", $name))
			{$nameErr="Must start with a letter";}
		
    else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$name)) 
	{
      $nameErr = "Please give at least two words";
      $name="";
    }
	
	
  }
  
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email="";
    }
  }
    
	if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

	
if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"])){
		$dobErr="Full Date of birth input is requied";
		$dd = test_input($_POST["dd"]);
		$mm = test_input($_POST["mm"]);
		$yyyy = test_input($_POST["yyyy"]);

	}
	else
	{
		$dd = test_input($_POST["dd"]);
		$mm = test_input($_POST["mm"]);
		$yyyy = test_input($_POST["yyyy"]);

		if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 
            'max_range' => 31
        )))|!filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 
            'max_range' => 12
        )))|!filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1953, 
            'max_range' => 1998
        ))))
			{$dobErr="Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1953-1998)";}
	}

	if(!isset($_POST["degree"]))
	{
		$degreeErr="Must be selected";		
	}
	else if (sizeof($_POST["degree"])<2)
	{
		$degreeErr="At least two must be selected";
	}

  
  	if(!isset($_POST["bgroup"]))
	{
		$bgroupErr="Must be selected";
	}
	else
	{
		if($_POST["bgroup"]=="Select")
		{
			$bgroupErr="Must be selected";
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


<p><span class="error">* Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<fieldset>
  <legend>Name:</legend><br />
  <label for="fname">Enter your name:</label><br><br>
  <input type="text" name="name"value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span><br><br>
  </fieldset><br />
  
  	<fieldset>
  <legend>Email:</legend><br />
  <label for="fname">Enter your Email:</label><br><br>
  <input type="text" id="fname" name="email"  value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span><br><br>
  </fieldset><br />
  
    <fieldset>
  <legend>Gender:</legend><br />
  <label for="gender">Gender:</label><br><br>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>
  <span class="error">* <?php echo $genderErr;?></span><br><br>
  </fieldset><br />
  
  
  	<fieldset>
  <legend>DATE OF BIRTH :</legend><br />

  
  <table>
<tr style="text-align: center;">
	<label for="dd" >Date  </label></th>
	<th></th>
	<th></th>
	<th></th>
	<label for="mm" >Month   </label></th>
	<th></th>
	<th></th>
	<label for="yyyy" >Year</label></th>
	<th></th>
</tr>
<tr>
<td><input type="text" name="dd" value="<?php echo $dd;?>"></td>
<td>/</td>
<td><input type="text" name="mm"value="<?php echo $mm;?>"></td>
<td>/</td>
<td><input type="text" name="yyyy" value="<?php echo $yyyy;?>"></td>
<td style><span class="error">* <?php echo $dobErr;?></span></td>
</tr>
</table>
  
  
  </fieldset><br />
  
  
  	<fieldset>
   <legend>DEGREE:</legend><br />
   <label for="degree">Degree:</label><br><br>
   <input type="checkbox" id="ssc" name="degree[]" value="ssc" value="<?php echo $degree;?>">
   <label for="vehicle1"> SSC</label>
   <input type="checkbox" id="hsc" name="degree[]" value="hsc">
   <label for="vehicle2"> HSC</label>
   <input type="checkbox" id="bsc" name="degree[]" value="bsc">
   <label for="vehicle3"> BSc</label>
   <input type="checkbox" id="msc" name="degree[]" value="msc">
   <label for="vehicle3"> Msc</label>
   <span class="error">* <?php echo $degreeErr;?></span><br><br>
  </fieldset><br />
  
  	<fieldset>
  <legend>BLOOD GROUP:</legend><br />
  <label for="bgroup">Enter your blood group:</label><br><br>
  <select name="bgroup" id="cars">
  <option value="Select">Select Blood Group</option>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option><br />
  </select>
  <span class="error">* <?php echo $bgroupErr;?></span><br><br>
  <br />
  <br />
  
  <input type="submit" value="Submit">
  </fieldset>
</form>  


<?php

echo "<br>";
echo "Output: ";
echo "<br>";
echo "<br>";
echo "Name: ",$name;
echo "<br>";
echo "Email: ",$email;
echo "<br>";
echo "Date Of Birth: ","Date: ",$dd ," Month: ",$mm ," Year: ", $yyyy;
echo "<br>";
echo "Degree: ",$degree;
echo "<br>";
echo "Gender: ",$gender;
echo "<br>";
echo "Blood Group: ",$bgroup;
?>
  
</body>
</html>