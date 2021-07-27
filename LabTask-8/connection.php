<?php      
    $db_host = "localhost";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "eweb";  
      
    //$con = mysqli_connect($host, $user, $password, $db_name);  
    //if(mysqli_connect_errno()) {  
        //die("Failed to connect with MySQL: ". mysqli_connect_error());  
    //}
	
	
	function execute($query) //execute insert,update,delete
{
	global $db_host,$db_user,$db_password,$db_name;
	$connection=mysqli_connect($db_host, $db_user, $db_password, $db_name); 
    mysqli_query($connection,$query);

}

function get($query) //execute select query
{
	global $db_host,$db_user,$db_password,$db_name;
	$connection=mysqli_connect($db_host, $db_user, $db_password, $db_name); 
    $result= mysqli_query($connection,$query);
	$data=[];

	$count = mysqli_num_rows($result); 
	if($count == 1)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$data[]=$row;
		}
	}
	return $data;
}
	
?> 