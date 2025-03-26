<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/admindash.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body >
<div class="container">
<nav>
<ul>
<li><a href="#" class="logo">
<img src="picture/weblogo.jpg" alt="">
<span class="nav-item">DashBoard</span>
</a></li>
<li><a href="#">
<i class="fas fa-home"></i>
<span class="nav-item">Home</span>
</a></li>
<li><a href="AdminServer.php">
<i class="fas fa-user"></i>
<span class="nav-item">Chef</span>
</a></li>
<li><a href="AdminCustomer.php">
<i class="fas fa-user"></i>
<span class="nav-item">Customers</span>
</a></li>
<li><a href="../html/dashboard.html">
<i class="fas fa-arrow-left"></i>
<span class="nav-item">Go Back</span>
</a></li>
</ul>
</nav>
<section class="main">
<div class="main-top">
<h1 style="color:white">Total Counts</h1>
<i class="fas fa-user-cog"></i>
</div>
<div class="main-skills">
<div class="card">
<img width="32" height="32" src="https://img.icons8.com/windows/32/cook-male.png" alt="cook-male"/>
<h3>Chef</h3>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307;
$conn = new mysqli($servername, $username, $password, $database, $port);
$query = "SELECT id FROM server ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);
echo '<h4>Total : ' . $row . '</h4>';
?>
</div>
<div class="card">
<img width="48" height="48" src="https://img.icons8.com/parakeet-line/48/group.png" alt="group"/>
<h3>Customers</h3>
<?php
$query = "SELECT id FROM customer ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);
echo '<h4>Total : ' . $row . '</h4>';
?>
</div>
<div class="card">
<img width="50" height="50" src="https://img.icons8.com/ios/50/wok.png" alt="wok"/>
<h3>Uploaded food</h3>
<?php
$query = "SELECT id FROM food ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);
echo '<h4>Total : ' . $row . '</h4>';
?>
</div>
<div class="card">
<img width="64" height="64" src="https://img.icons8.com/external-nawicon-detailed-outline-nawicon/64/external-order-food-food-delivery-nawicon-detailed-outline-nawicon.png" alt="external-order-food"/>
<h3>Payment done</h3>
<?php
$query = "SELECT id FROM billing_details ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);
echo '<h4>Total : ' . $row . '</h4>';
?>
</div>
</div>
<section class="main-course">
<h1>View food Details</h1>
<div class="course-box">
<div class="course">
<div class="box">
<h3>Uploaded food</h3>
<p>Food uploaded by chef</p>
<center><img width="110" height="110" src="https://img.icons8.com/fluency/48/soup-plate.png" alt="soup-plate"/></center>
<form><button formaction="AdminFood.php">OPEN</button></form>
</div>
<div class="box">
<h3>Payment done</h3>
<p>Paid by customers</p>
<center>
<img width="110" height="110" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-order-food-food-delivery-flaticons-lineal-color-flat-icons-14.png" alt="external-order-food"/>
</center>
<form><button formaction="AdminPayment.php">OPEN</button></form>
</div>
<div class="box">
    <h3>Queries received</h3>
    <p>Send by chefs & customers</p>
    <center>
        <i class="fas fa-question-circle" style="font-size:110px;"></i>
    </center>
    <br><br><br><br><br>
    <form>
        <button formaction="AdminQueries.php">OPEN</button>
    </form>
</div>
</div>
</div>
</section>
</section>
</div>
</body>
</html>
