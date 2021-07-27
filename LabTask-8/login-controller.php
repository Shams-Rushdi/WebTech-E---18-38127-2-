<?php

include('connection.php'); 

   



if(isset($_POST["btn_login"])){
	$username=$_POST["username"];
    $password=$_POST["password"];
	
	
	
			if(authenticateAdmin($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header('location:view/dashboard.php');
			}
			else{
				//$PassErr = "User Name or Password is invalid";
				header("location:view/login.php?error=User Name and Password is Incorrect");
				//echo "Invalid username or password";
				
			}
			
		}



function authenticateAdmin($username,$password)
{
		if (empty($username)) 
			{
			header("Location: view/login.php?error1=User Name  is required");
			exit();
			}
	else if(empty($password))
	{
			header("Location: view/login.php?error2=Password is required");
			exit();	
	}
	else{
			
			
			
			$query="select * from login where username='$username' and password='$password'";
			$result=get($query);
			if(count($result)>0)
			{
				return $result[0];
			}
			else{
				return false;
			}
		}
		
}
	
?>