<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $quantity = $_POST["quantity"];
    $rate = $_POST["rate"];
    $server=$_POST["server"];
    $nameOnac = $_POST["name_on_ac"];
    $mobile = $_POST["mobile"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cook";
    $port="3307";
    $conn = new mysqli($servername, $username, $password, $dbname,$port);
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO billing_details (full_name, email, address, city, quantity, rate,server, name_on_ac,mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) 
    {
        die("Error: " . $conn->error);
    }   
    $stmt->bind_param("sssssssss", $fullName, $email, $address, $city, $quantity, $rate,$server, $nameOnac, $mobile);
    if ($stmt->execute())
    {
       header("location:../html/PopUp.html");
    }
    else
    {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} 
else 
{
    echo "Error: Form not submitted.";
}
?>
