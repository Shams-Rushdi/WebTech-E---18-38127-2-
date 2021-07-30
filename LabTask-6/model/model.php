<?php 

require_once 'db_connect.php';


function showAllStudents(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `login` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showStudent($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE Username LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addStudent($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (Name, Surname, Username,Email, Password,PhoneNumber,DateOfBirth ,Gender ,Address ,VoterIdCard,BloodGroup,Salary  , image)
VALUES (:name, :surname, :username,:email, :password,:phone,:dob, :gender, :address, :vid,:bgroup, :salary, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':surname' => $data['surname'],
        	':username' => $data['username'],
			':email' => $data['email'],
        	':password' => $data['password'],
			':phone' => $data['phone'],
        	':dob' => $data['dob'],
        	':gender' => $data['gender'],
			':address' => $data['address'],
        	':vid' => $data['vid'],
        	':bgroup' => $data['bgroup'],
        	':salary' => $data['salary'],
			':image' => $data['image']
        	
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateStudent($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? , email = ?, password = ?, phone = ?, dob = ?, gender = ?, address = ?, vid = ?, bgroup = ?, salary = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['surname'], $data['username'],$data['email'],$data['password'],$data['phone'],$data['dob'],$data['gender'],$data['address'],$data['vid'],$data['bgroup'],$data['salary'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateStudent2($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set username = ?,Email = ?, Contact_Number = ?, Address = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['email'], $data['cn'], $data['address'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteStudent($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}