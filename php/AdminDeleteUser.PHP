<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
$sql="DELETE FROM food WHERE chefname='".$_GET["chefname"]."'";
mysqli_query($conn,$sql);
header("Location:AdminFood.php");
?>
