<?php 

require_once 'controller/studentInfo.php';
$student = fetchStudent($_GET['id']);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
</head>
<body>

<body>
    <?php include('header.php'); ?>
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
                <h1><label>Admin</label></h1>
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

				 <form action="../controller/updateStudent.php" method="POST" enctype="multipart/form-data">
				  <label for="name">Search Name:</label><br>
				  <input type="text" id="search" name="search"><br>
				  <input type="submit" name = "delStudent" value="search"><br><br>
				  
				  <label for="name">First Name:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="name" name="name"><br>
				  <label for="surname">Lust Name:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="surname" name="surname"><br>
				  <label for="username">User Name:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="username" name="username"><br>

				  <label for="email">Email:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="email" name="email"><br>
				  <label for="password">Password:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="password" id="password" name="password"><br>
				  
				  <label for="phone">Phone Number:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="phone" name="phone"><br>
				  
				  <label for="dob">Date of Birth:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="text" id="dob" name="dob"><br>
				  
				  <label for="gender">Gender:</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="radio" id="male" name="gender" value="Male">
				  <label for="male">Male</label><br>
				  <input value="<?php echo $student['Name'] ?>" type="radio" id="female" name="gender" value="Female">
				  <label for="female">Female</label><br>

				  
				<label for="address">Address:</label><br>
				<input value="<?php echo $student['Name'] ?>" type="text" id="address" name="address"><br><br />
				  
				<label for="vid">Voter Id Card Number:</label><br>
				<input value="<?php echo $student['Name'] ?>" type="text" id="vid" name="vid"><br><br />
				  
				   
				  <label for="bgroup">Enter your blood group:</label><br>
				  <select name="bgroup" id="bgroup">
				  <option value="Select">Select Blood Group</option>
				  <option value="A+">A+</option>
				  <option value="A-">A-</option>
				  <option value="B+">B+</option>
				  <option value="B-">B-</option>
				  <option value="AB+">AB+</option>
				  <option value="AB-">AB-</option>
				  <option value="O+">O+</option>
				  <option value="O-">O-</option><br />
				  </select> <br /><br />
				  
				  <label for="salary">Salary:</label><br>
				<input value="<?php echo $student['Name'] ?>" type="text" id="salary" name="salary"><br><br />
				  
				  <label for="Picture">Chose a picture:</label><br>
				  <input type="file" name="image"><br><br>
				  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
				  <input type="submit" name = "updateStudent" value="Update">
				  <input type="reset"> 
				  
				</form> 


        </tr>
    </table>

    </div>
    <?php include('footer.php'); ?>

</body>
</html>

