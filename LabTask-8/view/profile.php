<?php  
require_once '../controller/studentInfo.php';

$students = fetchAllStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
</head>
<body>
    <?php include('./header.php'); ?>
    <fieldset>
    <br>
        <nav>
            Logged in as ||
            <a href="../controller/logout.php">Log Out</a>
        </nav>
        <br>
    </fieldset>
    <table border="1px solid black" width='100%'>
        <tr>
            <td border="1px solid black">
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
                <table align="center" border="1px solid black">
                    <tr>
                        <td rowspan="6" align="right">
                            <img src= '<?php echo "../images/".$_SESSION['username'].".jpeg"; ?>' height="250">
                        </td>
                    </tr>
					<?php foreach ($students as $i => $student): ?>
                    <tr>
                        <td align="center" width='47%'>
                            <b>Name:</b>
                        </td>
                        <td align="center" width='47%'>
						<?php echo $student['username'] ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width='47%'>
						
                            <b>Email:</b>
                        </td>
                        <td align="center" width='47%'>
						<?php echo $student['Email'] ?>
                           
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width='47%'>
                            <b>Contact Number:</b>
                        </td>
                        <td align="center" width='47%'>
						<?php echo $student['Contact_Number'] ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width='47%'>
                            <b>Adress:</b>
                        </td>
                        <td align="center" width='47%'>
						<?php echo $student['Address'] ?>
                            
                        </td>
                    </tr>
					<?php endforeach; ?>
                </table>
                <br>
            </td>
        </tr>
    </table>
    <?php include('./footer.php'); ?>
</body>
</html>