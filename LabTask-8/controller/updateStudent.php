<?php  
require_once '../model/model.php';


if (isset($_POST['updateStudent2'])) {
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['cn'] = $_POST['cn'];
	$data['Address '] = $_POST['Address '];
	// $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);;
	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updateStudent2($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../showStudent.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>