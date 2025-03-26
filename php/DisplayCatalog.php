<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "cook";
$port = 3307; 
$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM food ORDER BY food_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<div class='food-item'>";
        echo "<img src='" . $row["image_path"] . "' alt='" . $row["food_name"] . "'><br><br>";
        echo "<center><h2>" . $row["food_name"] . "</h2></center>";
        echo "<center><h2>" . $row["chefname"] . "</h2></center>";
        echo "<center><p>Price: $" . $row["rate"] . "</p></center>";
        echo "<center><a href='ViewFood.php?id=" . $row["id"] . "' >View Details</a></center>"; 
        echo "</div>";
    }
} 
else 
{
    echo "0 results";
}

$conn->close();
?>
