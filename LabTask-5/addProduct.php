<?php 

include'db_connection.php';

error_reporting(0);

?>



<html>
<body>

<form method="POST" action="">
		<fieldset>
			<legend><b>Add Product</b></legend>
			<table> 
                   
              <tr>
                    
                </tr>


                <tr>
                    <td>Name</td>
                    <td> <input type="text" name="name" value=""></td>
                </tr>
			<tr>
                    <td>Buying Price</td>
    		
            
            
                  <td> <input type="text" name="buyprice" value=""></td>
                </tr>
    		
    		
           <tr>
                    <td>Selling Price</td>
                   <td><input type="text" name="sellprice" value=""></td>
                </tr>
            
         <tr>
             
             
             <td><input type="checkbox" name="display" value="">Display</td>
             
         </tr>

    	</table>
        <input type="submit" name="save" value="Save">
		</fieldset>
	</form>
</body>
</html>
<?php
if(isset($_POST["save"]))
{
$proid=$_POST['id'];
$name=$_POST['name'];
$bp=$_POST['buyingPrice'];
$sp=$_POST['sellingPrice'];
$profit=$sp-$bp; 
//$profit=$_POST[''];

//$pro="SELECT name,sellingPrice-buyingPrice as profit FROM products";
//$prof=mysqli_query($conn,$pro);
//$profit=$_POST['prof'];
if ($proid!="" && $name!="" && $bp!="" && $sp!="" && $profit!="") {
	


$query="INSERT INTO products VALUES('$proid','$name','$bp','$sp','$profit')";

$data=mysqli_query($conn,$query);
if($data)
{
	echo"Data inserted into database";
}
}
else{
	echo"Failed to insert";
}
}
?>
</body>