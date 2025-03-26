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

?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Detail</title>
    <style>
        body {
            
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .food-detail-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 40px;
            color: white;
            font-family: 'Segoe UI', sans-serif;
            background: rgba(0, 0, 0, 0.6); /* Optional overlay for readability */
            max-width: 1000px;
            margin: 40px auto;
            border-radius: 15px;
        }
        .food-image {
            flex: 1 1 300px;
            max-width: 350px;
        }
        .food-image img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
        }
        .food-info {
            flex: 2 1 500px;
        }
        .food-info p {
            margin: 6px 0;
            line-height: 1.6;
        }
        .order-button {
            background-color: orange;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        .order-button:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>

<?php
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM food WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>

    <div class="food-detail-container">
        <div class="food-image">
            <img src="<?php echo $row["image_path"]; ?>" alt="<?php echo $row["food_name"]; ?>">
        </div>
        <div class="food-info">
            <h2><?php echo $row["food_name"]; ?></h2>
            <p><strong>Description:</strong> <?php echo $row["description"]; ?></p>
            <p><strong>Chef Name:</strong> <?php echo $row["chefname"]; ?></p>
            <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
            <p><strong>Mobile:</strong> <span style="color: orange;"><?php echo $row["phone"]; ?></span></p>
            <p><strong>Quantity:</strong> <?php echo $row["quantity"]; ?></p>
            <p><strong>Price:</strong> $<?php echo $row["rate"]; ?></p>
            <form action="CustomerPayment.php">
                <button class="order-button">Order</button>
            </form>
        </div>
    </div>

<?php
    } else {
        echo "<p style='color: white; text-align: center;'>Product not found.</p>";
    }
} else {
    echo "<p style='color: white; text-align: center;'>Product ID not provided.</p>";
}

$conn->close();
?>

</body>
</html>
