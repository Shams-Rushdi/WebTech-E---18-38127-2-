<?php include('./header.php'); ?>




<?php 


    $data = file_get_contents('../model/login.json');  

    $data = json_decode($data, true);  

    $username=null;
    $password=null;

    foreach($data as $row)  
    {  
        if (isset($_POST['uname']))
            {
                if( $_POST['uname'] == $row["username"] &&  $_POST['pass'] == $row["password"]){
                    $username=$row["username"];
                    $password=$row["password"];
                }
        }
    }  




    if (isset($_POST['uname'])) {
        if ($_POST['uname']==$username && $_POST['pass']==$password  ){
            $_SESSION['uname'] = $username;
            $_SESSION['pass'] = $password;
            
            if($_POST['remember'] ){
                $_SESSION['remember'] = "checked";
            }
            else{
                $_SESSION['remember'] = "";
            }
			header('location: ../view/dashboard.php');
            //header("location:welcome.php");
        }
        else{
            $msg="*username or password invalid";
        }

    }
 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <style>fieldset{margin: 0 auto;}</style>
</head>
<body>

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





    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset style="width: 300px; ">
            <legend><b>LOGIN</b></legend>
            <?php if(isset($msgs)) echo $msgs;?><br>
            Username: <input type="text" name="uname" value = "<?php if(isset($_COOKIE["uname"])) {echo $_COOKIE["uname"] ; }?>"></span><br><br>
            Password: <input type="password" name="pass" value ="<?php if(isset($_COOKIE["pass"])) {echo $_COOKIE["pass"] ; }?>"><br>
            <?php if(isset($msg)) echo $msg;?><br>
            <hr style="border: 0.1px solid;">
            <input type="checkbox" name="remember"> Remember Me <br><br>
            <input type="submit" value="Login" name="submit">
            <a href="./forgotpass.php">Forgot Password</a>
            <br><br>
        </fieldset>
    </form>
</body>
</html>
    <?php include('./footer.php'); ?>
