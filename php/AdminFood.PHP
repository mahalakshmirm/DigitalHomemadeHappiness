<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
$sql="SELECT*FROM food ORDER By chefname Asc";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
<title>Uploaded Food</title>
<style>     
body{
    background: rgba(0, 0, 0, 0.7) url("picture/AdminFoodBack.jpg") center fixed;
    background-size: cover;
    background-blend-mode: darken;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color:white;
}
.navbar ul li{
    display: inline-block;
    padding: 1px;
    text-transform: uppercase;
    margin-left:1200px;
    
}
.navbar ul li a{
    text-decoration: none;
    color: #fff;
    padding: 4px;
    transition: 2s;
}
.navbar ul li a:hover{
    box-shadow: 0 3px 50px orangered inset,0 3px 50px orangered inset,
    0 3px 50px orangered inset,0 3px 50px orangered inset;
}
a
{
	text-decoration:none;
	padding:10px 15px;
	color:white;
	border-radius:5px;
}
input[type=submit]
{
	
	padding:15px 20px;
	background:#02005d;
	border:#dle8ff 1px solid;
	border-radius:50px;
	color:#FFF;
}
</style>
</head>
<div class="navbar">
      <ul>
          <li><a href="AdminDash.php">HOME</a></li>
          
      </ul>
  </div>
<body>
<h2 align="center"> FOOD  DETAILS </h2><br>
<form method="POST">
<div class="message">
<?php if(isset($message)){echo $message;}?>
</div>
<table border="7" cellpadding="10" cellspacing="1" width="800" height="500" align="center" bordercolor="white">
<tr style="color:white;font-weight:bold;font-size:20px; background-color:black">
<td> SERVER NAME</td>
<td> PHONE NUMBER</td>
<td> FOOD </td>
<td>ACTIONS</td>
</tr>
<?php
$i=0;
while($row=mysqli_fetch_array($result))
{
	if($i%2==0)
	$classname="evenrow";
	else
	$classname="oddrow";
	?>
    <tr class="<?php if(isset($classname))echo $classname;?>">
    <td> <?php echo $row["chefname"];?> </td>
    <td> <?php echo $row["phone"];?></td>
    <td><img src="<?php echo $row["image_path"]?>" width="110" height="100"></td>
    <td>
    <a style="background: rgba(29, 212, 236, 0.7)"
    href="AdminEditUser.php?chefname=<?php echo $row["chefname"];?>">EDIT</a>
    <a style="background-color:grey"
    href="AdminDeleteUser.php?chefname=<?php echo $row["chefname"];?>">DELETE</a>
    </td></tr>
    <?php
	$i++;
}
?>
</table>
<br><br><br>
<center>
</form>
</body>
</html>
	
