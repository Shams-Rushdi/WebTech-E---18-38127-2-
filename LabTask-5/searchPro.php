
<head>
   
</head>



<body>
<fieldset>
			<legend><b>Search</b></legend>
<table >
<tr>
    <input type="text" name="id" class="form-control" placeholder="Search Name..">
    <button type="submit" name="save" class="btn btn-primary">Search by Name</button>
	<br />
	<br />


<th>Name</th>
<th>Profit</th>
<th colspan="2">Opereation</th>
</tr>

  <?php
  include("db_connection.php");
 error_reporting(0);
$query="SELECT name,profit FROM products";
$profit="SELECT name,sellingPrice-buyingPrice as profit FROM products";
 $data=mysqli_query($conn,$query);
 $dat=mysqli_query($conn,$profit);
 $total=mysqli_num_rows($data);
 //echo"$total";
//echo $result['name']." ".$result['profit'];
 
if($total!=0)
{
  //$result=mysqli_fetch_assoc($data);
//$res=mysqli_fetch_assoc($dat);
 while(($result=mysqli_fetch_assoc($data))&&($res=mysqli_fetch_assoc($dat)))
    {
      echo "
  <tr>

  <td>".$result['name']."</td>
	<td>".$res['profit']."</td> 
  <td><a href='edit.php?pid=$result[id]&name=$result[name]'>Edit </td> 
  <td><a href='delete.php?pid=$result[id]' onclick='return checkdelete()'>Delete</td> </tr> ";
  }
}
else
{
  echo "No records found";
}

?>


</table>
<script>
  function checkdelete()
  {

  return Confirm('Are you sure you want to Delete?');
}
</script>
</fieldset>
</body>