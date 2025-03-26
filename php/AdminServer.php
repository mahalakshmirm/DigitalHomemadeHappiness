<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
$sql = "SELECT * FROM server ORDER BY name ASC";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
    <title>Server Details</title>
    <style>  
        body {
            background: rgba(0, 0, 0, 0.7) url("picture/AdminChefBack.jpg") center fixed;
            background-size: cover;
            background-blend-mode: darken;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .navbar ul li {
            display: inline-block;
            margin-left: 1100px;
            margin-bottom: 50px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            padding: 6px 12px;
            background: orangered;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .navbar ul li a:hover {
            background: #ff4500;
            box-shadow: 0 0 15px #ff4500;
        }

        a {
            text-decoration: none;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
        }

        input[type=submit] {
            padding: 15px 20px;
            background: #02005d;
            border: #dle8ff 1px solid;
            border-radius: 50px;
            color: #FFF;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="AdminDash.php">HOME</a></li>
        </ul>
    </div>

    <h2 align="center" style="color:white; font-weight:bold;"> SERVER DETAILS </h2><br>

    <form method="POST">
        <div class="message">
            <?php if (isset($message)) { echo $message; } ?>
        </div>

        <table border="10" cellpadding="10" cellspacing="1" width="800" height="500" align="center" bordercolor="White">
            <tr style="color:white; font-weight:bold; background-color:black">
                <td> SERVER NAME</td>
                <td> PHONE NUMBER</td>
                <td> EMAIL</td>
                <td> IMAGE</td>
            </tr>

            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $classname = ($i % 2 == 0) ? "evenrow" : "oddrow";
            ?>
                <tr class="<?php if (isset($classname)) echo $classname; ?>" style="color:white; font-weight:bold;">
                    <td> <?php echo $row["name"]; ?> </td>
                    <td> <?php echo $row["phone"]; ?> </td>
                    <td> <?php echo $row["email"]; ?> </td>
                    <td><img src="<?php echo $row["image_path"]; ?>" width="110" height="100"></td>
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
