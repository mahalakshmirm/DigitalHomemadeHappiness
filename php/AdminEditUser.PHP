<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
if(count($_POST)>0)
{
	$sql="UPDATE food set chefname='".$_POST["chefname"]."',food_name='".$_POST["food_name"]."',description='".$_POST["description"]."',quantity='".$_POST["quantity"]."',rate='".$_POST["rate"]."',address='".$_POST["address"]."',phone='".$_POST["phone"]."' WHERE chefname='".$_POST["chefname"]."'";
	mysqli_query($conn,$sql);
	$message="Detials Successflly Updated.";
}
$select_query="SELECT*FROM food WHERE chefname='".$_GET["chefname"]."'";
$result=mysqli_query($conn,$select_query);
$row=mysqli_fetch_array($result);
?>
<html>
<head>
<title> Edit Food Detials</title>
<style>
body{
    background: rgba(0, 0, 0, 0.7) url("picture/AdminEditBack.jpg") center fixed;
    background-size: cover;
    background-blend-mode: darken;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color:white;
}
input[type=submit]
{
	padding:10px 25px;
	background-color:black;
	cursor:pointer;
	color:white;
	border:white 1px solid;
	border-radius:50px;
}
</style>
</head>
<body>
<form method="POST">
<br><br><br>
<table border="3" cellpadding="10" width="700" height="500" align="center" bordercolor="white">
<td colspan="5" align="center" style="font-size:30px;color:white;font-weight:bold">Edit Employee Detials</td>
<tr>
<td>Server Name</td>
<td><input type="text" name="chefname" value="<?php echo $row['chefname'];?>"></td>
</tr>
<tr>
<td>Mobile number</td>
<td><input type="number" name="phone" value="<?php echo $row["phone"];?>"></td>
</tr>
<tr>
<td>Food name</td>
<td><input type="text" name="food_name" value="<?php echo $row['food_name'];?>"></td>
</tr>
<tr>
<td>Quantity</td>
<td><input type="number" name="quantity" value="<?php echo $row['quantity'];?>"></td>
</tr>
<tr>
<td>Description</td>
<td><input type="text" name="description" value="<?php echo $row['description'];?>"></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="address" value="<?php echo $row['address'];?>"></td>
</tr>
<tr>
<td>Rate</td>
<td><input type="number" name="rate" value="<?php echo $row['rate'];?>"></td>
</tr>
<tr align="center"><td colspan="2">
<input type="submit" value="UPDATE"></td>
</tr>
</table><br>
<center>
<div class="message"><?php if(isset($message)){echo $message;}?></div><br>
<input type="submit" value="FOOD DETAILS" formaction="AdminFood.php">
</form>
</body>
</html>