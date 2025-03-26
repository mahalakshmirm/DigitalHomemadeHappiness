<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
$sql="SELECT*FROM billing_details ORDER By full_name Asc";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
<title>Payment Done</title>
<style>
body
{
    background: rgba(0, 0, 0, 0.7) url('picture/AdminPaymentBack.jpg') center fixed;
    background-size: cover;
    background-blend-mode:darken;
    
	background-repeat:no-repeat;
	font-family:times-new-roman;
	color:white;
}
.navbar ul li{
    display: inline-block;
    padding: 18px;
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
<h2 align="center"> PAYMENT DETAILS </h2><br>
<form method="POST">
<div class="message">
<?php if(isset($message)){echo $message;}?>
</div>
<table border="7" cellpadding="10" cellspacing="1" width="800" height="500" align="center" bordercolor="fff">
<tr style="color:white;font-weight:bold;font-size:20px; background-color:black">
<td> NAME</td>
<td> EMAIL</td>
<td>ADDRESS</td>
<td>CITY</td>
<td>QUANTITY</td>
<td>RATE</td>
<td>SERVER</td>
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
    <td style="font-size:22px"> <?php echo $row["full_name"];?> </td>
    <td style="font-size:22px" > <?php echo $row["email"];?></td>
    <td style="font-size:22px"> <?php echo $row["address"];?></td>
    <td style="font-size:22px"> <?php echo $row["city"];?></td>
    <td style="font-size:22px"> <?php echo $row["quantity"];?></td>
    <td style="font-size:22px"> <?php echo $row["rate"];?></td>
    <td style="font-size:22px"> <?php echo $row["server"];?></td>   
    </tr>
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
	
