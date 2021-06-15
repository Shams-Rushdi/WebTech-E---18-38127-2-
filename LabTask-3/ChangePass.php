<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	$currentPass = "abc@1234";
	$newPass = $reType = $currentPass1 = "";
	$currentPassErr = $newPassErr = $reTypePassErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["current"])) {
			$currentPassErr = "* Current password field is empty";
		}else {
			$currentPass1 = $_POST["current"];
			if(strcmp($currentPass, $currentPass1)) {
				$currentPassErr = "Current password does not match";
			}
			
			}
		
		

		if (empty($_POST["new"])) {
			$newPassErr = "New password field is empty";
		}else {
			$newPass = $_POST["new"];
			if(!strcmp($newPass, $currentPass1)) {
				$newPassErr = "";
			}
		}

		if (empty($_POST["retype"])) {
			$reTypePassErr = "Retype New password field is empty";
		}else {
			$reType = $_POST["retype"];
			if(strcmp($newPass, $reType)) {
				$reTypePassErr = "Must match with new password";
			}
		}

	}
	?>

	<form method="post" action="">
		<fieldset>
			<legend><b>CHANGE PASSWORD</b></legend>
			
			 <table>
	            <tr>
	                <td>Current Password</td>
	                <td>:</td>
	                <td><input type="text" name="current" value="<?php echo $currentPass1;?>">
					<span class="error"><?php echo $currentPassErr;?></span></td>
	            </tr>

	            <tr>
                <td><span >New Password</span></td>
                <td>:</td>
                <td><input type="text" name="new" value="<?php echo $newPass;?>"><br>
				<span class="error"><?php echo $newPassErr;?></span>
            </tr>
			
            <tr>
                <td><span class="error">Retype New Password</span></td>
                <td>:</td>
                <td><input type="text" name="retype" value="<?php echo $reType;?>">
				<span class="error"><?php echo $reTypePassErr;?></span><br>
            </tr>

        </table>
		<hr/>
        <input type="submit" name="submit" value="Submit">

		</fieldset>
	</form>

</body>
</html>