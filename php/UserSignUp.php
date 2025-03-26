<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="../css/UserCSS.css">
<title>User signup</title>
</head>
<div class="navbar">
      <ul>
          <li><a href="../html/dashboard.html">HOME</a></li>       
      </ul>
</div>
<body>
    <div class="container" id="container">
    <?php
          include 'UserSignIn.php';
    ?>
    <div class="form-container sign-up">
        <form method="post" enctype="multipart/form-data" id="upload_form">
        <h1>Create Account</h1>
            <div class="input-box">
                <span class="ico">
                    <ion-icon name="person"></ion-icon>
                 </span>
                 <input type="text" name="name" required>
                 <label>Name</label>
            </div>
            <div class="input-box">
                <span class="ico">
                    <ion-icon name="call"></ion-icon>
                </span>
                <input type="text" name="phone" required>
                <label>Phone Number</label>
            </div>        
            <div class="input-box">
                <span class="ico">
                     <ion-icon name="mail" ></ion-icon>
                </span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <button >Sign Up</button>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                 $name = $_POST["name"];
                 $phone = $_POST["phone"];
                 $email=$_POST["email"];
                 $servername = "localhost";
                 $username = "root";
                 $password = ""; 
                 $database = "cook";
                 $port = 3307;
                 $conn = new mysqli($servername, $username, $password, $database, $port);
                 $sql="INSERT INTO customer(name,phone,email) VALUES ('$name','$phone','$email')";
                 $result=mysqli_query($conn,$sql);
                 if($result)
                 {
                     header("location:Catalog.php");
                 }
            } 
        ?>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                 <h1>Welcome Back!</h1>
                 <p>Enter your personal details to use all of site features</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all of site features</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="../JS/ScriptUser.js"></script>
</body>
</html>

