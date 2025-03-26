<!DOCTYPE html>
<html>
<head>
    <title>Food Upload Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            background: rgba(0, 0, 0, 0.7) url("picture/FoodUploadBack.jpg") center fixed;
            background-size: cover;
            background-blend-mode: darken;
            font-family: 'DM Sans', sans-serif;
            margin: 0;
            padding: 0 2rem;
            color: white;
        }

        .navbar ul li {
            display: inline-block;
            margin-left: 1150px;
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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin-top: -4%;
        }

        .card {
            width: 100%;
            max-width: 720px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(30px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);
            border: 2px solid rgba(255, 255, 255, 0.4);
        }

        .card-image {
            text-align: center;
            margin-bottom: 1rem;
        }

        .card-heading {
            font-size: 2rem;
            font-weight: 700;
            color: white;
        }

        .card-heading small {
            font-size: 0.9rem;
            color: #ddd;
        }

        .card-form {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding-top: 1rem;
        }

        .input-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .input-label {
            font-size: 0.9rem;
            color: #ccc;
            margin-bottom: 5px;
        }

        .input-field {
            background: transparent;
            border: none;
            border-bottom: 2px solid #ccc;
            padding: 8px;
            font-size: 1rem;
            color: white;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border-bottom-color: white;
            outline: none;
        }

        .action-button {
            width: 100%;
            padding: 12px;
            margin-top: 1rem;
            background: orangered;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .action-button:hover {
            background: #ff5722;
        }

        .message-box {
            text-align: center;
            margin: 1rem auto;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
            max-width: 500px;
            display: none;
        }

        .message-success {
            background: #2ecc71;
            color: white;
            display: block;
        }

        .message-error {
            background: #e74c3c;
            color: white;
            display: block;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="../html/dashboard.html">HOME</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">HOMEMADE HAPPINESS<br>
                    <small>Let us upload your food details</small>
                </h2>
            </div>

            <?php
                $message = "";
                $messageClass = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $chefname = $_POST["chefname"];
                    $foodName = $_POST["food_name"];
                    $description = $_POST["description"];
                    $quantity = $_POST["quantity"];
                    $rate = $_POST["rate"];
                    $address = $_POST["address"];
                    $phone = $_POST["phone"];

                    $targetDir = "foodupload/";
                    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile))
                     {
                        $conn = new mysqli("localhost", "root", "", "cook", 3307);
                        $sql = "INSERT INTO food (chefname, food_name, description, quantity, rate, address, phone, image_path)
                                VALUES ('$chefname', '$foodName', '$description', '$quantity', '$rate', '$address', '$phone', '$targetFile')";
                        if (mysqli_query($conn, $sql))
                        {
                            $message = "Food details and image uploaded successfully!";
                            $messageClass = "message-success";
                        } 
                        else 
                        {
                            $message = "Database error: " . mysqli_error($conn);
                            $messageClass = "message-error";
                        }
                    }
                    else
                    {
                        $message = "Error uploading image. Please try again.";
                        $messageClass = "message-error";
                    }

                    echo "<div class='message-box $messageClass'>$message</div>";
                }
            ?>

            <form method="post" enctype="multipart/form-data" id="upload_form" class="card-form">
                <div class="input-group">
                    <label class="input-label">Server Name</label>
                    <input type="text" class="input-field" name="chefname" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Food Name</label>
                    <input type="text" class="input-field" name="food_name" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Description</label>
                    <input type="text" class="input-field" name="description" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Quantity</label>
                    <input type="number" class="input-field" name="quantity" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Rate</label>
                    <input type="number" class="input-field" name="rate" required>
                </div>
                
                <div class="input-group">
                    <label class="input-label">Phone</label>
                    <input type="number" class="input-field" name="phone" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Address</label>
                    <input type="text" class="input-field" name="address" required>
                </div>
                <div class="input-group" style="flex: 1 1 100%;">
                    <label class="input-label">Upload Image</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="action-button">UPLOAD</button>
            </form>
        </div>
    </div>
</body>
</html>
