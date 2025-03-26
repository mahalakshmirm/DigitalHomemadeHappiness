<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/ServerCSS.css">
    <title>Server</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="../html/dashboard.html"><b>HOME</b></a></li>
        </ul>
    </div>
    
    <div class="container" id="container">
        <?php include 'ServerSignIn.php'; ?>
        
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
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                
                <input type="file" name="image" accept="image/*" id="image" onchange="uploadFile()" required>
                <button>Sign Up</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $targetDir = "serverupload/";
                $targetFile = $targetDir . basename($_FILES["image"]["name"]);
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "cook";
                    $port = 3307;
                    $conn = new mysqli($servername, $username, $password, $database, $port);
                    $sql = "INSERT INTO server(name, phone, email, image_path) VALUES ('$name', '$phone', '$email', '$targetFile')";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result) {
                        header("location:FoodUpload.php");
                    }
                }
            }
            ?>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Chef!</h1>
                    <p>Register with your personal details to use all site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../JS/ScriptServer.js"></script>
</body>
</html>
