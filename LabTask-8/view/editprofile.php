<?php  
require_once '../controller/studentInfo.php';

$students = fetchAllStudents();

//require_once '../controller/studentInfo.php';
//$student = fetchStudent($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body background="../images/assets/background.jpg">
    <?php include('./header.php'); ?>
    <fieldset>
    <br>
        <nav>
Logged in as  ||
            <a href="../controller/logout.php">Log Out</a>
        </nav>
    <br>
    </fieldset>
    <table border="1px solid black" width='100%'>
        <tr>
            <td>
                <label>Menu</label>
                <br>
                <hr>
                <ul>
                    <li><a href='./dashboard.php'>Dashboard</a></li>
                    <li><a href='./profile.php'>View Profile</a></li>
                    <li><a href='./editprofile.php'>Edit Profile</a></li>
                    <li><a href='./changepropic.php'>Change Profile Picture</a></li>
                    <li><a href='./changepass.php'>Change Password</a></li>
                    <li><a href='addStudent.php'>ADD Employee</a></li>
                    <li><a href='delStudent.php'>Delete Employee</a></li>
                    <li><a href='updStudent.php'>Update Employee Info</a></li>
                    <li><a href=''>Add Product</a></li>
                    <li><a href=''>Delete Product</a></li>
                    <li><a href=''>Update Product</a></li>
                    
                    <li><a href='../controller/logout.php'>Logout</a></li>
                </ul>
            </td>
            <td>
                 <form action="controller/updateStudent.php" method="POST" enctype="multipart/form-data">
                    <table align="center" border="1px solid black" width='60%'>
					
					<?php foreach ($students as $i => $student): ?>
                    
                        <tr>
                            <td width='40%' align="right">
                                Name:
                            </td>
							
                            <td>
                                <input type='text' name = 'name' value="<?php echo $student['username'] ?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Email:
                            </td>
                            <td>
                                <input type='email' name = 'email' value="<?php echo $student['Email'] ?>" required/>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                Contact_Number:
                            </td>
                            <td>
                                <input type='text' name = 'cn' value="<?php echo $student['Contact_Number'] ?>" required/>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                Address:
                            </td>
                            <td>
                                <input type='text' name = 'address' value="<?php echo $student['Address'] ?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
									<input type="submit" name = "updateStudent" value="Update">
                                </center>
                            </td>
                        </tr>
						
                    </table>
                </form>
                <br>
            </td>
        </tr>
    </table>
    <?php include('./footer.php'); ?>
</body>
</html>