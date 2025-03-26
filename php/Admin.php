<?php
$message="";
if(count($_POST)>0)
{
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "cook";
    $port = 3307;
    $conn = new mysqli($servername, $username, $password, $database, $port);
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='".$_POST["username"]."' AND password='".$_POST["password"]."'");
    $count = mysqli_num_rows($result);  
    if($count==0)
    {
         $message="Invalid username and password";
    }    
    else
    {
         header("location:AdminDash.php");
    }
}
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <div class="navbar">
      <ul>
          <li><a href="dashboard.html">HOME</a></li>         
      </ul>
    </div>
    <style>       
         body
        {
            background: rgba(0, 0, 0, 0.7) url('picture/Adminback.jpg') center fixed;
            background-size:cover;
            background-blend-mode: darken;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;               
            background-repeat:no-repeat;
        }
        .navbar ul li
        {
            display: inline-block;
            padding:0px;
            text-transform: uppercase;
            margin-left:1400px;
            margin-bottom:100px;
        }
        .navbar ul li a
        {
            text-decoration: none;
            color: #fff;
            padding: 4px;
            transition: 2s;
        }
        .navbar ul li a:hover
        {
            box-shadow: 0 3px 50px orangered inset,0 3px 50px orangered inset,
            0 3px 50px orangered inset,0 3px 50px orangered inset;
        }
        .login  
        {
             border:white 3px solid;
             background:transparent;
             backdrop-filter:blur(20px);
             height:50%;
             width:30%;
            border-radius:50px;
             margin-top:10%;
        }
        input[type=text],[type=password]
        {
             border:#000 1px solid;
            padding:10px 20px;
         }
    .message 
    {
        color:red;
        font-size:15px;
    }
    input[type=submit]
    {
        padding:10px 20px;
        background:#02005d;
        border:#d1e8ff 1px solid;
        border-radius:50px;
        color:white;
        background-color:black;
    }
    tr,td 
    {
        color:white;
        font-size:25px;
        text-align:center;

    }
    h1{
        color:white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        margin-top:-9%;

    }
    
</style>
<body>
    <font color="white">
        <br><h1 align="center">Digital Homemade Happiness</h1>
        <form method="POST">
            <table cellpadding="10" cellspacing="1" width="500" align="center" class="login">
                <tr><td>ADMIN</tr></td>
                <tr><td><input type="text" name="username" placeholder="username"></td></tr>
                <tr><td><input type="password" name="password" placeholder="password"></td></tr>
                <tr><td class="meessage"><?php if($message!=""){echo $message;}?></td></tr>
                <tr><td><input type="submit" value="SUBMIT"></td></tr></table>
</form>
</body>
</html>

