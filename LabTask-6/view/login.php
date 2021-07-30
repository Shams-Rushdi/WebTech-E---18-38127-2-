
<?php 
//require_once "controllers/login-controller.php";
//require_once "../login-controller.php";
include "../login-controller.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='../images/icon.png'>
    <title>Log In</title>
</head>
<body>





    <?php include('./header.php'); ?>




    <fieldset>
    <table align="right">
    <tr>
        <td>
            <nav>
                <a href="./index.php">Home</a> ||
                <a href="./login.php">Log in</a> ||
                <a href="./registration.php">Registration</a>
            </nav>
        </td>
    </tr>        
    </table>
    </fieldset>

    <div width='100px'>
	
	<form method="post" action="../login-controller.php ">
        
		
            <fieldset>
                <legend>
                    <b>LOG IN</b>
                </legend>
				

		
		

				
                <table align="center">
				<tr>
				
				
				</tr>
                    <tr>
                        <td align="right">User Name:</td>
                        <td><input type='text' name='username' onfocusout="checkUsername(this)" placeholder="Username"/></td>
						<td>     	<?php if (isset($_GET['error1'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?></td>
					</tr>
					
                    <tr>
                        <td align="right">Password:</td>
                        <td><input type='text' name='password' placeholder="Password" /></td>
						<td>		<?php if (isset($_GET['error2'])) { ?>
     		<p class="error"><?php echo $_GET['error2']; ?></p>
     		
     	<?php } ?></td>
						
						
					</tr>
					
					<tr>
					<td></td>
					<td><span class="error"> </span>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="checkbox" name="remember"> Remember Me </td><br><br>
					</tr>
					
                    <tr>
					<td colspan="2"><hr></td>
                    </tr>
					
                    <tr>
						<td align="left"><input type='submit' name="btn_login" value="Submit"></td>
                        <td align="left"><a href="./forgotpass.php">Forgot Password</a></td>
                    </tr>
					
                </table>
            </fieldset>
        </form>
        
    </div>
    <?php include('./footer.php'); ?>
</body>
</html>